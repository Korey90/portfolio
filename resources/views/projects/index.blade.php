<x-app-layout>
    @section('title', 'Skills')
    @section('meta_description', 'Opis strony głównej')
    @section('meta_keywords', 'słowo kluczowe1, słowo kluczowe2')
    @section('page_title', 'Witamy na naszej stronie')


    @section('content')

    <style>
        .hidden-image {
            display: none;
            position: absolute; /* Pozwala na umieszczenie obrazka w określonym miejscu */
            width: 100px; /* Szerokość miniatury */
            height: auto; /* Automatyczne dostosowanie wysokości */
            z-index: 1000; /* Zapewnia, że obrazek będzie na wierzchu innych elementów */
        }
        .icon-container {
            left:10px;
            position: relative; /* Ustawienie pozycji dla elementu nadrzędnego */
            display: inline-block; /* Umożliwia wyświetlanie wielu ikon w linii */
        }
    </style>

    <div class="container p-4">
    @include('partials.adminNavigation')
    <div class="d-flex justify-content-between">
        <h2>Projects</h2>
        <a class="link" href="{{ route('projects.create') }}">Create New Project</a>

    </div>
    <table class="table">
        <thead>
            <tr>
                <th>Name</th>
                <th>Techniques</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
        @foreach ($projects as $project)
            <tr>
                <td>
                    <a class="link" href="{{ route('projects.show', $project->id) }}">{{ $project->name }}</a> 
                    <div class="icon-container">
                        <i class="bi bi-eye-fill" style="cursor: pointer;">
                            <img src="{{ url('storage/'.$project->image) }}" class="hidden-image" alt="obrazek">
                        </i>
                    </div>
                </td>
                <td>
                @forelse($project->techniques as $technique)
                        {{ $technique->name }},
                    @empty
                        Nic tu nie ma
                    @endforelse
                </td>
                <td>
                    <a class="btn btn-primary" href="{{ route('projects.edit', $project->id) }}">Edit</a>
                    <form action="{{ route('projects.destroy', $project->id) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-danger" type="submit">Delete</button>
                    </form>
                </td>

                       
                
                
            </tr>
        @endforeach
        </tbody>
</table>
        
    </div>

    <script>
        $(document).ready(function() {
            $('.icon-container').hover(
                function() {
                    $(this).find('.hidden-image').fadeIn('ease'); // Pokaż obrazek
                }, 
                function() {
                    $(this).find('.hidden-image').fadeOut(); // Ukryj obrazek
                }
            );
        });
    </script>

    @endsection

</x-app-layout>