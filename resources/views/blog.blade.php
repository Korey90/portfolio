<x-app-layout>
    @section('title', 'Strona Główna')
    @section('meta_description', 'Opis strony głównej')
    @section('meta_keywords', 'słowo kluczowe1, słowo kluczowe2')
    @section('page_title', 'Witamy na naszej stronie')


    @section('content')
        <div class="container p-4">
            <h1 class="text-center display-1 fw-bold">Blog</h1>

            <ul class="nav nav-underline mb-4">
                @foreach($categories as $category)
                    <li class="nav-item">
                        <a class="nav-link link-secondary" aria-current="page" href="">{{ $category->name }}</a>
                    </li>
                @endforeach
            </ul>
   

            @forelse($posts as $post)
                <div class="row mb-4">
                    <div class="col-md-2">
                    <img src="{{ url('storage/'.$post->image) }}" class="img-thumbnail" alt="{{ $post->title }}">
                    </div>
                    <div class="col-md">
                        <h2 class="fw-bold"><a class="nav-link link-dark" href="{{ route('post', str_replace(' ', '-', $post->title)) }}">{{ $post->title }}</a></h2>
                        <hr class="">
                        <div class="d-flex justify-content-between">
                            <div class="">
                                <span class="badge rounded-pill text-bg-primary">{{ $post->category->name }}</span>
                            </div>
                            <div class=""><b>Created at:</b> {{ $post->created_at}}</div>
                        </div>
                        <p class="fs-5">{!! $post->description !!}</p>
                        <a href="{{ route('post', str_replace(' ', '-', $post->title)) }}" class="nav-link link-primary">Read More..</a>
                    </div>
                </div>
                
            @empty
                Nic tu nie ma.
            @endforelse
            
        </div>
    @endsection

</x-app-layout>