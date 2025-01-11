<?php

namespace App\Http\Controllers;

use App\Models\Reservation;
use Illuminate\Http\Request;

class ReservationController extends Controller
{
    public function create()
    {
        return view('pages.reservation');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email',
            'date' => 'required|date',
            'time' => 'required',
            'guests' => 'required|integer|min:1|max:10',
            'special_requests' => 'nullable|string',
        ]);

        // Combine date and time
        $reservationDateTime = $validated['date'] . ' ' . $validated['time'];

        $reservation = Reservation::create([
            'user_id' => auth()->id() ?? 1, // Default to 1 if not logged in
            'table_id' => 1, // You'll need to implement table assignment logic
            'reservation_time' => $reservationDateTime,
            'number_of_guests' => $validated['guests'],
            'status' => 'pending'
        ]);

        return redirect()->back()->with('success', 'Reservation submitted successfully! We will confirm shortly.');
    }
}
