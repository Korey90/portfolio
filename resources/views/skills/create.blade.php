    <x-app-layout>
    @section('title', 'Strona Główna')
    @section('meta_description', 'Opis strony głównej')
    @section('meta_keywords', 'słowo kluczowe1, słowo kluczowe2')
    @section('page_title', 'Witamy na naszej stronie')


    @section('content')
    <div class="container p-4">

        <h1>Create Skill</h1>
        <form action="{{ route('skills.store') }}" method="POST">
            @csrf
            <label for="name">Name:</label>
            <input type="text" id="name" class="form-control" name="name" required>
            <br>
            <label for="proficiency">Proficiency: %</label>
            <input type="number" id="proficiency" min="0" max="100" step="1" class="form-control" name="proficiency" required>
            <br>
            <label for="icon">Icon:</label>
            <input type="text" id="icon" class="form-control" name="icon" required>
            <br>
            <label for="active">Active:</label>
            <input type="checkbox" id="active" class="form-check" name="active" value="1" checked>
            <br>
            <button type="submit">Save</button>
        </form>
        <a href="{{ route('skills.index') }}">Back to list</a>
        
    </div>
    @endsection

</x-app-layout>