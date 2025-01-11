@extends('layouts.admin')

@section('title', 'Manage Reservations')

@section('content')
<div class="bg-white rounded-lg shadow">
    <!-- Filters -->
    <div class="p-4 border-b">
        <form class="flex gap-4">
            <input type="date" name="date" value="{{ request('date') }}"
                class="border rounded px-3 py-1">
            <select name="status" class="border rounded px-3 py-1">
                <option value="">All Status</option>
                <option value="pending" {{ request('status') == 'pending' ? 'selected' : '' }}>Pending</option>
                <option value="confirmed" {{ request('status') == 'confirmed' ? 'selected' : '' }}>Confirmed</option>
                <option value="cancelled" {{ request('status') == 'cancelled' ? 'selected' : '' }}>Cancelled</option>
            </select>
            <button type="submit" class="bg-gold text-white px-4 py-1 rounded">Filter</button>
        </form>
    </div>

    <!-- Reservations Table -->
    <table class="min-w-full">
        <thead>
            <tr class="border-b">
                <th class="px-6 py-3 text-left">ID</th>
                <th class="px-6 py-3 text-left">Customer</th>
                <th class="px-6 py-3 text-left">Date & Time</th>
                <th class="px-6 py-3 text-left">Guests</th>
                <th class="px-6 py-3 text-left">Table</th>
                <th class="px-6 py-3 text-left">Status</th>
                <th class="px-6 py-3 text-left">Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($reservations as $reservation)
            <tr class="border-b hover:bg-gray-50">
                <td class="px-6 py-4">#{{ $reservation->id }}</td>
                <td class="px-6 py-4">
                    <div>{{ $reservation->user->name }}</div>
                    <div class="text-sm text-gray-600">{{ $reservation->user->email }}</div>
                </td>
                <td class="px-6 py-4">
                    <div>{{ $reservation->reservation_time->format('Y-m-d') }}</div>
                    <div class="text-sm text-gray-600">{{ $reservation->reservation_time->format('H:i') }}</div>
                </td>
                <td class="px-6 py-4">{{ $reservation->number_of_guests }}</td>
                <td class="px-6 py-4">Table #{{ $reservation->table->table_number }}</td>
                <td class="px-6 py-4">
                    <span class="px-2 py-1 rounded-full text-sm 
                        {{ $reservation->status === 'confirmed' ? 'bg-green-100 text-green-800' : 
                           ($reservation->status === 'pending' ? 'bg-yellow-100 text-yellow-800' : 'bg-red-100 text-red-800') }}">
                        {{ ucfirst($reservation->status) }}
                    </span>
                </td>
                <td class="px-6 py-4">
                    <div class="flex space-x-2">
                        @if($reservation->status === 'pending')
                        <form action="{{ route('admin.reservations.confirm', $reservation) }}" method="POST">
                            @csrf
                            <button type="submit" class="text-green-600 hover:text-green-900">Confirm</button>
                        </form>
                        @endif
                        <form action="{{ route('admin.reservations.cancel', $reservation) }}" method="POST">
                            @csrf
                            <button type="submit" class="text-red-600 hover:text-red-900">Cancel</button>
                        </form>
                    </div>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>

    <!-- Pagination -->
    <div class="p-4">
        {{ $reservations->links() }}
    </div>
</div>
@endsection