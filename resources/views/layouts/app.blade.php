<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'System Dashboard')</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600&display=swap" rel="stylesheet">
    <style>
        body { font-family: 'Inter', sans-serif; background-color: #fcfcfc; }
    </style>
</head>
<body class="text-gray-900 antialiased selection:bg-gray-200 selection:text-black @yield('body_class')">

    <header class="bg-white border-b border-gray-100 sticky top-0 z-50">
        <div class="max-w-6xl mx-auto px-6 lg:px-8">
            <div class="flex justify-between items-center h-16">
                <div class="flex items-center gap-8">
                    <!-- Logo / Home Link -->
                    <a href="{{ url('/') }}" class="flex items-center gap-2 group">
                        <div class="w-8 h-8 bg-black text-white flex items-center justify-center rounded-lg font-bold group-hover:bg-gray-800 transition-colors">
                            S
                        </div>
                        <span class="font-semibold text-lg tracking-tight text-gray-900 group-hover:text-black transition-colors">System</span>
                    </a>
                    
                    @auth
                    <!-- Main Navigation -->
                    <nav class="hidden md:flex items-center gap-6">
                        <a href="{{ url('/') }}" class="text-sm font-medium transition-colors {{ request()->is('/') ? 'text-black' : 'text-gray-500 hover:text-black' }}">
                            Dashboard
                        </a>
                        <a href="{{ url('/sensor') }}" class="text-sm font-medium transition-colors {{ request()->is('sensor*') ? 'text-black' : 'text-gray-500 hover:text-black' }}">
                            Sensors
                        </a>
                        <a href="{{ url('/device') }}" class="text-sm font-medium transition-colors {{ request()->is('device*') ? 'text-black' : 'text-gray-500 hover:text-black' }}">
                            Devices
                        </a>
                    </nav>
                    @endauth
                </div>

                <div class="flex items-center gap-4">
                    @auth
                        <div class="flex items-center gap-4">
                            <span class="text-sm text-gray-600 font-medium">Hi, {{ auth()->user()->name }}</span>
                            <form action="{{ route('logout') }}" method="POST" class="inline">
                                @csrf
                                <button type="submit" class="text-sm font-medium text-red-600 hover:text-red-855 transition-colors cursor-pointer">
                                    Logout
                                </button>
                            </form>
                        </div>
                    @else
                        <a href="{{ route('login') }}" class="text-sm font-medium text-gray-500 hover:text-black transition-colors">
                            Login
                        </a>
                        <a href="{{ route('register') }}" class="inline-flex items-center justify-center px-4 py-2 text-sm font-medium text-white bg-black hover:bg-gray-800 transition-colors rounded-lg shadow-sm">
                            Register
                        </a>
                    @endauth
                </div>
            </div>
        </div>
    </header>

    <main class="max-w-6xl mx-auto py-10 px-6 lg:px-8 min-h-screen">
        @if (session('success'))
            <div class="mb-6 p-4 bg-emerald-50 border border-emerald-100 text-emerald-800 text-sm rounded-xl flex items-center gap-3 shadow-sm">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-emerald-600 shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                </svg>
                <span>{{ session('success') }}</span>
            </div>
        @endif
        @yield('content')
    </main>

</body>
</html>
