<x-app-layout>
    @section('title', 'Strona Główna')
    @section('meta_description', 'Opis strony głównej')
    @section('meta_keywords', 'słowo kluczowe1, słowo kluczowe2')
    @section('page_title', 'Witamy na naszej stronie')


    @section('content')
        <div class="container p-4">
            <h1>Create Category</h1>
            <form action="{{ route('categories.store') }}" method="POST">
                @csrf
                <label for="name">Name:</label>
                <input type="text" id="name" name="name" required>
                <br>
                <label for="description">Description:</label>
                <input type="text" id="description" name="description">
                <br>
                <button type="submit">Create</button>
            </form>
            <a href="{{ route('categories.index') }}">Back to list</a>
        </div>
        


    @endsection

</x-app-layout>