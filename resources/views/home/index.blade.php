@extends('layouts.app')

@section('content')
<div class="container py-5">
    <div class="row align-items-center mb-5">
        <div class="col-md-6 text-center text-md-start">
            <h1 class="display-4 fw-bold animate__animated animate__fadeInLeft">Selamat Datang di SMKN 4 BOGOR</h1>
            <p class="lead text-muted mt-3">{{ $welcomeMessage }}</p>
            <p>Platform ini menyediakan semua yang kamu butuhkan yaitu: galeri, agenda, dan informasi penting.</p>
            <a href="{{ route('gallery.index') }}" class="btn btn-primary btn-lg mt-3">
                <i class="fas fa-images"></i> Kunjungi Galeri Kami
            </a>
        </div>
        <div class="col-md-6">
            <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcSX8GTzwM6Ww8bt8hQHgFBw6EtRYzXUZRoAmQ&s" 
                 alt="Welcome Image" 
                 class="img-fluid rounded shadow-lg animate__animated animate__fadeInRight">
        </div>
    </div>

    <hr class="my-5">

    <!-- Section with Cards -->
    <h2 class="text-center mb-4">Jelajahi Lebih Lanjut</h2>
    <div class="row row-cols-1 row-cols-md-3 g-4">
        <div class="col">
            <div class="card h-100 shadow-sm">
                <div class="card-body text-center">
                    <i class="fas fa-calendar-alt fa-3x text-primary mb-3"></i>
                    <h5 class="card-title">Agenda</h5>
                    <p class="card-text text-muted">
                    Ikuti Semua Kegiatan Sekolah, Tingkatkan Semangat Belajar!
                    </p>
                    <a href="{{ route('agenda.index') }}" class="btn btn-outline-primary">
                    Lihat Agenda
                    </a>
                </div>
            </div>
        </div>

        <div class="col">
            <div class="card h-100 shadow-sm">
                <div class="card-body text-center">
                    <i class="fas fa-info-circle fa-3x text-primary mb-3"></i>
                    <h5 class="card-title">Information</h5>
                    <p class="card-text text-muted">
                    Informasi Terbaru Seputar Sekolah, Untuk Kamu yang Ingin Selalu Tahu!
                    </p>
                    <a href="{{ route('info.index') }}" class="btn btn-outline-primary">
                        Lihat Informasi
                    </a>
                </div>
            </div>
        </div>

        <div class="col">
            <div class="card h-100 shadow-sm">
                <div class="card-body text-center">
                    <i class="fas fa-users fa-3x text-primary mb-3"></i>
                    <h5 class="card-title">Komunitas Kami</h5>
                    <p class="card-text text-muted">
                    Komunitas yang terhubung antara guru, siswa, dan orang tua, bersama menciptakan suasana belajar yang menyenangkan!
                    </p>
                    <a href="{{ route('register') }}" class="btn btn-outline-primary">
                    Gabung Bersama Kami
                    </a>
                </div>
            </div>
        </div>
    </div>

    <hr class="my-5">

    <!-- Google Maps Section -->
    <div class="text-center py-5 bg-light rounded shadow-lg">
        <h2 class="mb-4">PETA SMKN 4 BOGOR</h2>
        <div class="ratio ratio-16x9">
            <iframe 
                src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d31704.398742240563!2d106.824694!3d-6.640733000000001!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e69c8b16ee07ef5%3A0x14ab253dd267de49!2sSMK%20Negeri%204%20Bogor%20(Nebrazka)!5e0!3m2!1sid!2sid!4v1730250745686!5m2!1sid!2sid" 
                width="600" height="450" style="border:0;" 
                allowfullscreen="" loading="lazy" 
                referrerpolicy="no-referrer-when-downgrade">
            </iframe>
        </div>
    </div>
</div>
@endsection

<style>
    .card {
        border-radius: 12px;
        overflow: hidden;
        transition: transform 0.3s ease, box-shadow 0.3s ease;
    }

    .card:hover {
        transform: translateY(-5px);
        box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
    }

    .btn-outline-primary {
        transition: background-color 0.3s, color 0.3s;
    }

    .btn-outline-primary:hover {
        background-color: #00c49a;
        color: white;
    }

    .bg-light {
        background-color: #f8f9fa !important;
    }

    /* Responsiveness for iframe */
    .ratio {
        --bs-aspect-ratio: 100%; /* Default for 16:9 */
    }

    @media (max-width: 768px) {
        .ratio {
            --bs-aspect-ratio: 75%; /* Adjust for smaller screens */
        }
    }
</style>
