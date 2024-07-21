<x-app-layout>
    @section('title', 'Skills')
    @section('meta_description', 'Opis strony głównej')
    @section('meta_keywords', 'słowo kluczowe1, słowo kluczowe2')
    @section('page_title', 'Witamy na naszej stronie')


    @section('content')
    <div class="container p-4">

        <h1>Skills</h1>
        <a href="{{ route('skills.create') }}" class="btn btn-primary mb-2">Create New Skill</a>
        <ul class="list-group">
            @foreach ($skills as $skill)
            <li class="list-group-item d-flex justify-content-between align-items-center">
                <a href="{{ route('skills.show', $skill->id) }}" class="link">{{ $skill->name }}</a>
                <div>
                    <a href="{{ route('skills.edit', $skill->id) }}" class="btn btn-info">Edit</a>

                    <form action="{{ route('skills.destroy', $skill->id) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">Delete</button>
                    </form>
                </div>
            </li>
            @endforeach
        </ul>
        
    </div>
    @endsection

</x-app-layout>