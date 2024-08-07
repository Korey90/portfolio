<x-app-layout>
    @section('title', 'Strona Główna')
    @section('meta_description', 'Opis strony głównej')
    @section('meta_keywords', 'słowo kluczowe1, słowo kluczowe2')
    @section('page_title', 'Witamy na naszej stronie')


    @section('content')
        <div class="container p-4">
        @include('partials.adminNavigation')
            <div class="d-flex justify-content-between">
                <h2>Service Details</h2>
                <a href="{{ route('services.index') }}" class="link">Back to list</a>
            </div>

            <h2>Tytuł:</h2>
            <p class="fs-5">
                @foreach($service->translations as $title)
                    {{ $title->title }}, 
                @endforeach
            </p>
            <h2>Opis:</h2>
            @foreach($service->translations as $description)
                <p class="fs-5">
                   {{$description->locale}} - {{ $description->description }}, 
                </p>
            @endforeach
            <h2>Cena:</h2>
            <p>Min Price: £{{ $service->min_price }}</p>
            <p>Max Price: £{{ $service->max_price }}</p>
            <h2>Ilustracja:</h2>
            @if ($service->image)
                <img src="{{ asset('storage/' . $service->image) }}" alt="{{ $service->title }}" style="width: 100px;">
            @endif
    
   
                            <ul class="list-group">
                                @forelse($service->works->where('locale', app()->getLocale() ) as $work)
                                    <li class="list-group-item">
                                        <h3>{{ $work->title }}</h3>
                                        <p>{{ $work->description }}</p>
                                        <p>Min Price: {{ $work->min_price }} Max Price: {{ $work->max_price }}</p>
                                        <p>Interval: {{ implode(',', $work->service_intervals) }}</p>
                                        <ul>
                                            <h3>Work process</h3>
                                            @forelse($work->process as $process)
                                                <li>
                                                    <h5 class="fw-bold">{{ $process->title }}</h5>
                                                    <p>{{ $process->description }}</p>
                                                </li>
                                            @empty
                                                Brak Procesów
                                            @endforelse
                                        </ul>
                                    </li>
                                @empty
                                    Brak rekordów w tym jezyku
                                @endforelse
                            </ul>
                        
        </div>

    @endsection

</x-app-layout>