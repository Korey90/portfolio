<x-app-layout>
    @section('title', 'Strona Główna')
    @section('meta_description', 'Opis strony głównej')
    @section('meta_keywords', 'słowo kluczowe1, słowo kluczowe2')
    @section('page_title', 'Witamy na naszej stronie')


    @section('content')
        <div class="container p-4">

            <h1>Services</h1>
            <a href="{{ route('services.create') }}">Create New Service</a>
            @if (session('success'))
            <p>{{ session('success') }}</p>
            @endif
            <ul>
                @foreach ($services as $service)
                <li>
                    <h2>{{ $service->title }}</h2>
                    <p>{{ $service->description }}</p>
                    <p>Price: ${{ $service->price }}</p>
                    @if ($service->image)
                    <img src="{{ asset('storage/' . $service->image) }}" alt="{{ $service->title }}" style="width: 100px;">
                    @endif
                    <a href="{{ route('services.show', $service->id) }}">View</a>
                    <a href="{{ route('services.edit', $service->id) }}">Edit</a>
                    <form action="{{ route('services.destroy', $service->id) }}" method="POST" style="display: inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit">Delete</button>
                    </form>
                </li>
                @endforeach
            </ul>
        </div>

    @endsection

</x-app-layout>