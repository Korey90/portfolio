<x-app-layout>
    @section('title', 'Skills')
    @section('meta_description', 'Opis strony głównej')
    @section('meta_keywords', 'słowo kluczowe1, słowo kluczowe2')
    @section('page_title', 'Witamy na naszej stronie')


    @section('content')
    <div class="container p-4">
        <h1>Create Technique</h1>
        <form action="{{ route('techniques.store') }}" method="POST">
            @csrf
            <label for="name">Name:</label>
            <input type="text" id="name" name="name" required>
            <br>
            <button type="submit">Save</button>
        </form>
        <a href="{{ route('techniques.index') }}">Back to list</a>      
    </div>
    @endsection

</x-app-layout>