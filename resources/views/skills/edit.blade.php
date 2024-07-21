<x-app-layout>
    @section('title', 'Skills')
    @section('meta_description', 'Opis strony głównej')
    @section('meta_keywords', 'słowo kluczowe1, słowo kluczowe2')
    @section('page_title', 'Witamy na naszej stronie')


    @section('content')
    <div class="container p-4">

        
        <h1>Edit Skill</h1>
        <form action="{{ route('skills.update', $skill->id) }}" method="POST">
            @csrf
            @method('PUT')
            <label for="name">Name:</label>
            <input type="text" id="name" class="form-control" name="name" value="{{ $skill->name }}" required>
            <br>
            <label for="proficiency">Proficiency:</label>
            <input type="text" id="proficiency" class="form-control" name="proficiency" value="{{ $skill->proficiency }}" required>
            <br>
            <label for="icon">Icon:</label>
            <input type="text" id="icon" class="form-control" name="icon" value="{{ $skill->icon }}" required>
            <br>
            <label for="active">Active:</label>
            <input type="checkbox" id="active" class="form-check" name="active" value="1" {{ $skill->active ? 'checked' : '' }}>
            <br>
            <button type="submit">Save</button>
        </form>
        <a href="{{ route('skills.index') }}">Back to list</a>
        
    </div>
    @endsection

</x-app-layout>