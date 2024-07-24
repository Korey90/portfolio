<x-app-layout>
    @section('title', 'Strona Główna')
    @section('meta_description', 'Opis strony głównej')
    @section('meta_keywords', 'słowo kluczowe1, słowo kluczowe2')
    @section('page_title', 'Witamy na naszej stronie')
   


    @section('content')
        
        <section id="about" class="about">
            <div class="container">
                <h2 class="section-title" data-aos="fade-up">O mnie</h2>
                <div class="content">
                    <img src="img/face.jpg" alt="Konrad Szczepanik" data-aos="fade-right">
                    <div class="text">
                        <p data-aos="fade-left">Witaj! Mam na imię Konrad i mam 34 lata. Od najmłodszych lat pasjonuję się komputerami. W wieku 10 lat stworzyłem swoją pierwszą stronę internetową, kiedy design opierał się jeszcze na tabelkach. Ukończyłem Technikum nr 9 w Łodzi, zdobywając specjalizację w zakresie "sieci i zarządzania siecią". Web development to moja pasja, a cała moja wiedza w tym zakresie wynika z osobistej determinacji i chęci poznawania nowych technologii webowych.</p>
                        <p data-aos="fade-left">Posiadam biegłą znajomość języków programowania takich jak HTML(5), CSS, JavaScript, PHP i Python. Dodatkowo, doskonale orientuję się w technologiach takich jak TypeScript oraz Sass. Najczęściej korzystam z frameworków takich jak Laravel, jQuery i Bootstrap. Mam również doświadczenie w korzystaniu z usług Google, w tym Google Analytics, Google Ads, Google Tag Manager, Google Script i wielu innych.</p>
                    </div>
                </div>
            </div>
        </section>

        <section id="skills" class="skills">
            <div class="container">
                <h2 class="section-title" data-aos="fade-up">Umiejętności</h2>
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
                <h2 class="section-title" data-aos="fade-up">Projekty</h2>
                <ul>
                    @forelse($projects as $project)
                        <li data-aos="fade-up">
                            <div class="project-item">
                                <a href="{{ $project->end_point }}" class="fs-3 fw-bold text-decoration-none link">{{ $project->name }}</a>
                                <img src="{{ url('storage/'.$project->image) }}" class="project-image" alt="Obrazek Sklep">
                                <div class="project-text bg-dark">
                                    Wykożystane Tehnologie:
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
                        </li>
                    @empty
                        Nic tu nie ma.
                    @endforelse

                </ul>
            </div>
        </section>

        <section id="services" class="services py-5" style="background-color: #E8E8E8;">
            <div class="container">
                <h2 class="section-title py-3" data-aos="fade-up">Usługi</h2>
                <div class="row row-cols-3 g-2">
                    @forelse($services as $service)
                        <div class="col mb-4" data-aos="fade-up">
                            <div class="text-center px-2 w-75 mx-auto">
                                <a href="{{ route('services.show', $service->id) }}" class="fs-3 fw-bold text-decoration-none link">{{ $service->title }}</a>
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
                <h2 class="section-title" data-aos="fade-up">Kontakt</h2>
                <form action="mailto:korey1910@wp.pl" method="post">
                    <input type="text" class="form-control" name="name" placeholder="Imię i nazwisko" required data-aos="fade-up">
                    <input type="email" class="form-control" name="email" placeholder="Adres email" required data-aos="fade-up">
                    <textarea class="form-control" name="message" rows="5" placeholder="Twoja wiadomość" required data-aos="fade-up"></textarea>
                    <button type="submit" class="btn btn-custom" data-aos="fade-up">Wyślij</button>
                </form>
            </div>
        </section>

        <script>
         AOS.init();
    </script>
    @endsection


</x-app-layout>