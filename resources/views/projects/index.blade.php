<x-app-layout>
    @section('title', 'Skills')
    @section('meta_description', 'Opis strony głównej')
    @section('meta_keywords', 'słowo kluczowe1, słowo kluczowe2')
    @section('page_title', 'Witamy na naszej stronie')


    @section('content')
    <div class="container p-4">

    <h1>Projects</h1>
    <a href="{{ route('projects.create') }}">Create New Project</a>
    <ul>
        @foreach ($projects as $project)
            <li>
                <a href="{{ route('projects.show', $project->id) }}">{{ $project->name }}</a>
                <p>Techniques: <br>
                    @forelse($project->techniques as $technique)
                        {{ $technique->name }} <br>
                    @empty
                        Nic tu nie ma
                    @endforelse
       
                </p>
                <a href="{{ route('projects.edit', $project->id) }}">Edit</a>
                <form action="{{ route('projects.destroy', $project->id) }}" method="POST" style="display:inline;">
                    @csrf
                    @method('DELETE')
                    <button type="submit">Delete</button>
                </form>
            </li>
        @endforeach
    </ul>
        
    </div>
    @endsection

</x-app-layout>