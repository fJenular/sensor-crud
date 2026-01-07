<?php

namespace App\Http\Controllers;

use App\Models\Sensor;
use Illuminate\Http\Request;

class SensorController extends Controller
{
    public function index()
    {
        $sensors = Sensor::all();
        return view('sensor.index', compact('sensors'));
    }

    public function create()
    {
        return view('sensor.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_sensor' => 'required',
            'data' => 'required|numeric'
        ]);

        Sensor::create($request->all());

        return redirect('/sensor')->with('success', 'Data sensor berhasil ditambahkan');
    }
    public function edit($id)
{
    $sensor = Sensor::findOrFail($id);
    return view('sensor.edit', compact('sensor'));
}

public function update(Request $request, $id)
{
    $request->validate([
        'nama_sensor' => 'required',
        'data' => 'required|numeric'
    ]);

    $sensor = Sensor::findOrFail($id);
    $sensor->update($request->all());

    return redirect('/sensor')->with('success', 'Data sensor berhasil diupdate');
}

public function destroy($id)
{
    Sensor::findOrFail($id)->delete();
    return redirect('/sensor')->with('success', 'Data sensor berhasil dihapus');
}

}

