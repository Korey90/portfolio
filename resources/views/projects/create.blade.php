<x-app-layout>
    @section('title', 'Skills')
    @section('meta_description', 'Opis strony głównej')
    @section('meta_keywords', 'słowo kluczowe1, słowo kluczowe2')
    @section('page_title', 'Witamy na naszej stronie')


    @section('content')
    <div class="container p-4">

        <h1>Create Project</h1>
        <form action="{{ route('projects.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('POST')
            <label for="name">Name:</label>
            <input type="text" id="name" name="name" required>
            <br>
            <label for="description">Description:</label>
            <textarea id="description" name="description" required></textarea>
            <br>
            <label for="image">Image:</label>
            <input type="file" id="image" name="image">
            <br>
            <label for="technique_ids">Techniques:</label>
            <select id="technique_ids" name="technique_ids[]" multiple required>
                @foreach($techniques as $technique)
                    <option value="{{ $technique->id }}">{{ $technique->name }}</option>
                @endforeach
            </select>
            <br>
            <label for="end_point">End Point:</label>
            <input type="text" id="end_point" name="end_point" required>
            <br>
            <button type="submit">Save</button>
        </form>
        <a href="{{ route('projects.index') }}">Back to list</a>
        
    </div>
    @endsection

</x-app-layout>