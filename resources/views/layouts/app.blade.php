<!doctype html>
<html lang="{{ str_replace('_','-',app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Discover your next great read at BookStore - Your premium destination for books">

    <title>@yield('title', 'BookStore - Your Literary Haven')</title>

    {{-- Bootstrap 5 CSS --}}
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.4/dist/css/bootstrap.min.css" rel="stylesheet">

    {{-- Font Awesome --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

    {{-- Google Fonts --}}
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Merriweather:wght@400;700&family=Open+Sans:wght@300;400;600&display=swap" rel="stylesheet">

    {{-- Vite assets --}}
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <style>
        :root {
            --primary-dark: #2c3e50;
            --primary-light: #3d566e;
            --accent-color: #e74c3c;
            --light-bg: #f9f7f4;
            --gold-accent: #d4af37;
        }

        body {
            display: flex;
            flex-direction: column;
            min-height: 100vh;
            background-color: var(--light-bg);
            font-family: 'Open Sans', sans-serif;
            color: #333;
        }

        h1,
        h2,
        h3,
        h4,
        h5,
        h6 {
            font-family: 'Merriweather', serif;
            font-weight: 700;
        }

        .navbar {
            background-color: var(--primary-dark) !important;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
            padding: 0.8rem 0;
            transition: all 0.3s ease;
        }

        .navbar.scrolled {
            padding: 0.5rem 0;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
        }

        .navbar-brand {
            font-weight: 700;
            font-size: 1.7rem;
            letter-spacing: 0.5px;
            color: white !important;
            transition: all 0.3s ease;
        }

        .navbar-brand:hover {
            color: var(--gold-accent) !important;
        }

        .nav-link {
            font-weight: 500;
            padding: 0.6rem 1.2rem;
            border-radius: 4px;
            transition: all 0.3s ease;
            position: relative;
            color: rgba(255, 255, 255, 0.9);
            margin: 0 0.2rem;
        }

        .nav-link:hover {
            color: white;
            transform: translateY(-2px);
        }

        .nav-link::after {
            content: '';
            position: absolute;
            width: 0;
            height: 2px;
            bottom: 5px;
            left: 1.2rem;
            background-color: var(--gold-accent);
            transition: width 0.3s ease;
        }

        .nav-link:hover::after {
            width: calc(100% - 2.4rem);
        }

        .nav-link.active {
            color: white;
            font-weight: 600;
        }

        .nav-link.active::after {
            width: calc(100% - 2.4rem);
        }

        main {
            flex: 1;
            padding-top: 2rem;
            padding-bottom: 4rem;
        }

        footer {
            background-color: var(--primary-dark);
            color: white;
            padding: 2.5rem 0 1.5rem;
            position: relative;
        }

        footer::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            height: 4px;
            background: linear-gradient(90deg, var(--gold-accent), var(--accent-color));
        }

        .social-icon {
            width: 40px;
            height: 40px;
            border-radius: 50%;
            background-color: rgba(255, 255, 255, 0.1);
            display: inline-flex;
            align-items: center;
            justify-content: center;
            transition: all 0.3s ease;
            margin: 0 0.5rem;
        }

        .social-icon:hover {
            background-color: var(--gold-accent);
            transform: translateY(-3px);
            color: var(--primary-dark) !important;
        }

        .card-hover {
            transition: all 0.3s ease;
            border: none;
            border-radius: 8px;
            overflow: hidden;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.08);
        }

        .card-hover:hover {
            transform: translateY(-8px);
            box-shadow: 0 15px 30px rgba(0, 0, 0, 0.15);
        }

        .btn-primary {
            background-color: var(--accent-color);
            border-color: var(--accent-color);
            padding: 0.6rem 1.5rem;
            font-weight: 600;
            letter-spacing: 0.5px;
            transition: all 0.3s ease;
        }

        .btn-primary:hover {
            background-color: #c0392b;
            border-color: #c0392b;
            transform: translateY(-2px);
        }

        .btn-outline-light {
            border-width: 2px;
            font-weight: 600;
            transition: all 0.3s ease;
        }

        .btn-outline-light:hover {
            background-color: transparent;
            color: var(--gold-accent);
            border-color: var(--gold-accent);
        }

        /*  mobile */
        .fab-btn {
            position: fixed;
            bottom: 2rem;
            right: 2rem;
            width: 60px;
            height: 60px;
            border-radius: 50%;
            background-color: var(--accent-color);
            color: white;
            display: flex;
            align-items: center;
            justify-content: center;
            box-shadow: 0 4px 20px rgba(231, 76, 60, 0.3);
            z-index: 1000;
            transition: all 0.3s ease;
        }

        .fab-btn:hover {
            transform: scale(1.1) translateY(-5px);
        }

        /* animation */
        @keyframes fadeIn {
            from {
                opacity: 0;
                transform: translateY(20px);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .animate-fade {
            animation: fadeIn 0.6s ease forwards;
        }

        /* Responsive */
        @media (max-width: 768px) {
            .navbar-brand {
                font-size: 1.5rem;
            }

            .nav-link {
                padding: 0.5rem;
                margin: 0.2rem 0;
            }
        }
    </style>
</head>

<body>

    {{-- HEADER/NAVBAR   --}}
    <header>
        <nav class="navbar navbar-expand-lg navbar-dark fixed-top shadow-sm">
            <div class="container">
                {{-- Brand Logo & Name --}}
                <a class="navbar-brand d-flex align-items-center" href="{{ route('home') }}">
                    <i class="fas fa-book-open me-2 text-gold-accent"></i>
                    <span class="font-serif fw-bold">BookHaven</span>
                </a>

                {{-- Mobile Toggle Button --}}
                <button class="navbar-toggler border-0" type="button" data-bs-toggle="collapse" data-bs-target="#mainNav">
                    <span class="navbar-toggler-icon"></span>
                </button>

                {{-- Navigation Links --}}
                <div class="collapse navbar-collapse" id="mainNav">
                    <ul class="navbar-nav ms-auto mb-2 mb-lg-0 align-items-lg-center">
                        <li class="nav-item mx-1">
                            <a class="nav-link px-3 py-2 {{ request()->routeIs('home') ? 'active' : '' }}"
                                href="{{ route('home') }}">
                                <i class="fas fa-home me-1 d-lg-none"></i> Home
                            </a>
                        </li>
                        <li class="nav-item mx-1">
                            <a class="nav-link px-3 py-2 {{ request()->routeIs('books.index') ? 'active' : '' }}"
                                href="{{ route('books.index') }}">
                                <i class="fas fa-book me-1 d-lg-none"></i> Browse
                            </a>
                        </li>

                        <li class="nav-item mx-1">
                            <a class="nav-link px-3 py-2" href="#about-section">
                                <i class="fas fa-info-circle me-1 d-lg-none"></i> About
                            </a>
                        </li>
                        <li class="nav-item mx-1">
                            <a class="nav-link px-3 py-2" href="#contact-section">
                                <i class="fas fa-envelope me-1 d-lg-none"></i> Contact
                            </a>
                        </li>

                        {{-- User Account Section --}}
                        @auth
                        @if(auth()->user()->role === 'admin')
                        <li class="nav-item mx-1">
                            <a class="nav-link px-3 py-2 {{ request()->routeIs('admin.*') ? 'active' : '' }}"
                                href="{{ route('admin.books.index') }}">
                                <i class="fas fa-cog me-1"></i> Dashboard
                            </a>
                        </li>
                        @endif

                        <li class="nav-item dropdown mx-1">
                            <a class="nav-link dropdown-toggle px-3 py-2" href="#" id="userDropdown"
                                data-bs-toggle="dropdown" aria-expanded="false">
                                <i class="fas fa-user-circle me-1"></i>
                                <span class="d-none d-lg-inline">{{ auth()->user()->name }}</span>
                            </a>
                            <ul class="dropdown-menu dropdown-menu-end border-0 shadow">
                                <li>
                                    <hr class="dropdown-divider my-1">
                                </li>
                                <li>
                                    <form method="POST" action="{{ route('logout') }}">
                                        @csrf
                                        <button type="submit" class="dropdown-item py-2">
                                            <i class="fas fa-sign-out-alt me-2"></i> Logout
                                        </button>
                                    </form>
                                </li>
                            </ul>
                        </li>
                        @else
                        <li class="nav-item mx-1">
                            <a class="nav-link px-3 py-2 {{ request()->routeIs('login') ? 'active' : '' }}"
                                href="{{ route('login') }}">
                                <i class="fas fa-sign-in-alt me-1"></i> Login
                            </a>
                        </li>
                        <li class="nav-item mx-1 ms-lg-2">
                            <a class="btn btn-outline-light rounded-pill px-3 py-2" href="{{ route('register') }}">
                                <i class="fas fa-user-plus me-1"></i> Register
                            </a>
                        </li>
                        @endauth
                    </ul>
                </div>
            </div>
        </nav>
    </header>
    {{-- /HEADER/NAVBAR  --}}
    {{-- MAIN CONTENT --}}
    <main class="container py-4 mt-5 animate-fade">
        @yield('content')
    </main>
    {{-- /MAIN CONTENT --}}

    {{-- FOOTER --}}
    <footer class="bg-primary-dark text-white pt-5">
        <div class="container">
            {{-- Main Footer Content --}}
            <div class="row g-4">
                {{-- About Section --}}
                <div id="about-section" class="col-md-6">
                    <div class="pe-lg-4">
                        <h4 class="mb-4 position-relative pb-3">
                            About BookHaven
                            <span class="position-absolute bottom-0 start-0 w-50" style="height: 2px; background-color: var(--gold-accent);"></span>
                        </h4>

                        <div class="mb-4">
                            <h5 class="mb-2" style="color: var(--gold-accent);">Our Story</h5>
                            <p class="text-light">Founded in 2023, BookHaven began as a small local shop with a passion for literature. We've grown into a trusted destination for book lovers everywhere.BookHaven is your premier destination for discovering and enjoying great literature.</p>
                        </div>
                    </div>
                </div>

                {{-- Contact Section --}}
                <div id="contact-section" class="col-md-6">
                    <div class="ps-lg-4">
                        <div class="row g-3">
                            <div class="col-sm-6">
                                <h4 class="mb-4 position-relative pb-3">
                                    Contact Us
                                    <span class="position-absolute bottom-0 start-0 w-50" style="height: 2px; background-color: var(--gold-accent);"></span>
                                </h4>
                                <ul class="list-unstyled">
                                    <li class="mb-3 d-flex align-items-start">
                                        <i class="fas fa-map-marker-alt mt-1 me-2" style="color: var(--gold-accent);"></i>
                                        <span>Chennai</span>
                                    </li>
                                    <li class="mb-3 d-flex align-items-start">
                                        <i class="fas fa-envelope mt-1 me-2" style="color: var(--gold-accent);"></i>
                                        <span>info@bookhaven.com</span>
                                    </li>
                                    <li class="mb-3 d-flex align-items-start">
                                        <i class="fas fa-phone mt-1 me-2" style="color: var(--gold-accent);"></i>
                                        <span>+91 12345 67890</span>
                                </ul>
                            </div>

                            <div class="col-sm-6">
                                <h4 class="mb-4 position-relative pb-3">
                                    Connect With Us
                                    <span class="position-absolute bottom-0 start-0 w-50" style="height: 2px; background-color: var(--gold-accent);"></span>
                                </h4>
                                <div class="social-links d-flex flex-column">
                                    <a href="#facebook" class="text-white mb-3 text-decoration-none hover-gold">
                                        <i class="fab fa-facebook-f me-2"></i> Facebook
                                    </a>
                                    <a href="#twitter"
                                        class="text-white mb-3 text-decoration-none hover-gold">
                                        <i class="fab fa-twitter me-2"></i> Twitter
                                    </a>
                                    <a href="#google"
                                        class="text-white text-decoration-none hover-gold">
                                        <i class="fab fa-instagram me-2"></i> Instagram
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            {{-- Divider --}}
            <hr class="my-4 bg-light opacity-10">

            {{-- Bottom Footer --}}
            {{-- Copyright --}}
            <div class="text-center">
                <p class="mb-4">&copy; {{ date('Y') }} BookHaven. All rights reserved.</p>
            </div>
        </div>
        </div>
    </footer>

    {{-- Floating button for mobile --}}
    <a href="{{ route('books.index') }}" class="fab-btn d-lg-none">
        <i class="fas fa-book"></i>
    </a>


    {{-- Bootstrap 5 JS --}}
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.4/dist/js/bootstrap.bundle.min.js"></script>

    <script>
        // scroll effect
        window.addEventListener('scroll', function() {
            const navbar = document.querySelector('.navbar');
            if (window.scrollY > 50) {
                navbar.classList.add('scrolled');
            } else {
                navbar.classList.remove('scrolled');
            }
        });


        var tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'))
        var tooltipList = tooltipTriggerList.map(function(tooltipTriggerEl) {
            return new bootstrap.Tooltip(tooltipTriggerEl)
        });

        // Smooth scrolling 
        document.querySelectorAll('a[href^="#"]').forEach(anchor => {
            anchor.addEventListener('click', function(e) {
                e.preventDefault();
                document.querySelector(this.getAttribute('href')).scrollIntoView({
                    behavior: 'smooth'
                });
            });
        });
    </script>
</body>

</html>