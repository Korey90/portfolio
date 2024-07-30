<x-app-layout>
    @section('title', 'Strona Główna')
    @section('meta_description', 'Opis strony głównej')
    @section('meta_keywords', 'słowo kluczowe1, słowo kluczowe2')
    @section('page_title', 'Witamy na naszej stronie')


    @section('content')
        <div class="container p-4">
        @include('partials.adminNavigation')

        <div class="d-flex justify-content-between">
                <h2>Create About me</h2>
                <a href="{{ route('about-me.index') }}" class="link">Back to list</a>
            </div>

                @if(session('success'))
                    <div class="alert alert-success">
                        {{ session('success') }}
                    </div>
                @elseif(session('error'))
                    <div class="alert alert-danger">
                        {{ session('error') }}
                    </div>
                @endif

                    <form action="{{ route('about-me.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('POST')

                    <div class="form-group mb-2">
                        <label class="form-label" for="locale">Language:</label>
                        <select class="form-select" id="locale" name="locale" required>
                            @foreach (config('app.locales') as $key => $locale)
                                <option value="{{ $key }}">
                                    {{ $key }} - {{ $locale }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group mb-2">
                        <label for="content" class="form-label">Content:</label>
                        <textarea name="content" class="form-control" rows="8" id="content"></textarea>
                    </div>
                    <div class="form-group mb-2">
                        <label class="form-label" for="photo">Image:</label>
                        <input class="form-control" type="file" id="photo" name="photo">
                    </div>

                    <button type="submit" class="my-2 btn btn-primary">Zapisz</button>
                    </form>                
            </div>

    @endsection

</x-app-layout>