<x-app-layout>
    @section('title', 'Strona Główna')
    @section('meta_description', 'Opis strony głównej')
    @section('meta_keywords', 'słowo kluczowe1, słowo kluczowe2')
    @section('page_title', 'Witamy na naszej stronie')


    @section('content')
        <div class="container p-4">
            <h1>Edit Category</h1>
            <form action="{{ route('categories.update', $category->id) }}" method="POST">
                @csrf
                @method('PUT')
                <label for="name">Name:</label>
                <input type="text" id="name" name="name" value="{{ $category->name }}" required>
                <br>
                <label for="description">Description:</label>
                <input type="text" id="description" name="description" value="{!! $category->description !!}">
                <br>
                <button type="submit">Update</button>
            </form>
            <a href="{{ route('categories.index') }}">Back to list</a>
        </div>
    @endsection

</x-app-layout>