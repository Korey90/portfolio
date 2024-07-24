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
                @forelse ($permissions as $permission)
                    <li>
                        {{ $permission->name }} - <a href="{{ route('permissions.edit', $permission->id) }}">Edytuj</a> 
                        <form action="{{ route('permissions.destroy', $permission->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn text-danger" onclick="return confirm('Czy na pewno chcesz usunąć Uprawnienie {{ $permission->name }} ?')"><i class="bi bi-trash3-fill"></i></button>
                        </form>
                        <br>
                        {{ $permission->description }}
                    </li>

                @empty
                    <p class="fs-4 fw-400 p-4">Brak uprawnień do wyświetlenia</p>
                    <a href="{{ route('permissions.create') }}">Create New</a> 
                @endforelse
            </ul>
        </div>
    </div>
        </div>
        


    @endsection

</x-app-layout>