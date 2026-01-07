<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Data Sensor</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 text-gray-800">

<div class="max-w-5xl mx-auto py-10">

    <div class="flex items-center justify-between mb-6">
        <h1 class="text-2xl font-semibold">Data Sensor</h1>

        <a href="/sensor/create"
           class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded-lg text-sm font-medium transition">
            Tambah Data Sensor
        </a>
    </div>

    <div class="bg-white rounded-xl shadow-sm overflow-hidden">
    <table class="w-full">
        <thead class="bg-gray-50 text-left text-sm text-gray-500">
            <tr>
                <th class="px-6 py-4">Nama Sensor</th>
                <th class="px-6 py-4">Data</th>
                <th class="px-6 py-4 text-center">Aksi</th>
            </tr>
        </thead>

        <tbody class="divide-y">
            @forelse ($sensors as $sensor)
                <tr class="hover:bg-gray-50 transition">
                    <td class="px-6 py-4 font-medium">
                        {{ $sensor->nama_sensor }}
                    </td>

                    <td class="px-6 py-4">
                        {{ $sensor->data }}
                    </td>

                    <td class="px-6 py-4">
                        <div class="flex items-center justify-center gap-3">

                            <!-- Edit -->
                            <a href="/sensor/{{ $sensor->id }}/edit"
                               class="text-blue-600 hover:text-blue-800 transition"
                               title="Edit">
                                <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5"
                                     fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                          stroke-width="2"
                                          d="M15.232 5.232l3.536 3.536M9 11l6-6m-3 12H6a2 2 0 01-2-2v-6"/>
                                </svg>
                            </a>

                            <!-- Delete -->
                            <form action="/sensor/{{ $sensor->id }}" method="POST"
                                  onsubmit="return confirm('Yakin ingin menghapus data ini?')">
                                @csrf
                                @method('DELETE')
                                <button class="text-red-600 hover:text-red-800 transition"
                                        title="Hapus">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5"
                                         fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                              stroke-width="2"
                                              d="M6 18L18 6M6 6l12 12"/>
                                    </svg>
                                </button>
                            </form>

                        </div>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="3"
                        class="px-6 py-8 text-center text-gray-400">
                        Belum ada data sensor
                    </td>
                </tr>
            @endforelse
        </tbody>
    </table>
</div>


</div>

</body>
</html>
