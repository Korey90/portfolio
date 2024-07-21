<x-app-layout>
    @section('title', 'Skills')
    @section('meta_description', 'Opis strony głównej')
    @section('meta_keywords', 'słowo kluczowe1, słowo kluczowe2')
    @section('page_title', 'Witamy na naszej stronie')


    @section('content')
    <div class="container p-4">
    <h1>Techniques</h1>
    <a href="{{ route('techniques.create') }}">Create New Technique</a>
    <ul>
        @foreach ($techniques as $technique)
            <li>
                <a href="{{ route('techniques.show', $technique->id) }}">{{ $technique->name }}</a>
                <a href="{{ route('techniques.edit', $technique->id) }}">Edit</a>
                <form action="{{ route('techniques.destroy', $technique->id) }}" method="POST" style="display:inline;">
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