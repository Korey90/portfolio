<x-app-layout>
    @section('title', 'Strona Główna')
    @section('meta_description', 'Opis strony głównej')
    @section('meta_keywords', 'słowo kluczowe1, słowo kluczowe2')
    @section('page_title', 'Witamy na naszej stronie')


    @section('content')
        <div class="container p-4">
        @include('partials.adminNavigation')
            <div class="d-flex justify-content-between">
                <h2>Create Service</h2>
                <a href="{{ route('services.index') }}" class="link">Back to list</a>
            </div>

            <form action="{{ route('services.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <label class="form-label" for="title">Title:</label>
                <input class="form-control" type="text" id="title" name="title" required>
                <br>
                <label class="form-label" for="description">Description:</label>
                <textarea class="form-control" id="description" name="description" required></textarea>
                <br>
                <label class="form-label"for="image">Image:</label>
                <input class="form-control"type="file" id="image" name="image">
                <br>
                <label class="form-label" for="price">Min Price:</label>
                <input class="form-control" type="text" id="min_price" name="min_price" required>
                <br>
                <label class="form-label" for="price">Max Price:</label>
                <input class="form-control" type="text" id="max_price" name="max_price" required>
                <br>
                <button class="btn btn-success" type="submit">Create</button>
            </form>
    
        </div>

    @endsection

</x-app-layout>