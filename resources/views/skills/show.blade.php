<x-app-layout>
    @section('title', 'Strona Główna')
    @section('meta_description', 'Opis strony głównej')
    @section('meta_keywords', 'słowo kluczowe1, słowo kluczowe2')
    @section('page_title', 'Witamy na naszej stronie')


    @section('content')
    
        <div class="content">
            <h1>Skill Details</h1>
            <p>Name: {{ $skill->name }}</p>
            <p>Proficiency: {{ $skill->proficiency }}</p>
            <p>Icon: {{ $skill->icon }}</p>
            <p>Active: {{ $skill->active ? 'Yes' : 'No' }}</p>
            <a href="{{ route('skills.index') }}">Back to list</a>
        </div>

    @endsection

</x-app-layout>