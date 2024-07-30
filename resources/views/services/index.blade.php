<x-app-layout>
    @section('title', 'Strona Główna')
    @section('meta_description', 'Opis strony głównej')
    @section('meta_keywords', 'słowo kluczowe1, słowo kluczowe2')
    @section('page_title', 'Witamy na naszej stronie')


    @section('content')


        <div class="container p-4">
        @include('partials.adminNavigation')
            <div class="d-flex justify-content-between">
                <h2>Services</h2>

                <a href="{{ route('services.create') }}" class="link">Create New Service</a>
            </div>

            @if (session('success'))
            <p>{{ session('success') }}</p>
            @endif

            <table class="table">
                <thead>
                    <tr>
                        <th>Title</th>
                        <th>Photo</th>
                        <th>Description</th>
                        <th>Price</th>
                        <th>Actions</th>
                    </tr>
                </thead>
            <tbody>
                @foreach ($services as $service)
                    <tr>
                        <td>
                            <a class="link mb-2" href="{{ route('services.show', $service->id ) }}">
                               Szczegóły <i class="bi bi-eye"></i>
                            </a>

                            <p>
                                @foreach($service->translations as $title)
                                    <img src="{{ url('img/'.$title->locale.'.png') }}" style="height: 20px;" alt="{{ $title->locale }}"> - {{ $title->title }} <br>
                                @endforeach
                            </p>
                        </td>
                        <td>
                            <img src="{{ url('storage/'.$service->image) }}" style="max-width: 150px;" alt="{{ $service->title }}">
                        </td>
                        <td>
                            <p class="w-75">
                                @foreach($service->translations as $description)
                                <img src="{{ url('img/'.$description->locale.'.png') }}" style="height: 20px;" alt="{{ $description->locale }}"> - {{ $description->description }} <br>
                                @endforeach
                            </p>
                        </td>
                        <td>
                            Price from: ${{ $service->min_price }} to ${{ $service->max_price }}
                        </td>
                        <td>
                            <a class="btn btn-primary" href="{{ route('services.edit', $service->id) }}">Edit</a>
                            <form action="{{ route('services.destroy', $service->id) }}" method="POST" style="display: inline;">
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

    @endsection

</x-app-layout>