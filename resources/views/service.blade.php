<x-app-layout>
    @section('title', 'Service - '.$service->translations->first()->title)
    @section('meta_description', $service->translations()->first()->description)
    @section('meta_keywords', 'słowo kluczowe1, słowo kluczowe2')
    @section('page_title', $service->title)


    @section('content')
        <div class="container p-4">
            <div class="row">
                <div class="col-md-2">
                    <img src="{{ url('storage/'.$service->image) }}" alt="{{ $service->title }}" style="max-width: 200px;">
                </div>
                <div class="col-md">
                    <div class="row">
                        <div class="col-md-6 text-center">
                            <h2 class="fw-bold">{{ $service->translations->first()->title }}</h2>
                            <p class="text-muted">Service:</p>
                        </div>
                        <div class="col-md-6 text-center">
                            <h2 class="fw-bold">£{{ $service->min_price }}</h2>
                            <p class="text-muted">Pricing from:</p>
                        </div>
                        <div class="col-md-12 text-center">
                            <h2 class="fw-bold">{{ $service->translations->first()->description }}</h2>
                            <p class="text-muted">Description:</p>
                        </div>
                    </div>

                </div>
            </div>
            <hr>
            <span>Here we will list all the works within the scope of this service. WORK IN PROGRESS</span>
     
            
        </div>
    @endsection

</x-app-layout>