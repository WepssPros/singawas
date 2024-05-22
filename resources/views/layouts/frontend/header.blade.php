<header class="header" data-header>
    <div class="overlay" data-overlay></div>

    <div class="header-top">
        <div class="container">
            <a href="tel:+01123456790" class="helpline-box">
                <div class="icon-box">
                    <ion-icon name="call-outline"></ion-icon>
                </div>

                <div class="wrapper">
                    <p class="helpline-title">Untuk Pertanyaan Lebih Lanjut :</p>

                    <p class="helpline-number">+0741 (623123)</p>
                </div>
            </a>

            <a href="#" class="logo">
                <img style="width=" 193"; height="52" ; "
            src=" {{asset('../frontend/assets/images/logo.png')}}" alt="Logo" />
            </a>

            <div class="header-btn-group">
                <button class="search-btn" aria-label="Search">
                    <ion-icon name="search"></ion-icon>
                </button>

                <button class="nav-open-btn" aria-label="Open Menu" data-nav-open-btn>
                    <ion-icon name="menu-outline"></ion-icon>
                </button>
            </div>
        </div>
    </div>

    <div class="header-bottom">
        <div class="container">
            <ul class="social-list">
                <li>
                    <a href="#" class="social-link">
                        <ion-icon name="logo-facebook"></ion-icon>
                    </a>
                </li>

                <li>
                    <a href="#" class="social-link">
                        <ion-icon name="logo-twitter"></ion-icon>
                    </a>
                </li>

                <li>
                    <a href="#" class="social-link">
                        <ion-icon name="logo-youtube"></ion-icon>
                    </a>
                </li>
            </ul>

            <nav class="navbar" data-navbar>
                <div class="navbar-top">
                    <a href="#" class="logo">
                        <img src="{{asset('../frontend/assets/images/logo-blue.svg')}}" alt="Tourly logo" />
                    </a>

                    <button class="nav-close-btn" aria-label="Close Menu" data-nav-close-btn>
                        <ion-icon name="close-outline"></ion-icon>
                    </button>
                </div>

                <ul class="navbar-list">
                    <li>
                        <a href="#home" class="navbar-link" data-nav-link>home</a>
                    </li>

                    <li>
                        <a href="#" class="navbar-link" data-nav-link>about us</a>
                    </li>

                    <li>
                        <a href="#destination" class="navbar-link" data-nav-link>Sertifikat Kendaraan</a>
                    </li>

                    <li>
                        <a href="#package" class="navbar-link" data-nav-link>Inspector
                        </a>
                    </li>

                    @auth
                    @if(Auth::user()->roles == "ADMIN")
                    <li>
                        <a href="{{route('dashboard.index')}}" class="navbar-link" data-nav-link>Dashboard</a>
                    </li>
                    <li>
                        <a href="{{ route('logout') }}" class="navbar-link"
                            onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                            Logout
                        </a>
                    </li>

                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        @csrf
                    </form>
                    @else
                    <li>
                        <a href="{{ route('logout') }}" class="navbar-link"
                            onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                            Logout
                        </a>
                    </li>

                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        @csrf
                    </form>
                    @endif
                    @else
                    <li>
                        <a href="{{route('login')}}" class="navbar-link" data-nav-link>Login</a>
                    </li>
                    <li>
                        <a href="{{route('register')}}t" class="navbar-link" data-nav-link>register</a>
                    </li>
                    @endauth



                </ul>
            </nav>

            <button class="btn btn-primary">Daftarkan Kendaraan</button>
        </div>
    </div>
</header>