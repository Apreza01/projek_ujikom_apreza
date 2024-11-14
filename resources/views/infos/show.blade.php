@extends('layouts.app')

@section('content')
<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card shadow-lg animate__animated animate__fadeIn">
                <div class="card-body">
                    <h1 class="card-title text-center mb-4">{{ $info->title }}</h1>
                    <p class="lead text-muted">{{ $info->content }}</p>
                    <a href="{{ route('info.index') }}" class="btn btn-secondary mt-3">
                        <i class="fas fa-arrow-left"></i> Back to Info List
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

<style>
    .card {
        border-radius: 12px;
    }

    .btn-secondary {
        background-color: #6c757d;
        border: none;
    }

    .btn-secondary:hover {
        background-color: #5a6268;
    }
</style>
