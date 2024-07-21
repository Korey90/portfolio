<x-app-layout>
    @section('title', 'Skills')
    @section('meta_description', 'Opis strony głównej')
    @section('meta_keywords', 'słowo kluczowe1, słowo kluczowe2')
    @section('page_title', 'Witamy na naszej stronie')


    @section('content')
    <div class="container p-4">
        <h1>Edit Technique</h1>
        <form action="{{ route('techniques.update', $technique->id) }}" method="POST">
            @csrf
            @method('PUT')
            <label for="name">Name:</label>
            <input type="text" id="name" name="name" value="{{ $technique->name }}" required>
            <br>
            <button type="submit">Save</button>
        </form>
        <a href="{{ route('techniques.index') }}">Back to list</a>    
    </div>
    @endsection

</x-app-layout>