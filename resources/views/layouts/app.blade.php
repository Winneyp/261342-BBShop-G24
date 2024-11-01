<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="stylesheet" href="https://fonts.bunny.net/css?family=Nunito">

        <!-- Styles and Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="font-sans antialiased">
        <!-- Fixed Top Banner -->
        <header class="bg-white shadow-md fixed top-0 left-0 right-0 z-50">
            <div class="max-w-7xl mx-auto flex justify-between items-center py-4 px-6">
                <div class="text-2xl font-bold text-gray-900">
                    BBShop
                </div>
                <div class="flex-container" style="display: flex; gap: 20px; justify-content: flex-end; align-items: center; padding-right: 20px;">
                    <a href="{{ route('cart') }}">
                        <img src="{{ asset('storage/UI_icon/cart.png') }}" alt="Cart" style="width: 50px; height: 50px; object-fit: cover; border-radius: 50%;">
                    </a>
                    @if (Auth::check())
                        <a href="{{ route('profile') }}">
                            <img src="{{ asset('storage/UI_icon/icon.png') }}" alt="Profile" style="width: 50px; height: 50px; object-fit: cover; border-radius: 50%;">
                        </a>
                    @else
                        <a href="{{ route('login') }}" style="text-decoration: none; color: inherit;">Login</a>
                    @endif
                </div>


            </div>
        </header>

            <!-- Page Content -->
            <main class="mt-16">
                @yield('content') <!-- Yield the 'content' section here -->
            </main>
        </div>
    </body>
</html>
