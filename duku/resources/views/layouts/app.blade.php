<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
        
        <style>
            /* Optional: Add custom styles here if needed */
            /* For example, adjusting padding or sidebar width */
            .sidebar {
                width: 250px;
                flex-shrink: 0;
            }

            .main-content {
                flex-grow: 1;
                overflow-x: auto;
            }
        </style>
    </head>
    <body class="font-sans antialiased">
        <div class="min-h-screen bg-gray-100 flex">
            <!-- Sidebar Navigation -->
            <div class="sidebar bg-gray-800 text-white flex flex-col">
                <div class="p-4 text-xl font-semibold border-b border-gray-700">
                    Dukundumurimo
                </div>
                <nav class="flex-1 px-2 py-4 space-y-2">
                    <!-- Dashboard Link -->
                    <a href="{{ route('dashboard') }}" class="flex items-center px-2 py-2 text-sm font-medium rounded-md hover:bg-gray-700 {{ request()->routeIs('dashboard') ? 'bg-gray-700' : '' }}">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="h-5 w-5 mr-3">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m0 0l7 7m-2 2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6" />
                          </svg>
                        Dashboard
                    </a>
                    <!-- Foods Link -->
                    <a href="{{ route('foods.index') }}" class="flex items-center px-2 py-2 text-sm font-medium rounded-md hover:bg-gray-700 {{ request()->routeIs('foods.index') ? 'bg-gray-700' : '' }}">
                         <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="h-5 w-5 mr-3">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M9 17.25v1.007a3 3 0 01-.855 2.14L7.472 21H3a2 2 0 01-2-2V7a2 2 0 012-2h5.5M9 17.25H9.75m4.5 0H19.5a2 2 0 002-2V6.75a2 2 0 00-2-2h-2.72m4.5 0l-1.423-.711c-.513-.256-1.176-.66-1.423-.71L15 3.375m0 0l-.003-.001bc-1.119-.03-.981-1.45.3-1.5l2.25-.75a4.5 4.5 0 012.337 4.55l-.005 1.11m2.05 9.25V12a9 9 0 00-9-9l-.025.001-.002.002A9 9 0 009 12v1.25m6.75 0a3 3 0 11-6 0 3 3 0 016 0zm-3-6a.008.008 0 01.02-.022A.75.75 0 0012 6a.75.75 0 00-.003.098l.003-.002z" />
                          </svg>
                        Foods
                    </a>
                     <!-- Imports Link -->
                    <a href="{{ route('imports.index') }}" class="flex items-center px-2 py-2 text-sm font-medium rounded-md hover:bg-gray-700 {{ request()->routeIs('imports.index') ? 'bg-gray-700' : '' }}">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="h-5 w-5 mr-3">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 13.5l-7.5 7.5-7.5-7.5m15 0l-7.5-7.5-7.5 7.5" />
                          </svg>
                        Imports
                    </a>
                    <!-- Exports Link -->
                    <a href="{{ route('exports.index') }}" class="flex items-center px-2 py-2 text-sm font-medium rounded-md hover:bg-gray-700 {{ request()->routeIs('exports.index') ? 'bg-gray-700' : '' }}">
                       <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="h-5 w-5 mr-3">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M4.5 10.5L12 3m0 0l7.5 7.5M12 3v18" />
                          </svg>
                        Exports
                    </a>
                     <!-- Profile Link -->
                     <a href="{{ route('profile.edit') }}" class="flex items-center px-2 py-2 text-sm font-medium rounded-md hover:bg-gray-700 {{ request()->routeIs('profile.edit') ? 'bg-gray-700' : '' }}">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="h-5 w-5 mr-3">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M17.982 18.725A7.488 7.488 0 0012 15.75a7.488 7.488 0 00-5.982 2.975m11.963 0a9 9 0 10-11.963 0m11.963 0A8.966 8.966 0 0112 21a8.966 8.966 0 01-5.982-2.275M15 9.75a3 3 0 11-6 0 3 3 0 016 0z" />
                          </svg>
                        Profile
                    </a>

                     <!-- Authentication -->
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf

                            <a href="route('logout')"
                                    onclick="event.preventDefault();
                                                this.closest('form').submit();" class="flex items-center px-2 py-2 text-sm font-medium rounded-md hover:bg-gray-700">
                                 <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="h-5 w-5 mr-3">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 9V5.25A2.25 2.25 0 0013.5 3h-6a2.25 2.25 0 00-2.25 2.25v13.5A2.25 2.25 0 007.5 21h6a2.25 2.25 0 002.25-2.25V15M12 9l3 3m0 0l-3 3m3-3H9" />
                                  </svg>
                                {{ __('Log Out') }}
                            </a>
                        </form>


                </nav>
            </div>

            <!-- Page Content -->
            <div class="main-content flex flex-col">
                 <!-- Page Heading -->
                @if (isset($header))
                    <header class="bg-white shadow">
                        <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                            {{ $header }}
                        </div>
                    </header>
                @endif
                <main class="flex-1 p-6">
                    {{ $slot }}
                </main>
            </div>
        </div>
    </body>
</html>
