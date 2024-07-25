<x-app-layout>
    @section('title', 'Strona Główna')
    @section('meta_description', 'Opis strony głównej')
    @section('meta_keywords', 'słowo kluczowe1, słowo kluczowe2')
    @section('page_title', 'Witamy na naszej stronie')


    @section('content')
        <div class="container p-4 text-center">
            <h1 class="fw-bold mb-4 display-2">{{ $post->title }}</h1>

            <img src="{{ url('storage/'.$post->image) }}" class="img-thumbnail mb-4 w-50" alt="{{ $post->title }}">
            <div class="container mb-3" style="text-align: justify;">
                <div class="fs-5 p-2">{!! $post->description !!}</div>
                <div class="fs-5 p-2">{!! $post->content !!}</div>
            </div>

            <div class="d-flex justify-content-between text-start">
                <div class="">
                    <b>Category:</b> <span class="badge rounded-pill text-bg-primary">{{ $post->category->name }}</span>
                </div>
                <div class="">
                    <b>Created at:</b> {{ $post->created_at}}
                </div>
            </div>
        </div>
        <div class="container border p-4">
            Other post / call to action here. Soming soon <br>
            <a class="nav-link text-success" href="{{ route('blog') }}">Back to blog</a>
        </div>
    @endsection

</x-app-layout>