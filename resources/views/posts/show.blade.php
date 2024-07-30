<x-app-layout>
    @section('title', 'Strona Główna')
    @section('meta_description', 'Opis strony głównej')
    @section('meta_keywords', 'słowo kluczowe1, słowo kluczowe2')
    @section('page_title', 'Witamy na naszej stronie')

    @section('content')
        <div class="container p-4">
            <h1>{{ $post->title }}</h1>
            <p><strong>Category:</strong> {{ $post->category->name }}</p>
            @if ($post->image)
                <img src="{{ asset('storage/' . $post->image) }}" alt="{{ $post->title }}" style="width: 100px;">
            @endif
            <div>
                <!-- Render the content with HTML -->
                {!! $post->content !!}
            </div>
            <a href="{{ route('posts.index') }}">Back to list</a>
            <a href="{{ route('posts.edit', $post->id) }}">Edit</a>
            <form action="{{ route('posts.destroy', $post->id) }}" method="POST" style="display: inline;">
                @csrf
                @method('DELETE')
                <button class="btn btn-danger" onclick="confirm('Napewno chcesz usunąć ten post?')" type="submit">Delete</button>
            </form>
            <script src="https://cdnjs.cloudflare.com/ajax/libs/highlight.js/11.7.0/highlight.min.js"></script>
            <script>hljs.highlightAll();</script>
        </div>

    @endsection

</x-app-layout>