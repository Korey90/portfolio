<x-app-layout>
    @section('title', 'Skills')
    @section('meta_description', 'Opis strony głównej')
    @section('meta_keywords', 'słowo kluczowe1, słowo kluczowe2')
    @section('page_title', 'Witamy na naszej stronie')


    @section('content')
    <style>
        .image{
            width: 150px;
        }
    </style>
        <div class="container p-4">
            @include('partials.adminNavigation')
            <div class="d-flex justify-content-between">
                <h2>Project Details</h2>
                <a href="{{ route('projects.index') }}" class="link">Back to list</a>
            </div>
            <hr>
            <div class="row">
                <div class="col-md-2">
                    <h4>ScreenShot</h4>
                    @if ($project->image)
                        <img class="image" src="{{ asset('storage/' . $project->image) }}" alt="Project Image">
                    @else
                        <p class="text-muted">Brak obrazka</p>
                    @endif
                </div>
                <div class="col-md">
        <div class="row">



                    <div class="col-md-4 text-center">
                        <h5 class="fw-bold">{{ $project->name }}</h5>
                        <p class="text-muted">Name:</p>
                    </div>
                    <div class="col-md-4 text-center">
                        <h5 class="fw-bold">{{ $project->description }}</h5>
                        <p class="text-muted">Description:</p>
                    </div>
                    
                    <div class="col-md-4 text-center">
                        <div class="d-flex">
                            @foreach ($project->techniques as $technique)
                                <h5 class="fw-bold px-1">{{ $technique->name }}</h5>
                            @endforeach
                        </div>
                        <p class="text-muted">Techniques:</p>
                    </div>

                    <div class="col-md-4 text-center">
                        <h5 class="fw-bold">{{ $project->created_at }}</h5>
                        <p class="text-muted">Creaqted at:</p>
                    </div>

                    <div class="col-md-4 text-center">
                        <h5 class="fw-bold">{{ $project->updated_at }}</h5>
                        <p class="text-muted">Updated at:</p>
                    </div>
                    
         
        </div>
                <hr>

                </div>
            </div>


        
    </div>
    @endsection

</x-app-layout>