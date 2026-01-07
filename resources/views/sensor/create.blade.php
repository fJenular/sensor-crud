<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Tambah Data Sensor</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 text-gray-800">

<div class="max-w-xl mx-auto py-10">

    <div class="bg-white rounded-xl shadow-sm p-6">
        <h1 class="text-xl font-semibold mb-6">
            Tambah Data Sensor
        </h1>

        <form action="/sensor" method="POST" class="space-y-5">
            @csrf

            <div>
                <label class="block text-sm font-medium mb-1">
                    Nama Sensor
                </label>
                <input type="text" name="nama_sensor"
                       class="w-full border rounded-lg px-4 py-2 focus:ring-2 focus:ring-blue-500 focus:outline-none"
                       placeholder="Contoh: Sensor Suhu">
            </div>

            <div>
                <label class="block text-sm font-medium mb-1">
                    Data
                </label>
                <input type="number" name="data"
                       class="w-full border rounded-lg px-4 py-2 focus:ring-2 focus:ring-blue-500 focus:outline-none"
                       placeholder="Masukkan nilai sensor">
            </div>

            <div class="flex justify-end gap-3 pt-4">
                <a href="/sensor"
                   class="px-4 py-2 rounded-lg border text-sm hover:bg-gray-100 transition">
                    Batal
                </a>

                <button type="submit"
                        class="bg-blue-600 hover:bg-blue-700 text-white px-5 py-2 rounded-lg text-sm font-medium transition">
                    Simpan
                </button>
            </div>
        </form>
    </div>

</div>

</body>
</html>
