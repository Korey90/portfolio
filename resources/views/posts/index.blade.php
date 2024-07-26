<x-app-layout>
    @section('title', 'Strona Główna')
    @section('meta_description', 'Opis strony głównej')
    @section('meta_keywords', 'słowo kluczowe1, słowo kluczowe2')
    @section('page_title', 'Witamy na naszej stronie')


    @section('content')
        <div class="container p-4">
            @include('partials.adminNavigation')
            <div class="d-flex justify-content-between">
                <h2>Posts</h2>
                <a href="{{ route('posts.create') }}" class="link">Create New Post</a>
            </div>

            @if (session('success'))
                <p>{{ session('success') }}</p>
            @endif
            <table class="table">
                <thead>
                    <tr>
                        <th>Image</th>
                        <th>Title</th>
                        <th>Categoty</th>
                        <th>Status</th>
                        <th>Created at</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($posts as $post)
                        <tr>
                            <td>
                                @if($post->image)
                                    <img src="{{ asset('storage/' . $post->image) }}" alt="{{ $post->title_pl }}" style="width: 100px;">
                                @else
                                    Brak obrazka
                                @endif
                            </td>
                            <td>
                                <a class="nav-link link-dark" href="{{ route('posts.show', $post->id) }}">{{ $post->title_pl }}</a>
                            </td>
                            <td>{{ $post->category->name }}</td>
                            <td>{{ ($post->active) ? 'aktywne' : 'nie aktywne'}}</td>
                            <td>{{ $post->created_at }}</td>
                            <td>
                                <a class="btn btn-primary" href="{{ route('posts.edit', $post->id) }}">Edit</a>
                                <form action="{{ route('posts.destroy', $post->id) }}" method="POST" style="display: inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-danger" type="submit">Delete</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    @endsection
</x-app-layout>