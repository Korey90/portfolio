<nav class="navbar navbar-expand-lg bg-dark w-100 sticky-top">
        <div class="container">
            <a class="navbar-brand link-light" href="/">Konrad Szczepanik</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link link-light" href="{{ url('/#about') }}">{{ __('menu.about-me') }}</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link link-light" href="{{ url('/#skills') }}">{{ __('menu.skills') }}</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link link-light" href="{{ url('/#projects') }}">{{ __('menu.projects') }}</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link link-light" href="{{ url('/#services') }}">{{ __('menu.services') }}</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link link-light" href="{{ route('blog') }}">{{ __('menu.blog') }}</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link link-light" href="{{ url('/#contact') }}">{{ __('menu.contact') }}</a>
                    </li>
                </ul>
                <ul class="navbar-nav ms-auto">
                <!-- Dropdown menu for language selection -->
                <li class="nav-item dropdown ml-4">
                    <a class="nav-link link-light dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        Language
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <li><a class="dropdown-item px-1" href="{{ route('lang.change', ['locale' => 'pl']) }}"><img src="{{ url('img/pl.png') }}" alt="polish" style="width:auto; height:20px;"> Polish</a></li>
                        <li><a class="dropdown-item px-1" href="{{ route('lang.change', ['locale' => 'en']) }}"><img src="{{ url('img/en.png') }}" alt="english" style="width:auto; height:20px;"> English</a></li>
                        <li><a class="dropdown-item px-1" href="{{ route('lang.change', ['locale' => 'pt']) }}"><img src="{{ url('img/pt.png') }}" alt="portuguese" style="width:auto; height:20px;"> Portuguese</a></li>
                    </ul>
                </li>

                @auth
                    <li class="nav-item">
                        <a class="nav-link link-light" href="{{ route('dashboard') }}">Dashboard</a>
                    </li>
                    <li class="nav-item">
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <x-nav-link class="nav-link link-light" :href="route('logout')"
                                    onclick="event.preventDefault();
                                                this.closest('form').submit();">
                                <i class="bi bi-box-arrow-right"></i>
                            </x-nav-link>
                        </form>
                    </li>
                @endauth
            </ul>
            </div>
        </div>
    </nav>
