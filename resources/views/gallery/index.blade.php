@extends('layouts.app')

@section('content')
<div class="container py-5">
    <h1 class="text-center mb-4">Gallery</h1>
    <div class="row row-cols-1 row-cols-md-3 g-4">
        @foreach($galleries as $gallery)
            <div class="col d-flex">
                <div class="card shadow h-100 w-100">
                    {{-- Cek apakah galeri memiliki foto --}}
                    @if ($gallery->photos->isNotEmpty())
                        <div class="img-container">
                            <img src="{{ $gallery->photos->first()->image_url }}" 
                                 class="card-img-top" 
                                 alt="{{ $gallery->title }}">
                        </div>
                    @else
                        <div class="img-container">
                            <img src="https://via.placeholder.com/350x200?text=No+Image" 
                                 class="card-img-top" 
                                 alt="No Image Available">
                        </div>
                    @endif

                    <div class="card-body text-center d-flex flex-column">
                        <h5 class="card-title mb-2">{{ $gallery->title }}</h5>

                        {{-- Tampilkan Total Foto --}}
                        <p class="text-muted mb-3">
                            <i class="fas fa-camera"></i> {{ $gallery->photos->count() }} Photos
                        </p>

                        {{-- Tombol View Gallery --}}
                        <a href="{{ route('gallery.show', ['gallery' => $gallery->id]) }}" 
                           class="btn btn-primary btn-float mt-auto">
                            <i class="fas fa-eye"></i> View Gallery
                        </a>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>
@endsection
<style>
    :root {
        --primary-color: #00c49a;
        --hover-color: #227c7c;
        --shadow-color: rgba(0, 0, 0, 0.15);
    }

    /* Kartu Galeri */
    .card {
        display: flex;
        flex-direction: column;
        justify-content: space-between;
        height: 100%;
        border-radius: 12px;
        overflow: hidden;
        transition: transform 0.3s, box-shadow 0.3s;
    }

    .card:hover {
        transform: translateY(-5px);
        box-shadow: 0 10px 30px var(--shadow-color);
    }

    /* Gambar */
    .img-container {
        height: 200px;
        overflow: hidden;
    }

    .img-container img {
        width: 100%;
        height: 100%;
        object-fit: cover;
        transition: transform 0.4s;
    }

    .img-container:hover img {
        transform: scale(1.05);
    }

    /* Tombol dengan Animasi Floating */
    .btn-float {
        border-radius: 30px;
        transition: transform 0.2s, background-color 0.2s;
    }

    .btn-float:hover {
        transform: translateY(-3px);
    }

    .btn-primary {
        background-color: var(--primary-color);
        border: none;
        transition: background-color 0.3s;
    }

    .btn-primary:hover {
        background-color: var(--hover-color);
    }

    /* Grid Konsisten */
    .row-cols-md-3 > .col {
        display: flex;
        align-items: stretch;
    }

    .card-body {
        flex-grow: 1;
        display: flex;
        flex-direction: column;
        justify-content: space-between;
        padding: 20px;
    }

    /* Scrollbar Kustom */
    ::-webkit-scrollbar {
        width: 8px;
    }

    ::-webkit-scrollbar-thumb {
        background-color: var(--primary-color);
        border-radius: 10px;
    }
</style>
