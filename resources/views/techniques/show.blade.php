<x-app-layout>
    @section('title', 'Skills')
    @section('meta_description', 'Opis strony głównej')
    @section('meta_keywords', 'słowo kluczowe1, słowo kluczowe2')
    @section('page_title', 'Witamy na naszej stronie')


    @section('content')
    <div class="container p-4">
        <h1>Technique Details</h1>
        <p>Name: {{ $technique->name }}</p>
        <a href="{{ route('techniques.index') }}">Back to list</a>    
    </div>
    @endsection

</x-app-layout>