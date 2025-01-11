<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Reservation;
use App\Models\Table;
use Illuminate\Http\Request;

class ReservationController extends Controller
{
    public function index(Request $request)
    {
        $query = Reservation::with(['user', 'table'])->latest();

        if ($request->filled('date')) {
            $query->whereDate('reservation_time', $request->date);
        }

        if ($request->filled('status')) {
            $query->where('status', $request->status);
        }

        $reservations = $query->paginate(10);

        return view('admin.reservations.index', compact('reservations'));
    }

    public function confirm(Reservation $reservation)
    {
        $reservation->update(['status' => 'confirmed']);
        return back()->with('success', 'Reservation confirmed successfully');
    }

    public function cancel(Reservation $reservation)
    {
        $reservation->update(['status' => 'cancelled']);
        return back()->with('success', 'Reservation cancelled successfully');
    }

    public function showAssignTable(Reservation $reservation)
    {
        $availableTables = Table::where('is_available', true)
            ->whereDoesntHave('reservations', function ($query) use ($reservation) {
                $query->where('reservation_time', $reservation->reservation_time)
                    ->where('status', 'confirmed')
                    ->where('id', '!=', $reservation->id);
            })
            ->orderBy('capacity')
            ->get();

        return view('admin.reservations.assign-table', compact('reservation', 'availableTables'));
    }

    public function assignTable(Request $request, Reservation $reservation)
    {
        $request->validate([
            'table_id' => 'required|exists:tables,id'
        ]);

        $table = Table::findOrFail($request->table_id);

        // Check if table has enough capacity
        if ($table->capacity < $reservation->number_of_guests) {
            return back()->with('error', 'Selected table does not have enough capacity');
        }

        // Check if table is available at the requested time
        $isTableAvailable = !$table->reservations()
            ->where('reservation_time', $reservation->reservation_time)
            ->where('status', 'confirmed')
            ->where('id', '!=', $reservation->id)
            ->exists();

        if (!$isTableAvailable) {
            return back()->with('error', 'Table is not available at the requested time');
        }

        $reservation->update([
            'table_id' => $table->id,
            'status' => 'confirmed'
        ]);

        return redirect()->route('admin.reservations.index')
            ->with('success', 'Table assigned successfully');
    }
}
