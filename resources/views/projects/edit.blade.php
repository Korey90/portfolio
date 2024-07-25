<x-app-layout>
    @section('title', 'Skills')
    @section('meta_description', 'Opis strony głównej')
    @section('meta_keywords', 'słowo kluczowe1, słowo kluczowe2')
    @section('page_title', 'Witamy na naszej stronie')

    @section('content')
    <style>
        .image {
            width: 120px;
        }
    </style>

    <div class="container p-4">
    @include('partials.adminNavigation')
        <div class="d-flex justify-content-between">
            <h2>Edit Project: {{ $project->name }}</h2>
            <a href="{{ route('projects.index') }}" class="link">Back to list</a>
        </div>

        <form action="{{ route('projects.update', $project->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="row">
                <div class="col-2">
                    <h4>Image Preview</h4>
                    <img src="{{ url('storage/'.$project->image) }}" alt="obrazek projektu" class="image" id="preview-image">
                </div>
                <div class="col">
                    <label class="form-label" for="name">Name:</label>
                    <input class="form-control" type="text" id="name" name="name" value="{{ $project->name }}" required>
                    <br>
                    <label class="form-label" for="description">Description:</label>
                    <textarea class="form-control" rows="7" id="description" name="description" required>{{ $project->description }}</textarea>
                    <br>
                    <label class="form-label" for="image">Image:</label>
                    <input class="form-control" type="file" id="image" name="image">
                    <br>
                    <label class="form-label" for="technique_ids">Techniques:</label>
                    <select class="form-select" size="12" id="technique_ids" name="technique_ids[]" multiple required>
                        @foreach ($techniques as $technique)
                            <option value="{{ $technique->id }}" {{ in_array($technique->id, $project->techniques->pluck('id')->toArray()) ? 'selected' : '' }}>
                                {{ $technique->name }}
                            </option>
                        @endforeach
                    </select>
                    <br>
                    <button class="btn btn-success" type="submit">Save</button>
                </div>
            </div>
        </form>
        
    </div>


    <script>
        $(document).ready(function() {
            $('#image').change(function(e) {
                var reader = new FileReader();
                reader.onload = function(e) {
                    $('#preview-image').attr('src', e.target.result);
                }
                reader.readAsDataURL(this.files[0]);
            });
        });
    </script>
    @endsection

</x-app-layout>