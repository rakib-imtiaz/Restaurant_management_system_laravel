<nav class="bg-white border-b border-gray-200">
    <!-- Top Bar -->
    <div class="bg-[#1A1A1A] text-white py-2 text-sm">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 flex justify-between items-center">
            <div class="flex items-center space-x-4">
                <span>
                    <i class="fas fa-phone-alt mr-2"></i>
                    +1 (234) 567-8900
                </span>
                <span>
                    <i class="fas fa-clock mr-2"></i>
                    Mon - Sun: 11:00 - 23:00
                </span>
            </div>
            <div class="flex items-center space-x-4">
                <a href="#" class="hover:text-[#C8A97E]">
                    <i class="fab fa-facebook-f"></i>
                </a>
                <a href="#" class="hover:text-[#C8A97E]">
                    <i class="fab fa-instagram"></i>
                </a>
                <a href="#" class="hover:text-[#C8A97E]">
                    <i class="fab fa-tripadvisor"></i>
                </a>
            </div>
        </div>
    </div>

    <!-- Main Navigation -->
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between h-24">
            <!-- Logo and Primary Nav -->
            <div class="flex items-center">
                <!-- Logo -->
                <div class="flex-shrink-0 flex items-center">
                    <a href="{{ route('home') }}" class="flex flex-col items-center">
                        <span class="text-3xl font-serif text-[#1A1A1A]">TRATTORIA</span>
                        <span class="text-sm uppercase tracking-[0.3em] text-[#C8A97E]">EST. 1990</span>
                    </a>
                </div>

                <!-- Primary Navigation -->
                <div class="hidden lg:flex lg:items-center lg:ml-16 space-x-8">
                    <a href="{{ route('home') }}"
                        class="text-gray-800 hover:text-[#C8A97E] px-3 py-2 font-serif uppercase tracking-wide text-sm">
                        Home
                    </a>
                    <a href="{{ route('menu') }}"
                        class="text-gray-800 hover:text-[#C8A97E] px-3 py-2 font-serif uppercase tracking-wide text-sm">
                        Menu
                    </a>
                    <a href="{{ route('story') }}"
                        class="text-gray-800 hover:text-[#C8A97E] px-3 py-2 font-serif uppercase tracking-wide text-sm">
                        Our Story
                    </a>
                    <a href="{{ route('events') }}"
                        class="text-gray-800 hover:text-[#C8A97E] px-3 py-2 font-serif uppercase tracking-wide text-sm">
                        Events
                    </a>
                </div>
            </div>

            <!-- Secondary Navigation -->
            <div class="hidden lg:flex lg:items-center space-x-6">
                <a href="{{ route('reservations') }}"
                    class="bg-[#C8A97E] text-white hover:bg-[#B69A71] px-6 py-3 font-serif uppercase tracking-wide text-sm border border-[#C8A97E] transition duration-300">
                    Reserve a Table
                </a>

                @auth
                <div class="ml-3 relative" x-data="{ open: false }" @click.away="open = false">
                    <button @click="open = !open"
                        class="flex items-center text-gray-800 hover:text-[#C8A97E] font-serif uppercase tracking-wide text-sm">
                        <span class="mr-2">{{ Auth::user()->name }}</span>
                        <svg class="h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                        </svg>
                    </button>

                    <div x-show="open"
                        class="absolute right-0 mt-2 w-48 rounded-none border border-gray-200 bg-white shadow-lg"
                        style="display: none;">
                        <div class="py-1">
                            @if(Auth::user()->is_admin)
                            <a href="{{ route('admin.dashboard') }}"
                                class="block px-4 py-2 text-sm font-serif uppercase text-gray-700 hover:bg-gray-50 hover:text-[#C8A97E]">
                                Admin Dashboard
                            </a>
                            @endif

                            <a href="{{ route('profile.edit') }}"
                                class="block px-4 py-2 text-sm font-serif uppercase text-gray-700 hover:bg-gray-50 hover:text-[#C8A97E]">
                                Profile
                            </a>

                            <form method="POST" action="{{ route('logout') }}">
                                @csrf
                                <button type="submit"
                                    class="block w-full text-left px-4 py-2 text-sm font-serif uppercase text-gray-700 hover:bg-gray-50 hover:text-[#C8A97E]">
                                    Logout
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
                @else
                <a href="{{ route('login') }}"
                    class="text-gray-800 hover:text-[#C8A97E] font-serif uppercase tracking-wide text-sm">
                    Login
                </a>
                <span class="text-gray-300">|</span>
                <a href="{{ route('register') }}"
                    class="text-gray-800 hover:text-[#C8A97E] font-serif uppercase tracking-wide text-sm">
                    Register
                </a>
                @endauth
            </div>

            <!-- Mobile menu button -->
            <div class="flex items-center lg:hidden">
                <button type="button"
                    class="inline-flex items-center justify-center p-2 rounded-md text-gray-400 hover:text-gray-500 hover:bg-gray-100"
                    @click="open = !open">
                    <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                    </svg>
                </button>
            </div>
        </div>
    </div>
</nav>

<!-- Add Font Awesome in your app.blade.php head section -->
@push('styles')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
@endpush