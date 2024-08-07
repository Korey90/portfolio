<x-app-layout>
    @section('title', 'Service - '.$service->translations->first()->title)
    @section('meta_description', $service->translations()->first()->description)
    @section('meta_keywords', 'słowo kluczowe1, słowo kluczowe2')
    @section('page_title', $service->title)


    @section('content')
        <div class="container p-4">
            <div class="row">
                <div class="col-md-2">
                    <img src="{{ url('storage/'.$service->image) }}" alt="{{ $service->title }}" style="max-width: 200px;">
                </div>
                <div class="col-md">
                    <div class="row">
                        <div class="col-md-6 text-center">
                            <h2 class="fw-bold">{{ $service->translations->first()->title }}</h2>
                            <p class="text-muted">Service:</p>
                        </div>
                        <div class="col-md-6 text-center">
                            <h2 class="fw-bold">£{{ $service->min_price }}</h2>
                            <p class="text-muted">Cena od:</p>
                        </div>
                        <div class="col-md-12 text-center">
                            <h2 class="fw-bold">{{ $service->translations->first()->description }}</h2>
                            <p class="text-muted">Description:</p>
                        </div>
                    </div>

                </div>
            </div>
            <hr>
            <div class="row g-4">
                <h2>Oferta Zawiera:</h2>
                @forelse($service->works->where('locale', app()->getLocale() ) as $work)
                    <div class="col-md-3">
                        <h4>{{ $work->title }}</h4>    
                        <p>{{ $work->description }}</p>
                        <p>{{ $work->details }}</p>
                        <p>Cena od: £{{ $work->min_price }} - {{ $work->max_price }}</p>
                        <p>{{ $work->service_interval }}</p>
                        @forelse($work->process as $process)
                            <li>{{$process->title}}</li>
                        @empty
                            Brak Procesów
                        @endforelse
                    </div>
                @empty
                    Sekcja w trakcie uzupełniania
                @endforelse
            </div>
     
            
        </div>
    @endsection

</x-app-layout>