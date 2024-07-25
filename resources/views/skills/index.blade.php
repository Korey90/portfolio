<x-app-layout>
    @section('title', 'Skills')
    @section('meta_description', 'Opis strony głównej')
    @section('meta_keywords', 'słowo kluczowe1, słowo kluczowe2')
    @section('page_title', 'Witamy na naszej stronie')


    @section('content')
        <div class="container p-4">
            @include('partials.adminNavigation')
            <div class="d-flex justify-content-between">
                <h2>Skills</h2>
                <a href="{{ route('skills.create') }}" class="link">Create New Skill</a>
            </div>
            <table class="table">
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>Proficiency</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($skills as $skill)
                        <tr>
                            <td>
                                <a href="{{ route('skills.show', $skill->id) }}" class="link">{{ $skill->name }}</a>
                            </td>
                            <td>{{ $skill->proficiency }}%</td>
                            <td>
                                <a href="{{ route('skills.edit', $skill->id) }}" class="btn btn-primary">Edit</a>
                                <form action="{{ route('skills.destroy', $skill->id) }}" method="POST" style="display:inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger">Delete</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    @endsection

</x-app-layout>