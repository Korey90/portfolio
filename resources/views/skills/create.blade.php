    <x-app-layout>
    @section('title', 'Strona Główna')
    @section('meta_description', 'Opis strony głównej')
    @section('meta_keywords', 'słowo kluczowe1, słowo kluczowe2')
    @section('page_title', 'Witamy na naszej stronie')


    @section('content')
    <div class="container p-4">
        @include('partials.adminNavigation')
        <div class="d-flex justify-content-between">
            <h2>Create New Skill</h2>
            <a href="{{ route('skills.index') }}" class="link">Back to list</a>
        </div>

        <form action="{{ route('skills.store') }}" method="POST">
            @csrf
            <label class="form-label" for="name">Name:</label>
            <input type="text" id="name" class="form-control" name="name" required>
            <br>
            <label class="form-label" for="proficiency">Proficiency: %</label>
            <input type="number" id="proficiency" min="0" max="100" step="1" class="form-control" name="proficiency" required>
            <br>
            <label class="form-label" for="icon">Icon:</label>
            <input type="text" id="icon" class="form-control" name="icon" required>
            <br>
            <div class="form-check">
              <input class="form-check-input" type="checkbox" name="active" value="1" id="active">
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