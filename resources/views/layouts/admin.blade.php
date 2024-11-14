<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Admin Dashboard</title>

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Bootstrap Bundle with Popper JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

    <!-- FontAwesome Icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">

    <style>
        /* Sidebar Styling */
        .sidebar {
            height: 100vh;
            padding-top: 20px;
            background-color: #f8f9fa;
            border-right: 1px solid rgba(0, 0, 0, 0.1);
        }

        .sidebar .nav-link {
            color: #333;
            font-size: 16px;
            transition: background-color 0.2s, color 0.2s;
        }

        .sidebar .nav-link:hover {
            background-color: #00c49a;
            color: white;
        }

        .sidebar .nav-link.active {
            background-color: #227c7c;
            color: white;
        }

        /* Main content padding */
        main {
            background-color: #f5f5f5;
            min-height: 100vh;
        }

        /* Navbar Styling */
        .navbar-brand {
            font-weight: bold;
            font-size: 20px;
        }

        .navbar .btn-link {
            color: white;
            text-decoration: none;
        }

        .navbar .btn-link:hover {
            text-decoration: underline;
        }

        /* Responsive Sidebar Toggle */
        @media (max-width: 768px) {
            .sidebar {
                position: fixed;
                top: 0;
                left: -100%;
                width: 250px;
                z-index: 1030;
                transition: left 0.3s;
            }

            .sidebar.show {
                left: 0;
            }

            .main-content {
                padding-left: 0 !important;
            }
        }

        .navbar-toggler-icon {
            filter: invert(1);
        }
    </style>
</head>

<body>
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container-fluid">
            <a class="navbar-brand" href="{{ route('dashboard.index') }}">
                <i class="fas fa-tachometer-alt"></i> Admin Dashboard
            </a>

            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <form action="{{ route('logout') }}" method="POST">
                            @csrf
                            <button class="btn btn-link">Logout</button>
                        </form>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <div class="container-fluid">
        <div class="row">
            <!-- Sidebar -->
            <nav class="col-md-2 d-md-block bg-light sidebar">
                <div class="position-sticky">
                    <ul class="nav flex-column">
                        <li class="nav-item">
                            <a class="nav-link {{ request()->routeIs('dashboard.index') ? 'active' : '' }}" 
                               href="{{ route('dashboard.index') }}">
                                <i class="fas fa-home me-2"></i> Dashboard
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link {{ request()->routeIs('home') ? 'active' : '' }}" 
                               href="{{ route('home') }}">
                                <i class="fas fa-globe me-2"></i> Home
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link {{ request()->routeIs('users.index') ? 'active' : '' }}" 
                               href="{{ route('users.index') }}">
                                <i class="fas fa-users me-2"></i> Manage Users
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link {{ request()->routeIs('dashboard.galleries.*') ? 'active' : '' }}" 
                               href="{{ route('dashboard.galleries.index') }}">
                                <i class="fas fa-images me-2"></i> Manage Galleries
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link {{ request()->routeIs('dashboard.infos.index') ? 'active' : '' }}" 
                               href="{{ route('dashboard.infos.index') }}">
                                <i class="fas fa-info-circle me-2"></i> Manage Info
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link {{ request()->routeIs('dashboard.agendas.index') ? 'active' : '' }}" 
                               href="{{ route('dashboard.agendas.index') }}">
                                <i class="fas fa-calendar-alt me-2"></i> Manage Agendas
                            </a>
                        </li>
                    </ul>
                </div>
            </nav>

            <!-- Main Content -->
            <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4 py-4 main-content">
                @yield('content')
            </main>
        </div>
    </div>

    <script>
        // Sidebar Toggle for Mobile
        document.querySelector('.navbar-toggler').addEventListener('click', () => {
            document.querySelector('.sidebar').classList.toggle('show');
        });
    </script>
</body>

</html>
