@extends('layouts.app')

@section('title', 'System Dashboard')

@section('content')

<div>
    <!-- Header -->
    <div class="mb-10 flex flex-col sm:flex-row justify-between items-start sm:items-end gap-4 mt-5">
        <div>
            <h1 class="text-3xl font-semibold tracking-tight text-gray-900 mb-2">
                System Overview
            </h1>
            <p class="text-gray-500 font-light">Real-time metrics and central management for your infrastructure.</p>
        </div>
        <div class="flex gap-3">
            <a href="/sensor/create" class="inline-flex items-center justify-center px-4 py-2 text-sm font-medium text-gray-700 bg-white border border-gray-300 hover:bg-gray-50 transition-colors rounded-lg shadow-sm">
                + Add Sensor
            </a>
            <a href="/device/create" class="inline-flex items-center justify-center px-4 py-2 text-sm font-medium text-white bg-black hover:bg-gray-800 transition-colors rounded-lg shadow-sm">
                + Add Device
            </a>
        </div>
    </div>

    <!-- Metrics Cards -->
    <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-12">
        <!-- Sensor Metric -->
        <a href="/sensor" class="group block p-6 bg-white border border-gray-200 rounded-2xl hover:border-black transition-colors shadow-sm hover:shadow-md relative overflow-hidden">
            <div class="absolute top-0 right-0 p-6 opacity-10 group-hover:opacity-20 transition-opacity">
                <svg xmlns="http://www.w3.org/2000/svg" width="64" height="64" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                    <circle cx="12" cy="12" r="10"></circle>
                    <line x1="12" y1="8" x2="12" y2="12"></line>
                    <line x1="12" y1="16" x2="12.01" y2="16"></line>
                </svg>
            </div>
            <p class="text-sm font-medium text-gray-500 mb-1">Total Sensors</p>
            <h2 class="text-4xl font-semibold text-gray-900">{{ $totalSensors ?? 0 }}</h2>
            <div class="mt-4 flex items-center text-sm text-blue-600 font-medium">
                Manage Sensors
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="ml-1 group-hover:translate-x-1 transition-transform">
                    <line x1="5" y1="12" x2="19" y2="12"></line>
                    <polyline points="12 5 19 12 12 19"></polyline>
                </svg>
            </div>
        </a>

        <!-- Device Metric -->
        <a href="/device" class="group block p-6 bg-white border border-gray-200 rounded-2xl hover:border-black transition-colors shadow-sm hover:shadow-md relative overflow-hidden">
            <div class="absolute top-0 right-0 p-6 opacity-10 group-hover:opacity-20 transition-opacity">
                <svg xmlns="http://www.w3.org/2000/svg" width="64" height="64" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                    <rect x="2" y="3" width="20" height="14" rx="2" ry="2"></rect>
                    <line x1="8" y1="21" x2="16" y2="21"></line>
                    <line x1="12" y1="17" x2="12" y2="21"></line>
                </svg>
            </div>
            <p class="text-sm font-medium text-gray-500 mb-1">Registered Devices</p>
            <h2 class="text-4xl font-semibold text-gray-900">{{ $totalDevices ?? 0 }}</h2>
            <div class="mt-4 flex items-center text-sm text-blue-600 font-medium">
                Manage Devices
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="ml-1 group-hover:translate-x-1 transition-transform">
                    <line x1="5" y1="12" x2="19" y2="12"></line>
                    <polyline points="12 5 19 12 12 19"></polyline>
                </svg>
            </div>
        </a>
    </div>

    <!-- Recent Data Tables -->
    <div class="grid grid-cols-1 xl:grid-cols-2 gap-8">
        
        <!-- Recent Sensors -->
        <div>
            <div class="flex items-center justify-between mb-4">
                <h3 class="text-lg font-medium text-gray-900">Recent Sensor Data</h3>
                <a href="/sensor" class="text-sm text-gray-500 hover:text-black transition-colors">View all</a>
            </div>
            <div class="bg-white border border-gray-200 rounded-xl overflow-hidden shadow-sm">
                <table class="w-full text-sm text-left">
                    <thead class="bg-gray-50/50 border-b border-gray-100 text-gray-500 font-medium">
                        <tr>
                            <th class="px-5 py-3">Sensor</th>
                            <th class="px-5 py-3">Value</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-100">
                        @forelse ($latestSensors ?? [] as $sensor)
                            <tr class="hover:bg-gray-50/50 transition-colors">
                                <td class="px-5 py-3 font-medium text-gray-900">
                                    {{ $sensor->nama_sensor }}
                                    <span class="block text-xs text-gray-400 font-normal mt-0.5">ID #{{ str_pad($sensor->id, 4, '0', STR_PAD_LEFT) }}</span>
                                </td>
                                <td class="px-5 py-3">
                                    <span class="font-mono text-gray-700 bg-gray-100 px-2.5 py-1 rounded-md text-xs">
                                        {{ $sensor->data }}
                                    </span>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="2" class="px-5 py-8 text-center text-sm text-gray-400">No sensor data available.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>

        <!-- Recent Devices -->
        <div>
            <div class="flex items-center justify-between mb-4">
                <h3 class="text-lg font-medium text-gray-900">Recently Registered Devices</h3>
                <a href="/device" class="text-sm text-gray-500 hover:text-black transition-colors">View all</a>
            </div>
            <div class="bg-white border border-gray-200 rounded-xl overflow-hidden shadow-sm">
                <table class="w-full text-sm text-left">
                    <thead class="bg-gray-50/50 border-b border-gray-100 text-gray-500 font-medium">
                        <tr>
                            <th class="px-5 py-3">Device Name</th>
                            <th class="px-5 py-3">Topic</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-100">
                        @forelse ($latestDevices ?? [] as $device)
                            <tr class="hover:bg-gray-50/50 transition-colors">
                                <td class="px-5 py-3 font-medium text-gray-900">
                                    {{ $device->nama_device }}
                                    <span class="block text-xs text-gray-400 font-normal mt-0.5">SN: {{ $device->serial_number }}</span>
                                </td>
                                <td class="px-5 py-3">
                                    <span class="text-gray-700 bg-gray-100 px-2.5 py-1 rounded-md text-xs">
                                        {{ $device->topic }}
                                    </span>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="2" class="px-5 py-8 text-center text-sm text-gray-400">No devices registered.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>

    </div>

</div>

@endsection
