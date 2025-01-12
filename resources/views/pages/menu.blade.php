@extends('layouts.app')

@section('content')
<!-- Menu Hero Section -->
<div class="relative h-[400px]">
    <div class="absolute inset-0">
        <img src="https://images.unsplash.com/photo-1414235077428-338989a2e8c0?q=80&w=2070&auto=format&fit=crop"
            class="w-full h-full object-cover" alt="Restaurant Interior">
        <div class="absolute inset-0 bg-black opacity-60"></div>
    </div>
    <div class="relative flex flex-col items-center justify-center h-full text-white text-center px-4">
        <h1 class="text-4xl md:text-6xl font-serif mb-4">Our Menu</h1>
        <p class="text-xl font-serif tracking-wider">AUTHENTIC ITALIAN CUISINE</p>
    </div>
</div>

<!-- Menu Section -->
<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-16">
    @foreach($menuItems as $category => $items)
    <div class="mb-16">
        <h2 class="text-3xl font-serif text-center mb-12">{{ $category }}</h2>
        <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
            @foreach($items as $item)
            <div class="flex bg-white rounded-lg shadow-lg overflow-hidden">
                <div class="w-1/3">
                    <img src="{{ $item['image'] }}"
                        alt="{{ $item['name'] }}"
                        class="w-full h-full object-cover">
                </div>
                <div class="w-2/3 p-6">
                    <div class="flex justify-between items-start mb-2">
                        <h3 class="text-xl font-serif">{{ $item['name'] }}</h3>
                        <span class="text-[#C8A97E] font-semibold">€{{ number_format($item['price'], 2) }}</span>
                    </div>
                    <p class="text-gray-600 text-sm">{{ $item['description'] }}</p>
                </div>
            </div>
            @endforeach
        </div>
    </div>
    @endforeach
</div>

<!-- Reservation CTA -->
<section class="bg-[#1A1A1A] text-white py-16">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
        <h2 class="text-3xl font-serif mb-6">Join Us for Dinner</h2>
        <p class="text-gray-300 mb-8 max-w-2xl mx-auto font-serif">
            Experience our authentic Italian cuisine in an elegant atmosphere.
            Make your reservation today.
        </p>
        <a href="{{ route('reservations') }}"
            class="inline-block bg-[#C8A97E] text-white px-8 py-3 font-serif uppercase tracking-wider hover:bg-[#B69A71] transition duration-300">
            Reserve a Table
        </a>
    </div>
</section>
@endsection