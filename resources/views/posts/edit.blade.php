<x-app-layout>
    @section('title', 'Strona Główna')
    @section('meta_description', 'Opis strony głównej')
    @section('meta_keywords', 'słowo kluczowe1, słowo kluczowe2')
    @section('page_title', 'Witamy na naszej stronie')


    @section('content')
        <div class="container p-4">
            <h1>Edit Post</h1>
            <form action="{{ route('posts.update', $post->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <label for="title">Title:</label>
                <input type="text" id="title" name="title" value="{{ $post->title }}" required>
                <br>
                <label for="content">Content:</label>
                <textarea id="content" name="content" class="form-control" rows="35" required>{{ $post->content }}</textarea>
                <br>
                <label for="image">Image:</label>
                <input type="file" id="image" name="image">
                @if ($post->image)
                    <img src="{{ asset('storage/' . $post->image) }}" alt="{{ $post->title }}" style="width: 100px;">
                @endif
                <br>
                <label for="category_id">Category:</label>
                <select id="category_id" name="category_id" required>
                    @foreach ($categories as $category)
                        <option value="{{ $category->id }}" {{ $post->category_id == $category->id ? 'selected' : '' }}>
                            {{ $category->name }}
                        </option>
                    @endforeach
                </select>
                <br>
                <button type="submit">Update</button>
            </form>
            <a href="{{ route('posts.index') }}">Back to list</a>
        </div>
    @endsection

</x-app-layout>