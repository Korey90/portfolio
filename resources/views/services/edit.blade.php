<x-app-layout>
    @section('title', 'Strona Główna')
    @section('meta_description', 'Opis strony głównej')
    @section('meta_keywords', 'słowo kluczowe1, słowo kluczowe2')
    @section('page_title', 'Witamy na naszej stronie')

    @section('content')
        <div class="container p-4">
        @include('partials.adminNavigation')
            <div class="d-flex justify-content-between">
                <h2>Edit Service</h2>
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

            <form action="{{ route('services.update', $service->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
               <!-- Fields for different languages -->
               <div id="translations">
                    @php
                        $languages = ['pl' => 'Polski', 'en' => 'Angielski', 'pt' => 'Portugalski']
                    @endphp

                    @foreach($service->translations as $locale)
                        <!-- {{ $languages[$locale->locale] }} -->
                        <div class="form-group mb-2">
                            <h4 class="my-2">{{ $languages[$locale->locale] }}</h4>
                            <label for="translations[{{ $locale->locale }}][title]">Title:</label>
                            <input type="text" id="translations[{{ $locale->locale }}][title]" name="translations[{{ $locale->locale }}][title]"  value="{{ $locale->title }}" class="form-control slug" required>

                            <label for="translations[{{ $locale->locale }}][description]">Description:</label>
                            <textarea id="translations[{{ $locale->locale }}][description]" name="translations[{{ $locale->locale }}][description]" class="form-control" rows="5" required>{{ $locale->description }}</textarea>
                        </div>
                    @endforeach
                </div>

                <div class="form-group mb-2">
                    <label for="slug">Slug:</label>
                    <input type="text" id="slug" name="slug" class="form-control" value="{{ $service->slug }}" required >
                </div>

                <div class="form-group mb-2">
                    <label class="form-label"for="image">Image:</label>
                    <input class="form-control"type="file" id="image" name="image">
                    
                    @if ($service->image)
                        <p>Preview</p>
                        <img src="{{ asset('storage/' . $service->image) }}" alt="{{ $service->slug }}" style="width: 100px;">
                    @endif
                </div>
                <div class="form-group mb-2">
                    <label class="form-label" for="price">Min Price:</label>
                    <input class="form-control" type="text" value="{{ $service->min_price }}" id="min_price" name="min_price" required>
                    <label class="form-label" for="price">Max Price:</label>
                    <input class="form-control" type="text" value="{{ $service->max_price }}" id="max_price" name="max_price" required>
                </div>
                <br>
                <button class="btn btn-success" type="submit">Update</button>
            </form>
        </div>

    @endsection

</x-app-layout>