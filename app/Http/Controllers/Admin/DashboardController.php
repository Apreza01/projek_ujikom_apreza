<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Gallery;
use App\Models\Agenda;
use App\Models\Info;

class DashboardController extends Controller
{
    public function index()
    {
        // Ambil data statistik
        $totalUsers = User::count();
        $totalGalleries = Gallery::count();
        $totalAgendas = Agenda::count();
        $upcomingAgendas = Agenda::where('event_date', '>=', now())->count();

        // Recent data
        $recentActivities = Agenda::latest()->limit(5)->pluck('title');
        $recentUsers = User::latest()->limit(5)->get();
        $recentGalleries = Gallery::latest()->limit(5)->get();
        $recentInfos = Info::latest()->limit(5)->get();

        // Kirim data ke view
        return view('admin.dashboard', compact(
            'totalUsers', 
            'totalGalleries', 
            'totalAgendas', 
            'upcomingAgendas', 
            'recentActivities', 
            'recentUsers', 
            'recentGalleries',
            'recentInfos'
        ));
    }
}
