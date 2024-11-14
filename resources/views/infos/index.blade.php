@extends('layouts.app')

@section('content')
<div class="container py-5">
    <h1 class="text-center mb-5">Info List</h1>

    <div class="row row-cols-1 row-cols-md-2 g-4">
        @foreach($infos as $info)
            <div class="col">
                <div class="card shadow-sm h-100">
                    <div class="card-body d-flex flex-column">
                        <h5 class="card-title">{{ $info->title }}</h5>
                        <p class="card-text text-muted">
                            {{ Str::limit($info->content, 100, '...') }}
                        </p>
                        <a href="{{ route('info.show', $info->id) }}" 
                           class="btn btn-primary mt-auto">
                            <i class="fas fa-info-circle"></i> Read More
                        </a>
                    </div>
                </div>
            </div>
        @endforeach
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
        box-shadow: 0 10px 20px rgba(0, 0, 0, 0.1);
    }

    .btn-primary {
        background-color: #00c49a;
        border: none;
    }

    .btn-primary:hover {
        background-color: #227c7c;
    }
</style>
