<x-app-layout>
    @section('title', 'Strona Główna')
    @section('meta_description', 'Opis strony głównej')
    @section('meta_keywords', 'słowo kluczowe1, słowo kluczowe2')
    @section('page_title', 'Witamy na naszej stronie')
   


    @section('content')

        <div class="alert alert-warning w-50 mx-auto my-2 text-center" role="alert">
            <h2>{{ __('welcome.notice') }}</h2>
            <p>{{ __('welcome.notice_message') }}</p>
            <br>
        </div>

        
        <section id="about" class="about">
            <div class="container">
                <h2 class="section-title" data-aos="fade-up">{{ __('menu.about-me') }}</h2>
                <div class="content">
                    <img src="{{ url('storage/'.$aboutMe->photo) }}" alt="Konrad Szczepanik" data-aos="fade-right" class="aos-init aos-animate">
                    <div class="text">
                        <p data-aos="fade-left">{!! $aboutMe->content !!}</p>
                    </div>
                </div>
            </div>
        </section>

        <section id="skills" class="skills">
            <div class="container">
                <h2 class="section-title" data-aos="fade-up">{{ __('menu.skills') }}</h2>
                <ul>
                    @forelse($skills as $skill)
                        <li data-aos="fade-up">
                            <i class="{{ $skill->icon }} icon"></i>
                            <div class="text">{{ $skill->name }}</div>
                            <div class="progress">
                                <div class="progress-bar bg-secondary" data-final-width="{{ $skill->proficiency }}" role="progressbar" style="width: 0%;" aria-label="{{ $skill->name }}" aria-valuemin="0" aria-valuemax="100"></div>
                            </div>
                        </li>
                    @empty
                        nic tu nie ma.
                    @endforelse
                </ul>
            </div>
        </section>


<section id="projects" class="projects bg-secondary">
    <div class="container">
        <h2 class="section-title text-center mb-5 text-light" data-aos="fade-up">{{ __('menu.projects') }}</h2>
        <div class="row" data-aos="fade-up">
            @foreach($projects as $project)
                <div class="col-md-4 mb-4 d-flex align-items-stretch">
                    <div class="card h-100 w-100 border-0">
                        <div class="project-item">
                            <img src="{{ url('storage/'.$project->image) }}" class="project-image card-img-top" alt="{{ $project->title }} image">
                        </div>
                        <div class="card-body d-flex flex-column position-relative">
                            <div class="d-flex justify-content-between">
                                <h5 class="card-title fw-bold">{{ $project->name }}</h5>
                                <a class="link-dark" data-bs-toggle="collapse" href="#{{ str_replace(' ', '', $project->name) }}" role="button" aria-expanded="false" aria-controls="collapseExample">
                                    <i class="bi bi-info-circle"></i>
                                </a>
                            </div>
                            <p class="card-text flex-grow-1">{{ $project->description }}</p>
                            <div class="collapse w-100 position-absolute top-50 start-0 aa" id="{{ str_replace(' ', '', $project->name) }}">
                              <div class="card card-body mb-2 border-0 shadow-sm">
                              <ul class="list-group">
                                    @forelse($project->techniques as $technique)
                                        <li class="list-group-item">{{ $technique->name }}</li>
                                    @empty
                                        Nic tu nie ma.
                                    @endforelse
                                </ul>
                              </div>
                            </div> 
                            <a href="{{ $project->end_point }}" class="btn btn-primary mt-auto" target="_blank">{{ __('welcome.project_preview') }}</a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</section>


        <section id="services" class="services py-5" style="background-color: #E8E8E8;">
            <div class="container">
                <h2 class="section-title py-3" data-aos="fade-up">{{ __('menu.services') }}</h2>
                <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3  g-4">
                    @forelse($services as $service)
                        <div class="col-md mb-4" data-aos="fade-up">
                            <div class="text-center px-0 px-md-5">
                                <a href="{{ route('service', $service->slug) }}" class="fs-3 fw-bold text-decoration-none link">{{ $service->translations->first()->title }}</a>
                            </div>
                            <div>
                                <img src="{{ url('storage/'.$service->image) }}" class="project-image" alt="Obrazek Serwis" data-aos="fade-up">

                            </div>
                            <div class="fs-5" style="text-align: justify;">
                                {{ $service->translations->first()->description }}
                            </div>
                        </div>
                    @empty
                        Nic tu nie ma.
                    @endforelse

                </div>

            </div>
        </section>


        <section id="contact" class="contact">
            <div class="container">
                <h2 class="section-title" data-aos="fade-up">{{ __('menu.contact') }}</h2>
                <form action="mailto:korey1910@wp.pl" method="post">
                    <input type="text" class="form-control" name="name" placeholder="{{ __('contact.name') }}" required data-aos="fade-up">
                    <input type="email" class="form-control" name="email" placeholder="{{ __('contact.email') }}" required data-aos="fade-up">
                    <textarea class="form-control" name="message" rows="5" placeholder="{{ __('contact.message') }}" required data-aos="fade-up"></textarea>
                    <button type="submit" class="btn btn-custom" data-aos="fade-up">{{ __('contact.submit') }}</button>
                </form>
            </div>
        </section>

        <script>
         AOS.init();
    </script>
    @endsection


</x-app-layout>