@extends('layouts.app')

@section('content')
<!-- Hero Section -->
<section class="h-screen relative">
    <div class="absolute inset-0">
        <img src="{{ asset('images/hero.jpg') }}" alt="Restaurant View" class="w-full h-full object-cover">
        <div class="absolute inset-0 bg-black bg-opacity-30"></div>
    </div>
    <div class="relative h-full flex items-center justify-center text-white">
        <div class="text-center">
            <h1 class="text-6xl italic mb-4">Through the ages</h1>
            <p class="text-xl">SCROLL TO EXPLORE</p>
        </div>
    </div>
</section>

<!-- Welcome Section -->
<section class="py-20 bg-white">
    <div class="container mx-auto px-6">
        <div class="max-w-3xl mx-auto text-center">
            <h2 class="text-4xl italic mb-6">Welcome to Trattoria</h2>
            <p class="text-xl leading-relaxed">
                We pride ourselves on offering an unforgettable dining experience that
                embodies the essence of Italy. Nestled in the heart of the city, our
                restaurant is a haven for aficionados of authentic Italian cuisine.
            </p>
        </div>
    </div>
</section>

<!-- Menu Preview -->
<section class="py-20 bg-gray-50">
    <div class="container mx-auto px-6">
        <h2 class="text-5xl italic mb-12 text-center">Menu</h2>
        <div class="grid grid-cols-1 md:grid-cols-2 gap-12">
            <!-- Menu Categories -->
            <div class="space-y-6">
                @foreach(['Main', 'Pizza', 'Lunch', 'Salads', 'Drinks', 'Desserts', 'Appetizers', 'Bar'] as $category)
                <a href="/menu#{{ strtolower($category) }}"
                    class="block text-xl hover:text-gold transition-colors">
                    {{ $category }}
                </a>
                @endforeach
            </div>
            <!-- Featured Dish -->
            <div>
                <img src="{{ asset('images/pasta.jpg') }}" alt="Featured Dish"
                    class="w-full h-96 object-cover rounded-lg shadow-lg">
            </div>
        </div>
    </div>
</section>
</div>
@endsection