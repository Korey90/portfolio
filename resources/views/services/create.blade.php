<x-app-layout>
    @section('title', 'Strona Główna')
    @section('meta_description', 'Opis strony głównej')
    @section('meta_keywords', 'słowo kluczowe1, słowo kluczowe2')
    @section('page_title', 'Witamy na naszej stronie')


    @section('content')
        <div class="container p-4">
        @include('partials.adminNavigation')
            <div class="d-flex justify-content-between">
                <h2>Create Service</h2>
                <a href="{{ route('services.index') }}" class="link">Back to list</a>
            </div>

            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form action="{{ route('services.store') }}" method="POST" enctype="multipart/form-data">
                @csrf

                <!-- Fields for different languages -->
                <div id="translations">
                    <!-- English -->
                    <div class="form-group">
                        <h4 class="my-2">English</h4>
                        <label for="translations[en][title]">Title:</label>
                        <input type="text" id="translations[en][title]" name="translations[en][title]" class="form-control slug" required>

                        <label for="translations[en][description]">Description:</label>
                        <textarea id="translations[en][description]" name="translations[en][description]" class="form-control" rows="5" required></textarea>
                    </div>

                    <!-- Portugese -->
                    <div class="form-group">
                        <h4 class="my-2">Portugese</h4>
                        <label for="translations[pt][title]">Title:</label>
                        <input type="text" id="translations[pt][title]" name="translations[pt][title]" class="form-control" required>

                        <label for="translations[pt][description]">Description:</label>
                        <textarea id="translations[pt][description]" name="translations[pt][description]" class="form-control" rows="5" required></textarea>
                    </div>

                    <!-- Polish -->
                    <div class="form-group">
                        <h4 class="my-2">Polish</h4>
                        <label for="translations[pl][title]">Title:</label>
                        <input type="text" id="translations[pl][title]" name="translations[pl][title]" class="form-control" required>

                        <label for="translations[pl][description]">Description:</label>
                        <textarea id="translations[pl][description]" name="translations[pl][description]" class="form-control" rows="5" required></textarea>
                    </div>
                </div>

                <div class="form-group">
                    <label for="slug">Slug:</label>
                    <input type="text" id="slug" name="slug" class="form-control" required>
                </div>

                <div class="form-group">
                    <label class="form-label"for="image">Image:</label>
                    <input class="form-control"type="file" id="image" name="image">
                    
                    <label class="form-label" for="price">Min Price:</label>
                    <input class="form-control" type="text" id="min_price" name="min_price" required>
                    <label class="form-label" for="price">Max Price:</label>
                    <input class="form-control" type="text" id="max_price" name="max_price" required>
                </div>
                <br>
                <button class="btn btn-success" type="submit">Create</button>
            </form>


          
        </div>

    @endsection

</x-app-layout>