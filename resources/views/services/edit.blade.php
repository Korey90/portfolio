<x-app-layout>
    @section('title', 'Strona Główna')
    @section('meta_description', 'Opis strony głównej')
    @section('meta_keywords', 'słowo kluczowe1, słowo kluczowe2')
    @section('page_title', 'Witamy na naszej stronie')


    @section('content')
        <div class="container p-4">

            <h1>Edit Service</h1>
            <form action="{{ route('services.update', $service->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <label for="title">Title:</label>
                <input type="text" id="title" name="title" value="{{ $service->title }}" required>
                <br>
                <label for="description">Description:</label>
                <textarea id="description" name="description" required>{{ $service->description }}</textarea>
                <br>
                <label for="image">Image:</label>
                <input type="file" id="image" name="image">
                @if ($service->image)
                    <img src="{{ asset('storage/' . $service->image) }}" alt="{{ $service->title }}" style="width: 100px;">
                @endif
                <br>
                <label for="price">Price:</label>
                <input type="text" id="price" name="price" value="{{ $service->price }}" required>
                <br>
                <button type="submit">Update</button>
            </form>
            <a href="{{ route('services.index') }}">Back to list</a>
    
        </div>

    @endsection

</x-app-layout>