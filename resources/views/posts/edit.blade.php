<x-app-layout>
    @section('title', 'Strona Główna')
    @section('meta_description', 'Opis strony głównej')
    @section('meta_keywords', 'słowo kluczowe1, słowo kluczowe2')
    @section('page_title', 'Witamy na naszej stronie')


    @section('content')
        <div class="container p-4">
            @include('partials.adminNavigation')
            <div class="d-flex justify-content-between">
                <h2>Edit Post: {{ $post->title }}</h2>
                <a href="{{ route('posts.index') }}" class="link">Back to list</a>
            </div>

            <form action="{{ route('posts.update', $post->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <label class="form-label" for="title">Title:</label>
                <input class="form-control" type="text" id="title" name="title" value="{{ $post->title }}" required>
                <br>
                <label class="form-label" for="description">Wstęp:</label>
                <textarea class="form-control" id="description" rows="6" name="description" required>{{ $post->description }}</textarea>
                <br>
                <label class="form-label" for="content">Content:</label>
                <textarea class="form-control" id="content" name="content" rows="35" required>{{ $post->content }}</textarea>
                <br>
                <label class="form-label" for="image">Image:</label>
                <input class="form-control" type="file" id="image" name="image">
                @if ($post->image)
                    <img src="{{ asset('storage/' . $post->image) }}" alt="{{ $post->title }}" style="width: 100px;">
                @endif
                <br>
                <label class="form-label" for="category_id">Category:</label>
                <select class="form-select" id="category_id" name="category_id" required>
                    @foreach ($categories as $category)
                        <option value="{{ $category->id }}" {{ $post->category_id == $category->id ? 'selected' : '' }}>
                            {{ $category->name }}
                        </option>
                    @endforeach
                </select>
                <br>
                <button class="btn btn-success" type="submit">Update</button>
            </form>
        </div>
    @endsection

</x-app-layout>