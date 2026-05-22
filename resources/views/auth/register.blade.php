@extends('layouts.auth')

@section('title', 'Register')
@section('heading', 'Create Account')
@section('subheading', 'Sign up to manage your sensors and devices')

@section('content')
<form class="space-y-6" action="{{ route('register') }}" method="POST">
    @csrf

    <div>
        <label for="name" class="block text-sm font-medium text-gray-700">Full Name</label>
        <div class="mt-1">
            <input id="name" name="name" type="text" autocomplete="name" required value="{{ old('name') }}"
                class="appearance-none block w-full px-4 py-3 border border-gray-300 rounded-xl shadow-sm placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-black focus:border-transparent sm:text-sm transition-all @error('name') border-red-500 focus:ring-red-500 @enderror">
        </div>
        @error('name')
            <p class="mt-2 text-sm text-red-600 font-light flex items-center gap-1">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z" />
                </svg>
                {{ $message }}
            </p>
        @enderror
    </div>

    <div>
        <label for="email" class="block text-sm font-medium text-gray-700">Email Address</label>
        <div class="mt-1">
            <input id="email" name="email" type="email" autocomplete="email" required value="{{ old('email') }}"
                class="appearance-none block w-full px-4 py-3 border border-gray-300 rounded-xl shadow-sm placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-black focus:border-transparent sm:text-sm transition-all @error('email') border-red-500 focus:ring-red-500 @enderror">
        </div>
        @error('email')
            <p class="mt-2 text-sm text-red-600 font-light flex items-center gap-1">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z" />
                </svg>
                {{ $message }}
            </p>
        @enderror
    </div>

    <div>
        <label for="password" class="block text-sm font-medium text-gray-700">Password</label>
        <div class="mt-1">
            <input id="password" name="password" type="password" autocomplete="new-password" required
                class="appearance-none block w-full px-4 py-3 border border-gray-300 rounded-xl shadow-sm placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-black focus:border-transparent sm:text-sm transition-all @error('password') border-red-500 focus:ring-red-500 @enderror">
        </div>
        @error('password')
            <p class="mt-2 text-sm text-red-600 font-light flex items-center gap-1">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z" />
                </svg>
                {{ $message }}
            </p>
        @enderror
    </div>

    <div>
        <label for="password_confirmation" class="block text-sm font-medium text-gray-700">Confirm Password</label>
        <div class="mt-1">
            <input id="password_confirmation" name="password_confirmation" type="password" autocomplete="new-password" required
                class="appearance-none block w-full px-4 py-3 border border-gray-300 rounded-xl shadow-sm placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-black focus:border-transparent sm:text-sm transition-all">
        </div>
    </div>

    <div>
        <button type="submit"
            class="w-full flex justify-center py-3 px-4 border border-transparent rounded-xl shadow-md text-sm font-medium text-white bg-black hover:bg-gray-800 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-black transition-all">
            Register
        </button>
    </div>
</form>

<div class="mt-6 text-center border-t border-gray-100 pt-6">
    <p class="text-sm text-gray-500 font-light">
        Already have an account? 
        <a href="{{ route('login') }}" class="font-medium text-black hover:underline">
            Sign in here
        </a>
    </p>
</div>
@endsection
