@extends('layouts.admin')

@section('title', 'Dashboard')

@section('content')
<div class="grid grid-cols-1 md:grid-cols-3 gap-6">
    <!-- Stats Cards -->
    <div class="bg-white rounded-lg shadow p-6">
        <h3 class="text-lg font-semibold mb-2">Today's Reservations</h3>
        <p class="text-3xl font-bold text-gold">{{ $todayReservations }}</p>
    </div>

    <div class="bg-white rounded-lg shadow p-6">
        <h3 class="text-lg font-semibold mb-2">Available Tables</h3>
        <p class="text-3xl font-bold text-gold">{{ $availableTables }}</p>
    </div>

    <div class="bg-white rounded-lg shadow p-6">
        <h3 class="text-lg font-semibold mb-2">Menu Items</h3>
        <p class="text-3xl font-bold text-gold">{{ $menuItemsCount }}</p>
    </div>
</div>

<!-- Recent Reservations -->
<div class="mt-8">
    <h3 class="text-xl font-semibold mb-4">Recent Reservations</h3>
    <div class="bg-white rounded-lg shadow">
        <table class="min-w-full">
            <thead>
                <tr class="border-b">
                    <th class="px-6 py-3 text-left">Name</th>
                    <th class="px-6 py-3 text-left">Date</th>
                    <th class="px-6 py-3 text-left">Time</th>
                    <th class="px-6 py-3 text-left">Guests</th>
                    <th class="px-6 py-3 text-left">Status</th>
                </tr>
            </thead>
            <tbody>
                @foreach($recentReservations as $reservation)
                <tr class="border-b hover:bg-gray-50">
                    <td class="px-6 py-4">{{ $reservation->user->name }}</td>
                    <td class="px-6 py-4">{{ $reservation->reservation_time->format('Y-m-d') }}</td>
                    <td class="px-6 py-4">{{ $reservation->reservation_time->format('H:i') }}</td>
                    <td class="px-6 py-4">{{ $reservation->number_of_guests }}</td>
                    <td class="px-6 py-4">
                        <span class="px-2 py-1 rounded-full text-sm 
                            {{ $reservation->status === 'confirmed' ? 'bg-green-100 text-green-800' : 
                               ($reservation->status === 'pending' ? 'bg-yellow-100 text-yellow-800' : 'bg-red-100 text-red-800') }}">
                            {{ ucfirst($reservation->status) }}
                        </span>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection