@extends('layouts.app')

@section('content')
<div class="pt-24">
    <!-- Events Header -->
    <div class="container mx-auto px-6 py-12">
        <h1 class="text-6xl italic text-center mb-16">Events</h1>

        <!-- Events Grid -->
        <div class="grid grid-cols-1 md:grid-cols-3 gap-8 max-w-6xl mx-auto">
            <!-- Event Card -->
            <div class="group cursor-pointer">
                <div class="relative overflow-hidden">
                    <img src="{{ asset('images/event1.jpg') }}" alt="Wine Tasting"
                        class="w-full h-80 object-cover transition-transform duration-500 group-hover:scale-110">
                    <div class="absolute inset-0 bg-black bg-opacity-40 opacity-0 group-hover:opacity-100 transition-opacity duration-500 flex items-center justify-center">
                        <span class="text-white text-xl">Learn More</span>
                    </div>
                </div>
                <div class="mt-4">
                    <h3 class="text-2xl mb-2">Wine Tasting Evenings</h3>
                    <p class="text-gray-600">Every Friday | 7:00 PM</p>
                </div>
            </div>

            <!-- Add more event cards as needed -->
        </div>
    </div>
</div>
@endsection