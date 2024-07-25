<x-app-layout>
    @section('title', 'Strona Główna')
    @section('meta_description', 'Opis strony głównej')
    @section('meta_keywords', 'słowo kluczowe1, słowo kluczowe2')
    @section('page_title', 'Witamy na naszej stronie')


    @section('content')
        <div class="container p-4">
            @include('partials.adminNavigation')
            <div class="d-flex justify-content-between">
                <h2>Create Post</h2>
                <a href="{{ route('posts.index') }}" class="link">Back to list</a>
            </div>
            <form action="{{ route('posts.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <label class="form-label" for="title">Title:</label>
                <input class="form-control" type="text" id="title" name="title" required>
                <br>
                <label class="form-label" for="description">Desctiption:</label>
                <textarea class="form-control" rows="6" id="description" name="description" class="form-control" required></textarea>
                <br>
                <label class="form-label" for="content">Content:</label>
                <textarea class="form-control" rows="9" id="content" name="content" class="form-control" required></textarea>
                <br>
                <label class="form-label" for="image">Image:</label>
                <input class="form-control" type="file" id="image" name="image">
                <br>
                <label class="form-label" for="category_id">Category:</label>
                <select class="form-select" id="category_id" name="category_id" required>
                    @foreach ($categories as $category)
                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                    @endforeach
                </select>
                <br>
                <button class="btn btn-success" type="submit">Create</button>
            </form>
        </div>
        


    @endsection

</x-app-layout>