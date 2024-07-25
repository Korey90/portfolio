<nav class="navbar navbar-expand-lg bg-dark sticky-top">
        <div class="container">
            <a class="navbar-brand link-light" href="/">Konrad Szczepanik</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link link-light" href="{{ url('/#about') }}">O mnie</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link link-light" href="{{ url('/#skills') }}">Umiejętności</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link link-light" href="{{ url('/#projects') }}">Projekty</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link link-light" href="{{ url('/#services') }}">Usługi</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link link-light" href="{{ route('blog') }}">Blog</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link link-light" href="{{ url('/#contact') }}">Kontakt</a>
                    </li>
                </ul>
                <ul class="navbar-nav ms-auto">
                <!-- Dropdown menu for language selection -->
                <li class="nav-item dropdown ml-4">
                    <a class="nav-link link-light dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        Język
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <li><a class="dropdown-item px-1" href="#"><img src="img/pl.png" alt="polish" style="width:auto; height:20px;"> Polski</a></li>
                        <li><a class="dropdown-item px-1" href="#"><img src="img/en.png" alt="polish" style="width:auto; height:20px;"> Angielski</a></li>
                        <li><a class="dropdown-item px-1" href="#"><img src="img/pr.png" alt="polish" style="width:auto; height:20px;"> Portugalski</a></li>
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