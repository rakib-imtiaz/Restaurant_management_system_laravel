@extends('layouts.app')

@section('content')
<div class="pt-24">
    <!-- Menu Header -->
    <div class="container mx-auto px-6 py-12">
        <h1 class="text-5xl italic text-center mb-12">Menu</h1>

        <!-- Menu Navigation -->
        <div class="flex justify-center space-x-4 mb-12">
            @foreach(['Main', 'Pizza', 'Lunch', 'Salads', 'Drinks', 'Desserts', 'Appetizers', 'Bar'] as $category)
            <a href="#{{ strtolower($category) }}"
                class="text-lg hover:text-gold transition-colors">
                {{ $category }}
            </a>
            @endforeach
        </div>

        <!-- Menu Items -->
        <div class="grid grid-cols-1 md:grid-cols-2 gap-12 max-w-4xl mx-auto">
            @foreach($menuItems as $item)
            <div class="flex justify-between items-center border-b border-gray-200 pb-4">
                <div>
                    <h3 class="text-xl mb-1">{{ $item->name }}</h3>
                    <p class="text-gray-600">{{ $item->description }}</p>
                </div>
                <div class="text-xl">€{{ number_format($item->price, 2) }}</div>
            </div>
            @endforeach
        </div>
    </div>
</div>
@endsection