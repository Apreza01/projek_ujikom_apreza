<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>SMKN 4 KOTA BOGOR</title>

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

    <!-- FontAwesome Icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">

    <!-- Google Fonts Preload & Import -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600&display=swap" rel="stylesheet">

    <!-- Custom Styles -->
    <style>
        /* Root Variables for Color Palette */
        :root {
            --primary-color: #00c49a;
            --dark-color: #0e4444;
            --secondary-color: #156064;
            --hover-color: #227c7c;
            --light-bg: #cdd7d6;
        }

        /* Base Styling */
        body {
            background-color: var(--light-bg);
            font-family: 'Poppins', sans-serif;
            margin: 0;
            padding: 0;
        }

        /* Navbar Styling */
        .navbar {
            background-color: var(--dark-color);
            padding: 15px;
        }

        .navbar-brand img {
            height: 40px;
            margin-right: 8px;
        }

        .nav-link {
            color: var(--light-bg) !important;
        }

        .nav-link.active {
            font-weight: 600;
            color: var(--primary-color) !important;
        }

        .nav-link:hover {
            text-decoration: underline;
            transition: all 0.3s ease-in-out;
        }

        .btn-primary {
            background-color: var(--primary-color);
            border-color: var(--primary-color);
            transition: background-color 0.3s ease, transform 0.2s ease;
        }

        .btn-primary:hover {
            background-color: var(--hover-color);
            border-color: var(--hover-color);
            transform: scale(1.05);
        }

        /* Card Animation */
        .card {
            border: none;
            transition: transform 0.3s, box-shadow 0.3s;
        }

        .card:hover {
            transform: scale(1.02);
            box-shadow: 0 8px 16px rgba(0, 0, 0, 0.1);
        }

        /* Dropdown Menu Styling */
        .dropdown-menu {
            border-radius: 8px;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.15);
        }

        /* Flash Messages */
        .alert {
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        /* Footer Styling */
        footer {
            background-color: var(--dark-color);
            color: var(--light-bg);
            text-align: center;
            padding: 15px 0;
        }

        footer p {
        margin: 0;
        font-size: 14px;
        font-weight: 500;
    }

        footer a {
            color: var(--primary-color);
            margin: 0 10px;
            font-size: 24px;
            transition: transform 0.3s ease;
        }

        footer a:hover {
            transform: scale(1.2);
        }

        /* Main Content */
        main {
            padding-top: 40px;
            min-height: 80vh;
        }

        /* Custom Scrollbar */
        ::-webkit-scrollbar {
            width: 10px;
        }

        ::-webkit-scrollbar-thumb {
            background-color: var(--primary-color);
            border-radius: 10px;
        }

        .navbar-toggler {
            border-color: var(--primary-color);
        }

        .navbar-toggler-icon {
            filter: invert(100%);
        }
    </style>
</head>

<body>
    {{-- Navbar --}}
    <nav class="navbar navbar-expand-lg">
        <div class="container">
            <a class="navbar-brand" href="{{ route('home') }}">
                <img src="https://pjj.smkn4bogor.sch.id/pluginfile.php/1/core_admin/logocompact/300x300/1662946883/LOGO%20SMKN%204.png" 
                     alt="Logo Sekolah">
                <span>SMK Negeri 4 Kota Bogor</span>
            </a>

            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link {{ request()->routeIs('home') ? 'active' : '' }}" href="{{ route('home') }}">
                            <i class="fas fa-home"></i> Home
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ request()->routeIs('gallery.*') ? 'active' : '' }}" href="{{ route('gallery.index') }}">
                            <i class="fas fa-images"></i> Gallery
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ request()->routeIs('info.index') ? 'active' : '' }}" href="{{ route('info.index') }}">
                            <i class="fas fa-info-circle"></i> Informasi
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ request()->routeIs('agenda.index') ? 'active' : '' }}" href="{{ route('agenda.index') }}">
                            <i class="fas fa-calendar-alt"></i> Agenda
                        </a>
                    </li>

                    @auth
                        @if (Auth::user()->role === 'admin')
                            <li class="nav-item">
                                <a class="nav-link {{ request()->routeIs('dashboard.index') ? 'active' : '' }}" href="{{ route('dashboard.index') }}">
                                    <i class="fas fa-tachometer-alt"></i> Dashboard
                                </a>
                            </li>
                        @endif
                    @endauth
                </ul>

                <ul class="navbar-nav">
                    @auth
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                <i class="fas fa-user"></i> {{ Auth::user()->name }}
                            </a>
                            <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                                <li>
                                    <form action="{{ route('logout') }}" method="POST" class="dropdown-item p-0">
                                        @csrf
                                        <button class="btn btn-link text-decoration-none w-100 text-start">
                                            <i class="fas fa-sign-out-alt"></i> Logout
                                        </button>
                                    </form>
                                </li>
                            </ul>
                        </li>
                    @else
                        <li class="nav-item">
                            <a class="btn btn-primary" href="{{ route('login') }}">
                                <i class="fas fa-sign-in-alt"></i> Login
                            </a>
                        </li>
                    @endauth
                </ul>
            </div>
        </div>
    </nav>

    {{-- Flash Messages --}}
    @if (session('success'))
        <div class="alert alert-success alert-dismissible fade show mt-3" role="alert">
            <i class="fas fa-check-circle"></i> {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    @if ($errors->any())
        <div class="alert alert-danger alert-dismissible fade show mt-3" role="alert">
            <ul class="mb-0">
                @foreach ($errors->all() as $error)
                    <li><i class="fas fa-exclamation-circle"></i> {{ $error }}</li>
                @endforeach
            </ul>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    {{-- Main Content --}}
    <main class="container">
        @yield('content')
    </main>

    {{-- Footer --}}
    <footer>
        <p class="mb-2">© 2024 SMK Negeri 4 Bogor. Apreza Allanda</p>
        <div>
            <a href="https://api.whatsapp.com/send/?phone=6287832174334" target="_blank" aria-label="WhatsApp">
                <i class="fab fa-whatsapp"></i>
            </a>
            <a href="https://smkn4bogor.sch.id/" target="_blank" aria-label="Website">
                <i class="fas fa-globe"></i>
            </a>
            <a href="https://web.facebook.com/people/SMK-NEGERI-4-KOTA-BOGOR/100054636630766/" target="_blank" aria-label="Facebook">
                <i class="fab fa-facebook"></i>
            </a>
            <a href="https://www.instagram.com/smkn4kotabogor/" target="_blank" aria-label="Instagram">
                <i class="fab fa-instagram"></i>
            </a>
        </div>
    </footer>
</body>


</html>
