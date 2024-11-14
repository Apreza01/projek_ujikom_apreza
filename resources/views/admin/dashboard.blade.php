@extends('layouts.admin')

@section('content')
<div class="container py-5">
    <h1 class="mb-4">Admin Dashboard</h1>
    <p class="lead text-muted">Selamat Datang di Dashboard Admin! Kelola Konten, Pantau Aktivitas, dan Tetap Terupdate dengan Mudah.</p>

    <hr class="my-5">

    <!-- Quick Stats Section -->
    <div class="row row-cols-1 row-cols-md-4 g-4">
        <div class="col">
            <div class="card h-100 shadow-sm">
                <div class="card-body text-center">
                    <i class="fas fa-users fa-3x text-primary mb-3"></i>
                    <h5 class="card-title">Total Users</h5>
                    <p class="card-text display-6">{{ $totalUsers }}</p>
                </div>
            </div>
        </div>

        <div class="col">
            <div class="card h-100 shadow-sm">
                <div class="card-body text-center">
                    <i class="fas fa-images fa-3x text-success mb-3"></i>
                    <h5 class="card-title">Total Galleries</h5>
                    <p class="card-text display-6">{{ $totalGalleries }}</p>
                </div>
            </div>
        </div>

        <div class="col">
            <div class="card h-100 shadow-sm">
                <div class="card-body text-center">
                    <i class="fas fa-calendar-alt fa-3x text-warning mb-3"></i>
                    <h5 class="card-title">Total Agendas</h5>
                    <p class="card-text display-6">{{ $totalAgendas }}</p>
                </div>
            </div>
        </div>
    </div>

    <hr class="my-5">

    <!-- Recent Activities Section -->
    <h2 class="mb-4">Recent Activities</h2>
    <ul class="list-group mb-5">
        @forelse ($recentActivities as $activity)
            <li class="list-group-item d-flex justify-content-between align-items-center">
                {{ $activity }}
                <span class="badge bg-primary rounded-pill">{{ now()->diffForHumans() }}</span>
            </li>
        @empty
            <li class="list-group-item text-center">No recent activities found.</li>
        @endforelse
    </ul>

    <!-- Recent Users Section -->
    <h2 class="mb-4">Recent Users</h2>
    <ul class="list-group mb-5">
        @forelse ($recentUsers as $user)
            <li class="list-group-item d-flex justify-content-between align-items-center">
                {{ $user->name }} <span class="text-muted">{{ $user->email }}</span>
            </li>
        @empty
            <li class="list-group-item text-center">No recent users found.</li>
        @endforelse
    </ul>

    <!-- Recent Galleries Section -->
    <h2 class="mb-4">Recent Galleries</h2>
    <ul class="list-group mb-5">
        @forelse ($recentGalleries as $gallery)
            <li class="list-group-item d-flex justify-content-between align-items-center">
                {{ $gallery->title }} <span class="badge bg-success">{{ $gallery->photos->count() }} Photos</span>
            </li>
        @empty
            <li class="list-group-item text-center">No recent galleries found.</li>
        @endforelse
    </ul>

    <!-- Recent Info Section -->
    <h2 class="mb-4">Recent Information</h2>
    <ul class="list-group mb-5">
        @forelse ($recentInfos as $info)
            <li class="list-group-item d-flex justify-content-between align-items-center">
                {{ $info->title }} <span class="text-muted">{{ Str::limit($info->content, 50) }}</span>
            </li>
        @empty
            <li class="list-group-item text-center">No recent information found.</li>
        @endforelse
    </ul>

    <!-- Placeholder Chart Section -->

</div>
@endsection

@push('scripts')
<!-- Chart.js -->
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<script>
    // Data for User Growth Chart
    const ctx = document.getElementById('userGrowthChart').getContext('2d');
    const userGrowthChart = new Chart(ctx, {
        type: 'line',
        data: {
            labels: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun'],
            datasets: [{
                label: 'User Registrations',
                data: [12, 19, 3, 5, 2, 3],
                backgroundColor: 'rgba(0, 196, 154, 0.2)',
                borderColor: 'rgba(0, 196, 154, 1)',
                borderWidth: 2,
                fill: true,
                tension: 0.4
            }]
        },
        options: {
            responsive: true,
            plugins: {
                legend: {
                    position: 'top',
                }
            }
        }
    });
</script>
@endpush

<style>
    .card {
        border-radius: 12px;
        overflow: hidden;
        transition: transform 0.3s, box-shadow 0.3s;
    }

    .card:hover {
        transform: translateY(-5px);
        box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
    }

    .list-group-item {
        font-size: 18px;
    }

    .badge {
        font-size: 14px;
    }
</style>
