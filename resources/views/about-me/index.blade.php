<x-app-layout>
    @section('title', 'Strona Główna')
    @section('meta_description', 'Opis strony głównej')
    @section('meta_keywords', 'słowo kluczowe1, słowo kluczowe2')
    @section('page_title', 'Witamy na naszej stronie')


    @section('content')
        <div class="container p-4">
            @include('partials.adminNavigation')

            @if (session('success'))
                <p>{{ session('success') }}</p>
            @endif

            <div class="d-flex justify-content-between">
                <h2>About Me</h2>
                <a href="{{ route('about-me.create') }}" class="link">Create New Record</a>
            </div>
            @foreach($aboutMe as $row)
                <div class="card mb-3" style="">
                  <div class="row g-0">
                    <div class="col-md-4">
                      <img src="{{ url('storage/'.$row->photo) }}" class="img-fluid rounded-start" alt="obrazek">
                    </div>
                    <div class="col-md-8">
                      <div class="card-body">
                        <h5 class="card-title">Język: {{ $row->locale }}</h5>
                        <p class="card-text">{!! $row->content !!}</p>
                        <p class="card-text"><small class="text-muted">{{ $row->updated_at }}</small></p>
                      </div>
                      <div class="p-2">
                          <button class="btn btn-primary">edit</button>
                          <button class="btn btn-danger">delete</button>
                      </div>
                    </div>
                  </div>
                </div>
            @endforeach
        </div>
    @endsection

</x-app-layout>