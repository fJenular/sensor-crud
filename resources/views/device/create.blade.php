@extends('layouts.app')

@section('title', 'Add Device')

@section('content')

<div class="w-full max-w-md mx-auto mt-10">
    <!-- Header -->
    <div class="mb-8">
        <a href="/device" class="inline-flex items-center text-sm text-gray-500 hover:text-black transition-colors mb-4">
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="mr-1">
                <line x1="19" y1="12" x2="5" y2="12"></line>
                <polyline points="12 19 5 12 12 5"></polyline>
            </svg>
            Back
        </a>
        <h1 class="text-2xl font-semibold tracking-tight text-gray-900">
            Add Device
        </h1>
        <p class="text-gray-500 mt-1 text-sm font-light">Register a new device to the dashboard.</p>
    </div>

    <!-- Form Card -->
    <div class="bg-white border border-gray-200 rounded-xl p-8 shadow-sm">
        <form action="/device" method="POST" class="space-y-6">
            @csrf

            <div class="space-y-1">
                <label class="block text-sm font-medium text-gray-700">
                    Device Name
                </label>
                <input type="text" name="nama_device" required
                       class="w-full bg-white border border-gray-300 rounded-lg px-4 py-2.5 text-gray-900 placeholder-gray-400 focus:ring-1 focus:ring-black focus:border-black outline-none transition-all text-sm"
                       placeholder="e.g. ESP32 Node 1">
            </div>

            <div class="space-y-1">
                <label class="block text-sm font-medium text-gray-700">
                    Serial Number
                </label>
                <input type="text" name="serial_number" required
                       class="w-full bg-white border border-gray-300 rounded-lg px-4 py-2.5 text-gray-900 placeholder-gray-400 focus:ring-1 focus:ring-black focus:border-black outline-none transition-all text-sm"
                       placeholder="e.g. SN-12345678">
            </div>

            <div class="space-y-1">
                <label class="block text-sm font-medium text-gray-700">
                    Topic
                </label>
                <input type="text" name="topic" required
                       class="w-full bg-white border border-gray-300 rounded-lg px-4 py-2.5 text-gray-900 placeholder-gray-400 focus:ring-1 focus:ring-black focus:border-black outline-none transition-all text-sm"
                       placeholder="e.g. sensors/room1">
            </div>

            <div class="pt-4">
                <button type="submit"
                        class="w-full flex items-center justify-center px-4 py-2.5 text-sm font-medium text-white bg-black hover:bg-gray-800 transition-colors rounded-lg shadow-sm">
                    Save Device
                </button>
            </div>
        </form>
    </div>
</div>

@endsection
