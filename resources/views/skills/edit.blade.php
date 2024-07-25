<x-app-layout>
    @section('title', 'Skills')
    @section('meta_description', 'Opis strony głównej')
    @section('meta_keywords', 'słowo kluczowe1, słowo kluczowe2')
    @section('page_title', 'Witamy na naszej stronie')


    @section('content')
    <div class="container p-4">
        @include('partials.adminNavigation')
        <div class="d-flex justify-content-between">
            <h2>Edit Skill: {{ $skill->name }}</h2>
            <a href="{{ route('skills.index') }}" class="link">Back to list</a>
        </div>

        <form action="{{ route('skills.update', $skill->id) }}" method="POST">
            @csrf
            @method('PUT')
            <label class="form-label" for="name">Name:</label>
            <input type="text" id="name" class="form-control" name="name" value="{{ $skill->name }}" required>
            <br>
            <label class="form-label" for="proficiency">Proficiency:</label>
            <input type="text" id="proficiency" class="form-control" name="proficiency" value="{{ $skill->proficiency }}" required>
            <br>
            <label class="form-label" for="icon">Icon:</label>
            <div class="input-group mb-3">
              <span class="input-group-text" id="basic-addon1"><i class="{{ $skill->icon }}"></i></span>
              <input type="text" id="icon" class="form-control" name="icon" value="{{ $skill->icon }}" required>
            </div>

            <br>
            <div class="form-check">
              <input class="form-check-input" type="checkbox" name="active" value="1" id="active" {{ $skill->active ? 'checked' : '' }}>
              <label class="form-check-label" for="active">
                Tick to make it visible
              </label>
            </div>
            <br>
            <button type="submit" class="btn btn-success">Save</button>
        </form>
        
    </div>
    @endsection

</x-app-layout>