<x-app-layout>
    @section('title', 'Strona Główna')
    @section('meta_description', 'Opis strony głównej')
    @section('meta_keywords', 'słowo kluczowe1, słowo kluczowe2')
    @section('page_title', 'Witamy na naszej stronie')


    @section('content')
        <div class="container p-4">
        @include('partials.adminNavigation')
        <h2>Create Permission</h2>
        <div class="card w-50 mx-auto">
            <div class="card-body">
                @if(session('success'))
                    <div class="alert alert-success">
                        {{ session('success') }}
                    </div>
                @elseif(session('error'))
                    <div class="alert alert-danger">
                        {{ session('error') }}
                    </div>
                @endif

                @if ($permission->exists)
                    <form action="{{ route('permissions.update', $permission->id) }}" method="POST">
                    @method('PUT')
                @else
                    <form action="{{ route('permissions.store') }}" method="POST">
                        @method('POST')
                @endif
                @csrf
                    <div class="form-group">
                        <label for="name" class="form-label">Nazwa dla nowego uprawnienia:</label>
                        <input type="text" class="form-control" id="name" name="name" value="{{ $permission->name ?? '' }}" required>
                    </div>
                    <div class="form-group">
                        <label for="description" class="form-label">Opis uprawnienia:</label>
                        <input type="text" class="form-control" id="description" name="description" value="{{ $permission->description ?? '' }}">
                    </div>

                    <button type="submit" class="my-2 btn btn-primary">Zapisz</button>
                    </form>                
            </div>
        </div>
        </div>
        


    @endsection

</x-app-layout>