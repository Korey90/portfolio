<x-app-layout>
    @section('title', 'Strona Główna')
    @section('meta_description', 'Opis strony głównej')
    @section('meta_keywords', 'słowo kluczowe1, słowo kluczowe2')
    @section('page_title', 'Witamy na naszej stronie')


    @section('content')
        <div class="container p-4">

            <h1>Create Service</h1>
            <form action="{{ route('services.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <label for="title">Title:</label>
                <input type="text" id="title" name="title" required>
                <br>
                <label for="description">Description:</label>
                <textarea id="description" name="description" required></textarea>
                <br>
                <label for="image">Image:</label>
                <input type="file" id="image" name="image">
                <br>
                <label for="price">Min Price:</label>
                <input type="text" id="min_price" name="min_price" required>
                <br>
                <label for="price">Max Price:</label>
                <input type="text" id="max_price" name="max_price" required>
                <br>
                <button type="submit">Create</button>
            </form>
            <a href="{{ route('services.index') }}">Back to list</a>
    
        </div>

    @endsection

</x-app-layout>