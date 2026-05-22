@extends('layouts.app')

@section('title', 'Devices Dashboard')

@section('content')

<div>

    <!-- Header Section -->
    <div class="flex flex-col sm:flex-row items-start sm:items-center justify-between mb-12 gap-6">
        <div>
            <h1 class="text-2xl font-semibold tracking-tight text-gray-900">
                Devices
            </h1>
            <p class="text-gray-500 mt-1 text-sm font-light">Manage and monitor your connected devices.</p>
        </div>

        <div class="flex items-center gap-4">
            <a href="/device/create"
               class="inline-flex items-center justify-center px-5 py-2.5 text-sm font-medium text-white bg-black hover:bg-gray-800 transition-colors rounded-md shadow-sm">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="mr-2">
                    <line x1="12" y1="5" x2="12" y2="19"></line>
                    <line x1="5" y1="12" x2="19" y2="12"></line>
                </svg>
                Add Device
            </a>
        </div>
    </div>

    <!-- Main Content Card -->
    <div class="bg-white border border-gray-200 rounded-xl overflow-hidden shadow-sm">
        <div class="overflow-x-auto">
            <table class="w-full text-sm text-left">
                <thead class="bg-gray-50/50 border-b border-gray-100 text-gray-500 font-medium">
                    <tr>
                        <th class="px-6 py-4 font-medium">Device Name</th>
                        <th class="px-6 py-4 font-medium">Serial Number</th>
                        <th class="px-6 py-4 font-medium">Topic</th>
                        <th class="px-6 py-4 font-medium">Time Added</th>
                        <th class="px-6 py-4 font-medium text-right">Actions</th>
                    </tr>
                </thead>

                <tbody class="divide-y divide-gray-100">
                    @forelse ($devices as $device)
                        <tr class="hover:bg-gray-50/50 transition-colors group">
                            <td class="px-6 py-4">
                                <div class="flex items-center gap-3">
                                    <div class="w-8 h-8 rounded-full bg-gray-100 flex items-center justify-center text-gray-600">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                            <rect x="2" y="3" width="20" height="14" rx="2" ry="2"></rect>
                                            <line x1="8" y1="21" x2="16" y2="21"></line>
                                            <line x1="12" y1="17" x2="12" y2="21"></line>
                                        </svg>
                                    </div>
                                    <div>
                                        <div class="font-medium text-gray-900">{{ $device->nama_device }}</div>
                                        <div class="text-xs text-gray-400 mt-0.5 tracking-wider">ID #{{ str_pad($device->id, 4, '0', STR_PAD_LEFT) }}</div>
                                    </div>
                                </div>
                            </td>

                            <td class="px-6 py-4">
                                <span class="font-mono text-gray-700 bg-gray-100 px-2.5 py-1 rounded-md text-xs">
                                    {{ $device->serial_number }}
                                </span>
                            </td>

                            <td class="px-6 py-4">
                                <span class="text-gray-700 bg-gray-100 px-2.5 py-1 rounded-md text-xs">
                                    {{ $device->topic }}
                                </span>
                            </td>

                            <td class="px-6 py-4 text-gray-500">
                                {{ $device->time }}
                            </td>

                            <td class="px-6 py-4">
                                <div class="flex items-center justify-end gap-2">
                                    
                                    <!-- Edit -->
                                    <a href="/device/{{ $device->id }}/edit"
                                       class="p-2 text-gray-400 hover:text-black hover:bg-gray-100 rounded-md transition-colors"
                                       title="Edit">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round">
                                            <path d="M17 3a2.85 2.83 0 1 1 4 4L7.5 20.5 2 22l1.5-5.5Z"/>
                                            <path d="m15 5 4 4"/>
                                        </svg>
                                    </a>

                                    <!-- Delete -->
                                    <form action="/device/{{ $device->id }}" method="POST"
                                          onsubmit="return confirm('Are you sure you want to delete this device?')" class="inline-block">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="p-2 text-gray-400 hover:text-red-600 hover:bg-red-50 rounded-md transition-colors focus:outline-none"
                                                title="Delete">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round">
                                                <path d="M3 6h18"/>
                                                <path d="M19 6v14c0 1-1 2-2 2H7c-1 0-2-1-2-2V6"/>
                                                <path d="M8 6V4c0-1 1-2 2-2h4c1 0 2 1 2 2v2"/>
                                                <line x1="10" x2="10" y1="11" y2="17"/>
                                                <line x1="14" x2="14" y1="11" y2="17"/>
                                            </svg>
                                        </button>
                                    </form>

                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="5" class="px-6 py-16 text-center">
                                <div class="flex flex-col items-center justify-center text-gray-400">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1" stroke-linecap="round" stroke-linejoin="round" class="mb-4 text-gray-300">
                                        <rect x="4" y="4" width="16" height="16" rx="2" ry="2"></rect>
                                        <rect x="9" y="9" width="6" height="6"></rect>
                                        <line x1="9" y1="1" x2="9" y2="4"></line>
                                        <line x1="15" y1="1" x2="15" y2="4"></line>
                                        <line x1="9" y1="20" x2="9" y2="23"></line>
                                        <line x1="15" y1="20" x2="15" y2="23"></line>
                                        <line x1="20" y1="9" x2="23" y2="9"></line>
                                        <line x1="20" y1="14" x2="23" y2="14"></line>
                                        <line x1="1" y1="9" x2="4" y2="9"></line>
                                        <line x1="1" y1="14" x2="4" y2="14"></line>
                                    </svg>
                                    <p class="text-sm">No devices found.</p>
                                </div>
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>

</div>

@endsection
