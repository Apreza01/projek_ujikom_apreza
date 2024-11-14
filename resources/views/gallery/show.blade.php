@extends('layouts.app')

@section('content')
<div class="container py-5">
    <h1 class="text-center mb-5">{{ $gallery->title }}</h1>

    <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-4">
        @foreach($gallery->photos as $photo)
            <div class="col d-flex">
                <div class="card shadow-sm h-100 card-hover">
                    <div class="img-container">
                        <img src="{{ $photo->image_url }}" 
                             class="card-img-top" 
                             alt="{{ $photo->title }}" 
                             loading="lazy" 
                             aria-label="{{ $photo->title }}"
                             data-bs-toggle="modal" 
                             data-bs-target="#photoModal{{ $photo->id }}">
                    </div>
                    <div class="card-body d-flex flex-column">
                        <h5 class="card-title text-center mb-2">{{ $photo->title }}</h5>
                        <p class="card-text text-muted text-center">
                            {{ Str::limit($photo->description, 80, '...') }}
                        </p>

                        <a href="{{ route('photos.show', ['id' => $photo->id]) }}" 
                           class="btn btn-primary btn-float mt-auto" 
                           aria-label="View Photo: {{ $photo->title }}">
                            <i class="fas fa-eye"></i> View Photo
                        </a>
                    </div>
                </div>
            </div>

            <!-- Modal Lightbox -->
            <div class="modal fade" id="photoModal{{ $photo->id }}" tabindex="-1" aria-labelledby="photoModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">
                        <div class="modal-body p-0">
                            <img src="{{ $photo->image_url }}" class="img-fluid" alt="{{ $photo->title }}">
                        </div>
                        <div class="modal-footer">
                            <h5 class="modal-title">{{ $photo->title }}</h5>
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        </div>
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
        --shadow-color: rgba(0, 0, 0, 0.1);
        --overlay-bg: rgba(0, 0, 0, 0.5);
    }

    /* Konsistensi Layout Card */
    .card {
        display: flex;
        flex-direction: column;
        justify-content: space-between;
        height: 100%; /* Card selalu full height */
        border-radius: 12px;
        overflow: hidden;
        transition: transform 0.3s ease, box-shadow 0.3s ease;
    }

    .card-hover:hover {
        transform: translateY(-5px);
        box-shadow: 0 10px 30px var(--shadow-color);
    }

    /* Konsistensi Gambar */
    .img-container {
        width: 100%; 
        aspect-ratio: 4 / 3; /* Proporsi tetap */
        overflow: hidden;
        background-color: #f0f0f0;
        position: relative;
    }

    .img-container img {
        width: 100%;
        height: 100%;
        object-fit: cover; /* Gambar tetap proporsional */
        transition: transform 0.4s ease, opacity 0.4s;
        opacity: 0.9;
        cursor: pointer;
    }

    .img-container:hover img {
        transform: scale(1.1);
        opacity: 1;
    }

    /* Tombol Floating dengan Efek Hover */
    .btn-float {
        transition: transform 0.3s ease, background-color 0.3s ease;
        border-radius: 30px;
    }

    .btn-float:hover {
        transform: translateY(-4px);
    }

    .btn-primary {
        background-color: var(--primary-color);
        border: none;
        color: white;
    }

    .btn-primary:hover {
        background-color: var(--hover-color);
    }

    /* Grid dan Layout Konsisten */
    .row-cols-md-3 > .col {
        display: flex;
        align-items: stretch;
    }

    .card-body {
        padding: 20px;
        display: flex;
        flex-direction: column;
        justify-content: space-between;
        gap: 10px;
    }

    /* Overlay Info pada Gambar */
    .img-overlay {
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background-color: var(--overlay-bg);
        opacity: 0;
        transition: opacity 0.3s ease;
        text-align: center;
        display: flex;
        justify-content: center;
        align-items: center;
        flex-direction: column;
        gap: 5px;
    }

    .img-container:hover .img-overlay {
        opacity: 1;
    }

    /* Scrollbar Kustom */
    ::-webkit-scrollbar {
        width: 8px;
    }

    ::-webkit-scrollbar-thumb {
        background-color: var(--primary-color);
        border-radius: 10px;
    }

    /* Responsivitas Optimal */
    @media (max-width: 768px) {
        .img-container {
            aspect-ratio: 16 / 9; /* Rasio berubah untuk layar kecil */
        }
    }

    @media (max-width: 576px) {
        .img-container {
            aspect-ratio: 1 / 1; /* Square untuk layar sangat kecil */
        }
    }
</style>
