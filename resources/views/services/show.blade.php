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

            <h2>{{ $service->title }}</h2>
            <p>{{ $service->description }}</p>
            <p>Min Price: ${{ $service->min_price }}</p>
            <p>Max Price: ${{ $service->max_price }}</p>
            @if ($service->image)
                <img src="{{ asset('storage/' . $service->image) }}" alt="{{ $service->title }}" style="width: 100px;">
            @endif
    
        </div>

    @endsection

</x-app-layout>