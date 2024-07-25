<x-app-layout>
    @section('title', 'Strona Główna')
    @section('meta_description', 'Opis strony głównej')
    @section('meta_keywords', 'słowo kluczowe1, słowo kluczowe2')
    @section('page_title', 'Witamy na naszej stronie')


    @section('content')
        <div class="container p-4">
            @include('partials.adminNavigation')
            <div class="d-flex justify-content-between">
                <h2>Skill Details</h2>
                <a href="{{ route('skills.index') }}" class="link">Back to list</a>
            </div>

            <p>Name: {{ $skill->name }}</p>
            <p>Proficiency: {{ $skill->proficiency }}</p>
            <p>Icon: {{ $skill->icon }}</p>
            <p>Active: {{ $skill->active ? 'Yes' : 'No' }}</p>
        </div>

    @endsection

</x-app-layout>