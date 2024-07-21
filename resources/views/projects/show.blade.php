<x-app-layout>
    @section('title', 'Skills')
    @section('meta_description', 'Opis strony głównej')
    @section('meta_keywords', 'słowo kluczowe1, słowo kluczowe2')
    @section('page_title', 'Witamy na naszej stronie')


    @section('content')
    <div class="container p-4">

    <h1>Project Details</h1>
    <p>Name: {{ $project->name }}</p>
    <p>Description: {{ $project->description }}</p>
    @if ($project->image)
        <img src="{{ asset('storage/' . $project->image) }}" alt="Project Image">
    @endif
    <p>Techniques:
        <ul>
            @foreach ($project->techniques as $technique)
                <li>{{ $technique->name }}</li>
            @endforeach
        </ul>
    </p>
    <a href="{{ route('projects.index') }}">Back to list</a>
        
    </div>
    @endsection

</x-app-layout>