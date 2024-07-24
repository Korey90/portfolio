<x-app-layout>
    @section('title', 'Strona Główna')
    @section('meta_description', 'Opis strony głównej')
    @section('meta_keywords', 'słowo kluczowe1, słowo kluczowe2')
    @section('page_title', 'Witamy na naszej stronie')


    @section('content')
        <div class="container p-4">
            <h1>Create Post</h1>
            <form action="{{ route('posts.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <label for="title">Title:</label>
                <input type="text" id="title" name="title" required>
                <br>
                <label for="content">Content:</label>
                <textarea id="content" name="content" class="form-control" required></textarea>
                <br>
                <label for="image">Image:</label>
                <input type="file" id="image" name="image">
                <br>
                <label for="category_id">Category:</label>
                <select id="category_id" name="category_id" required>
                    @foreach ($categories as $category)
                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                    @endforeach
                </select>
                <br>
                <button type="submit">Create</button>
            </form>
            <a href="{{ route('posts.index') }}">Back to list</a>
        </div>
        


    @endsection

</x-app-layout>