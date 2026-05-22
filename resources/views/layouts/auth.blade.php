<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Authentication') | System</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <style>
        body { font-family: 'Inter', sans-serif; }
    </style>
</head>
<body class="bg-slate-50 text-gray-900 antialiased selection:bg-gray-200 selection:text-black min-h-screen flex flex-col justify-center py-12 sm:px-6 lg:px-8 relative overflow-hidden">
    <!-- Subtle radial gradient background accent -->
    <div class="absolute inset-0 bg-[radial-gradient(circle_at_top,_var(--tw-gradient-stops))] from-blue-50/50 via-slate-50 to-slate-50 pointer-events-none z-0"></div>
    
    <div class="sm:mx-auto sm:w-full sm:max-w-md relative z-10">
        <!-- Logo -->
        <div class="flex justify-center mb-6">
            <div class="w-12 h-12 bg-black text-white flex items-center justify-center rounded-2xl font-bold text-xl shadow-md border border-gray-800">
                S
            </div>
        </div>
        <h2 class="text-center text-3xl font-extrabold tracking-tight text-gray-900">
            @yield('heading')
        </h2>
        <p class="mt-2 text-center text-sm text-gray-500">
            @yield('subheading')
        </p>
    </div>

    <div class="mt-8 sm:mx-auto sm:w-full sm:max-w-md relative z-10 px-4 sm:px-0">
        <div class="bg-white/80 backdrop-blur-md py-8 px-6 border border-gray-200/60 shadow-xl rounded-2xl sm:px-10">
            @if (session('success'))
                <div class="mb-6 p-4 bg-emerald-50 border border-emerald-100 text-emerald-800 text-sm rounded-xl flex items-center gap-3">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-emerald-600 shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                    </svg>
                    <span>{{ session('success') }}</span>
                </div>
            @endif

            @yield('content')
        </div>
    </div>
</body>
</html>
