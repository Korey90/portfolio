<x-app-layout>
    @section('title', 'Strona Główna')
    @section('meta_description', 'Opis strony głównej')
    @section('meta_keywords', 'słowo kluczowe1, słowo kluczowe2')
    @section('page_title', 'Witamy na naszej stronie')
   


    @section('content')

    <section>
        <div class="alert alert-danger">
            <h2>UWAGA</h2>

            Aktualnie strona jest w fazie wykonczeniowej!
            <br>
            <p>{{ __('auth.password') }}</p>
            {{   App::getLocale() }}
        </div>
    </section>
        
        <section id="about" class="about">
            <div class="container">
                <h2 class="section-title" data-aos="fade-up">{{ __('menu.about-me') }}</h2>
                <div class="content">
                    <img src="img/face.jpg" alt="Konrad Szczepanik" data-aos="fade-right">
                    <div class="text">
                        <p data-aos="fade-left">Hello! My name is Konrad, and I am 34 years old. I've been passionate about computers since a young age. At the age of 10, I created my first website, back when design was based on tables. I graduated from Technical School No. 9 in Łódź, specializing in "networking and network management." Web development is my passion, and all my knowledge in this field comes from personal determination and a desire to learn new web technologies.</p>
                        <p data-aos="fade-left">I have a proficient knowledge of programming languages such as HTML(5), CSS, JavaScript, PHP, and Python. Additionally, I am well-versed in technologies like TypeScript and Sass. I frequently use frameworks such as Laravel, jQuery, and Bootstrap. I also have experience with Google services, including Google Analytics, Google Ads, Google Tag Manager, Google Script, and many others.</p>
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

        <section id="projects" class="projects">
            <div class="container">
                <h2 class="section-title" data-aos="fade-up">{{ __('menu.projects') }}</h2>
                <div class="row">
                    @forelse($projects as $project)
                        <div class="col-md-4 mb-4" data-aos="fade-up">
                            <div class="project-item">
                                <h3 class="text-center p-2">
                                    <a href="{{ $project->end_point }}" class="fw-bold nav-link link-dark">{{ $project->name }}</a>
                                </h3>
                                <img src="{{ url('storage/'.$project->image) }}" class="project-image" alt="Obrazek Sklep">
                                <div class="project-text bg-dark">
                                    Used in project:
                                    <ul class="bg-dark">
                                        @forelse($project->techniques as $technique)
                                            <li class="bg-dark text-light">{{ $technique->name }}</li>
                                        @empty
                                            Nic tu nie ma.
                                        @endforelse
                                    </ul>
                                    {{ $project->description }}
                                </div>
                            </div>
                        </div>
                    @empty
                        Nic tu nie ma.
                    @endforelse

                </div>
            </div>
        </section>

        <section id="services" class="services py-5" style="background-color: #E8E8E8;">
            <div class="container">
                <h2 class="section-title py-3" data-aos="fade-up">{{ __('menu.services') }}</h2>
                <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3  g-2">
                    @forelse($services as $service)
                        <div class="col-md mb-4" data-aos="fade-up">
                            <div class="text-center px-0 px-md-5">
                                <a href="{{ route('service', str_replace(' ', '-', $service->title)) }}" class="fs-3 fw-bold text-decoration-none link">{{ $service->title }}</a>
                            </div>
                            <div>
                                <img src="{{ url('storage/'.$service->image) }}" class="project-image" alt="Obrazek Serwis" data-aos="fade-up">

                            </div>
                            <div class="fs-5">
                                {{ $service->description }}
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