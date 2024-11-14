@extends('layouts.app')

@section('content')
<div class="container py-5">
    <h1 class="text-center mb-5">Agenda List</h1>

    <div class="row row-cols-1 row-cols-md-2 g-4">
        @foreach ($agendas as $agenda)
            <div class="col">
                <div class="card shadow-sm h-100">
                    <div class="card-body d-flex flex-column">
                        <h5 class="card-title">{{ $agenda->title }}</h5>
                        <p class="card-text text-muted">
                            {{ Str::limit($agenda->description, 100, '...') }}
                        </p>
                        <p class="text-muted">
                            <i class="fas fa-calendar-alt"></i> {{ $agenda->event_date->format('d M Y') }}
                        </p>
                        <a href="{{ route('agenda.show', $agenda->id) }}" 
                           class="btn btn-primary mt-auto">
                            <i class="fas fa-eye"></i> View Details
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
