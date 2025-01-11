@extends('layouts.app')

@section('content')
<div class="pt-24">
    <div class="container mx-auto px-6 py-12">
        <h1 class="text-6xl italic text-center mb-16 fade-in">Make a Reservation</h1>

        <div class="max-w-2xl mx-auto bg-white p-8 rounded-lg shadow-lg slide-up">
            <form action="{{ route('reservations.store') }}" method="POST" class="space-y-6">
                @csrf

                <!-- Name -->
                <div>
                    <label for="name" class="block text-xl mb-2">Full Name</label>
                    <input type="text" id="name" name="name" required
                        class="w-full px-4 py-2 border border-gray-300 rounded-md focus:border-gold focus:ring-gold">
                </div>

                <!-- Email -->
                <div>
                    <label for="email" class="block text-xl mb-2">Email</label>
                    <input type="email" id="email" name="email" required
                        class="w-full px-4 py-2 border border-gray-300 rounded-md focus:border-gold focus:ring-gold">
                </div>

                <!-- Date & Time -->
                <div class="grid grid-cols-2 gap-4">
                    <div>
                        <label for="date" class="block text-xl mb-2">Date</label>
                        <input type="date" id="date" name="date" required
                            class="w-full px-4 py-2 border border-gray-300 rounded-md focus:border-gold focus:ring-gold">
                    </div>
                    <div>
                        <label for="time" class="block text-xl mb-2">Time</label>
                        <input type="time" id="time" name="time" required
                            class="w-full px-4 py-2 border border-gray-300 rounded-md focus:border-gold focus:ring-gold">
                    </div>
                </div>

                <!-- Guests -->
                <div>
                    <label for="guests" class="block text-xl mb-2">Number of Guests</label>
                    <select id="guests" name="guests" required
                        class="w-full px-4 py-2 border border-gray-300 rounded-md focus:border-gold focus:ring-gold">
                        @for($i = 1; $i <= 10; $i++)
                            <option value="{{ $i }}">{{ $i }} {{ $i === 1 ? 'Guest' : 'Guests' }}</option>
                            @endfor
                    </select>
                </div>

                <!-- Special Requests -->
                <div>
                    <label for="special_requests" class="block text-xl mb-2">Special Requests</label>
                    <textarea id="special_requests" name="special_requests" rows="3"
                        class="w-full px-4 py-2 border border-gray-300 rounded-md focus:border-gold focus:ring-gold"></textarea>
                </div>

                <!-- Submit Button -->
                <div>
                    <button type="submit"
                        class="w-full bg-gold text-white py-3 px-6 rounded-md text-xl hover:bg-opacity-90 transition-colors">
                        Make Reservation
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection