<x-app-layout>
    @section('title', 'Strona Główna')
    @section('meta_description', 'Opis strony głównej')
    @section('meta_keywords', 'słowo kluczowe1, słowo kluczowe2')
    @section('page_title', 'Witamy na naszej stronie')


    @section('content')
        <div class="container p-4">
        @include('partials.adminNavigation')
        <h2>Users & Roles</h2>
        <div class="card">
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
                
                <table class="table">
                    <thead>
                        <tr>
                            <th>Nazwa użytkownika</th>
                            <th>Role</th>
                            <th>Uprawnienia</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($users as $user)
                            <tr>
                                <td>{{ $user->name }}</td>
                                <td>

                                    @foreach ($user->roles as $role)
                                        <span class="badge bg-secondary">{{ $role->name }}</span>
                                        <a href="{{ route('remove.role', ['userId' => $user->id, 'role_id' => $role->id]) }}" class="text-danger" onclick="return confirm('Czy na pewno chcesz usunąć uprawnienie {{ $role->name }} użytkownikowi {{ $user->name }}?')"><i class="bi bi-trash3-fill"></i></a>
                                    @endforeach
                                </td>
                                <td>
                                    @foreach ($user->roles as $role)
                                        @foreach ($role->permissions as $permission)
                                            <span class="badge bg-success">{{ $permission->name }}</span>
                                            <a href="{{ route('remove.permission', ['roleId' => $role->id, 'permission_id' => $permission->id]) }}" class="text-danger" onclick="return confirm('Czy na pewno chcesz usunąć uprawnienie {{ $permission->name }} roli {{ $role->name }}?')"><i class="bi bi-trash3-fill"></i></a>
                                        @endforeach
                                    @endforeach
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
        </div>
        


    @endsection

</x-app-layout>