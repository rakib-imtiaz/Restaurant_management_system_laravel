@extends('layouts.app')

@section('content')
<div class="pt-24">
    <!-- Story Header -->
    <div class="container mx-auto px-6 py-12">
        <h1 class="text-6xl italic text-center mb-16">Our Story</h1>

        <!-- Timeline -->
        <div class="max-w-4xl mx-auto">
            <!-- Timeline Navigation -->
            <div class="relative mb-16">
                <div class="absolute w-full h-px bg-gray-300 top-1/2"></div>
                <div class="flex justify-between relative">
                    @foreach(['1967', '1975', '1996'] as $year)
                    <div class="flex flex-col items-center">
                        <div class="w-4 h-4 rounded-full bg-gold mb-2"></div>
                        <span class="text-xl">{{ $year }}</span>
                    </div>
                    @endforeach
                </div>
            </div>

            <!-- Timeline Content -->
            <div class="grid grid-cols-1 md:grid-cols-2 gap-16">
                <div class="space-y-6">
                    <img src="{{ asset('images/founder.jpg') }}" alt="Our Founder"
                        class="w-full h-96 object-cover">
                    <p class="text-lg leading-relaxed">
                        Our story began many years ago, when our founders, imbued with a passion
                        for Italian cooking, decided to create a place where every guest can
                        immerse themselves in the atmosphere of Italy, enjoy unique flavors and
                        get an unforgettable experience.
                    </p>
                </div>
                <div class="space-y-6">
                    <img src="{{ asset('images/restaurant-view.jpg') }}" alt="Restaurant View"
                        class="w-full h-96 object-cover">
                    <p class="text-lg leading-relaxed">
                        Our restaurant is not only a place where you can enjoy taste and quality,
                        but also a place where we strive to create a cozy and welcoming atmosphere
                        to make every guest feel at home.
                    </p>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection