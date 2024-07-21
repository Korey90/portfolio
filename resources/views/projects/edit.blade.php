<x-app-layout>
    @section('title', 'Skills')
    @section('meta_description', 'Opis strony głównej')
    @section('meta_keywords', 'słowo kluczowe1, słowo kluczowe2')
    @section('page_title', 'Witamy na naszej stronie')


    @section('content')
    <div class="container p-4">

        <h1>Edit Project</h1>
        <form action="{{ route('projects.update', $project->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <label for="name">Name:</label>
            <input type="text" id="name" name="name" value="{{ $project->name }}" required>
            <br>
            <label for="description">Description:</label>
            <textarea id="description" name="description" required>{{ $project->description }}</textarea>
            <br>
            <label for="image">Image:</label>
            <input type="file" id="image" name="image">
            <br>
            <label for="technique_ids">Techniques:</label>
            <select id="technique_ids" name="technique_ids[]" multiple required>
                @foreach ($techniques as $technique)
                    <option value="{{ $technique->id }}" {{ in_array($technique->id, $project->techniques->pluck('id')->toArray()) ? 'selected' : '' }}>
                        {{ $technique->name }}
                    </option>
                @endforeach
            </select>
            <br>
            <button type="submit">Save</button>
        </form>
        <a href="{{ route('projects.index') }}">Back to list</a>
        
    </div>
    @endsection

</x-app-layout>