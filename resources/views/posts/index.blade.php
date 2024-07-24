<x-app-layout>
    @section('title', 'Strona Główna')
    @section('meta_description', 'Opis strony głównej')
    @section('meta_keywords', 'słowo kluczowe1, słowo kluczowe2')
    @section('page_title', 'Witamy na naszej stronie')


    @section('content')
        <div class="container p-4">
            <h1>Posts</h1>
            <a href="{{ route('posts.create') }}">Create New Post</a>
            @if (session('success'))
                <p>{{ session('success') }}</p>
            @endif
            <ul>
                @foreach ($posts as $post)
                    <li>
                        <h2>{{ $post->title }}</h2>
                        <p>{{ $post->content }}</p>
                        <p>Category: {{ $post->category->name }}</p> <!-- Wyświetlanie nazwy kategorii -->
                        @if ($post->image)
                            <img src="{{ asset('storage/' . $post->image) }}" alt="{{ $post->title }}" style="width: 100px;">
                        @endif
                        <a href="{{ route('posts.show', $post->id) }}">View</a>
                        <a href="{{ route('posts.edit', $post->id) }}">Edit</a>
                        <form action="{{ route('posts.destroy', $post->id) }}" method="POST" style="display: inline;">
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