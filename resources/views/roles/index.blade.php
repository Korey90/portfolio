<x-app-layout>
    @section('title', 'Strona Główna')
    @section('meta_description', 'Opis strony głównej')
    @section('meta_keywords', 'słowo kluczowe1, słowo kluczowe2')
    @section('page_title', 'Witamy na naszej stronie')


    @section('content')
        <div class="container p-4">
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
                
                <ul>
                    @forelse ($roles as $role)
                        <li>
                            {{ $role->name }} - <a href="{{ route('roles.edit', $role->id) }}">Edytuj</a> 
                            <form action="{{ route('roles.destroy', $role->id) }}" method="POST" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger" onclick="return confirm('Czy na pewno chcesz usunąć Rolę {{ $role->name }} ?')"><i class="bi bi-trash3-fill"></i></button>
                            </form>
                            <br>
                            {{ $role->description }} <br>
                            <b>Uprawnienia:</b> 
                            @forelse($role->permissions as $permission)
                                <span class="badge bg-secondary">{{ $permission->name }}</span>  
                            @empty
                                Brak ustawionych uprawnień dla tej roli.
                            @endforelse
                        </li>
    
                    @empty
                        <p class="fs-4 fw-400 p-4">Brak ról do wyświetlenia</p>
                        <a href="{{ route('roles.create') }}">Create New</a> 
                    @endforelse
                </ul>
            </div>
        </div>
        </div>


    @endsection

</x-app-layout>