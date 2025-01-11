<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Reservation;
use App\Models\Table;
use App\Models\MenuItem;
use Carbon\Carbon;

class DashboardController extends Controller
{
    public function index()
    {
        $todayReservations = Reservation::whereDate('reservation_time', Carbon::today())->count();
        $availableTables = Table::where('is_available', true)->count();
        $menuItemsCount = MenuItem::count();
        $recentReservations = Reservation::with('user')
            ->orderBy('reservation_time', 'desc')
            ->take(5)
            ->get();

        return view('admin.dashboard', compact(
            'todayReservations',
            'availableTables',
            'menuItemsCount',
            'recentReservations'
        ));
    }
}
