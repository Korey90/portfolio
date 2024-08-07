<x-app-layout>
    @section('title', 'Strona Główna')
    @section('meta_description', 'Opis strony głównej')
    @section('meta_keywords', 'słowo kluczowe1, słowo kluczowe2')
    @section('page_title', 'Witamy na naszej stronie')


    @section('content')
        <div class="container p-4">
        @include('partials.adminNavigation')
            <div class="d-flex justify-content-between">
                <h2>Create Work</h2>
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

            <form action="{{ route('works.store') }}" method="post">
                @csrf
                    <!-- Services -->
                    <div class="form-group mb-2">
                    <label for="service_id">Service and locale:</label>
                        <div class="d-flex">
                            <select class="form-select" id="service_id" name="service_id" aria-label="">
                                <option selected>Chose service</option>
                                @foreach($services as $service)
                                    <option value="{{ $service->id }}" {{ old('service_id') == $service->id ? 'selected' : '' }}>{{ $service->translations->where('locale', app()->getLocale())->first()->title }}</option>
                                @endforeach
                            </select>
       
                            <select class="form-select" name="locale" id="locale" aria-label="">
                                <option selected>Chose Language</option>
                                @foreach($locales as $locale => $key)
                                    <option value="{{ $locale }}" {{ old('locale') == $locale ? 'selected' : '' }}>{{ $key }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <div class="form-group mb-2">
                        <label for="title">Title:</label>
                        <input type="text" id="title" name="title" value="{{ old('title') }}" class="form-control" required placeholder="Work title">
                    </div>

                    <div class="form-group mb-2">
                        <label for="price">Min & Max price:</label>
                        <div class="d-flex">
                            <input type="number" id="min_price" value="{{ old('min_price') }}" name="min_price" class="form-control" required placeholder="Minimal price">
                            <input type="number" id="max_price" value="{{ old('max_price') }}" name="max_price" class="form-control" required placeholder="Maximum price">
                        </div>
                    </div>

                    <div class="form-group mb-2">
                        <label for="description">Desctiption: <small>(optional)</small></label>
                        <textarea name="description" id="description" rows="4" class="form-control">{{ old('description') }}</textarea>
                    </div>

                    <div class="form-group mb-2">
                        <label for="details">Details: <small>(optional)</small></label>
                        <textarea name="details" id="details" rows="4" class="form-control">{{ old('details') }}</textarea>
                    </div>
                      
                    <div class="form-group mb-2">
                        <label for="interval">Work interval</label>
                        <select class="form-select" id="interval" name="service_intervals[]" aria-label="" multiple>
                            <option value="one-time" {{ in_array('one-time', old('service_intervals', [])) ? 'selected' : '' }}>one time</option>
                            <option value="monthly" {{ in_array('monthly', old('service_intervals', [])) ? 'selected' : '' }}>monthly</option>
                        </select>
                    </div>

                    <hr>
                    <input type="submit" class="btn btn-primary" value="Zapisz">
moze work prosecc puzniej

            </form>
            
        </div>
    @endsection

</x-app-layout>