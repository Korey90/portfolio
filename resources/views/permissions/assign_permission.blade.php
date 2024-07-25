<x-app-layout>
    @section('title', 'Strona Główna')
    @section('meta_description', 'Opis strony głównej')
    @section('meta_keywords', 'słowo kluczowe1, słowo kluczowe2')
    @section('page_title', 'Witamy na naszej stronie')


    @section('content')
        <div class="container p-4">
            @include('partials.adminNavigation')
            <h2>Assign Permission</h2>
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

                <form action="{{ route('assign.permission') }}" method="POST">
                    @method('POST')
                    @csrf
                    <div class="form-group">
                        <label for="role_id" class="form-label">Rola:</label>
                        <select name="role_id" id="role_id" class="form-control" required>
                            @foreach ($roles as $role)
                                <option value="{{ $role->id }}">{{ $role->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="permission_id" class="form-label">Uprawnienie:</label>
                        <select name="permission_id" id="permission_id" class="form-control" required>
                            @foreach ($permissions as $permission)
                                <option value="{{ $permission->id }}">{{ $permission->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <button type="submit my-2" class="btn btn-primary my-2">Przypisz uprawnienie</button>
                </form>
            </div>
        </div>        
        </div>
        


    @endsection

</x-app-layout>