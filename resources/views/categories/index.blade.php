<x-app-layout>
    @section('title', 'Strona Główna')
    @section('meta_description', 'Opis strony głównej')
    @section('meta_keywords', 'słowo kluczowe1, słowo kluczowe2')
    @section('page_title', 'Witamy na naszej stronie')


    @section('content')
        <div class="container p-4">
            <h1>Categories</h1>
            <a href="{{ route('categories.create') }}">Create New Category</a>
            @if (session('success'))
                <p>{{ session('success') }}</p>
            @endif
            <ul>
                @foreach ($categories as $category)
                    <li>
                        <h2>{{ $category->name }}</h2>
                        <p>{{ $category->description }}</p>
                        <a href="{{ route('categories.show', $category->id) }}">View</a>
                        <a href="{{ route('categories.edit', $category->id) }}">Edit</a>
                        <form action="{{ route('categories.destroy', $category->id) }}" method="POST" style="display: inline;">
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