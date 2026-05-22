<?php

namespace App\Http\Controllers;

use App\Models\Device;
use Illuminate\Http\Request;

class DeviceController extends Controller
{
    public function index()
    {
        $devices = Device::all();
        return view('device.index', compact('devices'));
    }

    public function create()
    {
        return view('device.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_device' => 'required',
            'serial_number' => 'required',
            'topic' => 'required',
        ]);

        Device::create($request->all());
        return redirect('/device')->with('success', 'Device created successfully.');
    }

    public function edit($id)
    {
        $device = Device::findOrFail($id);
        return view('device.edit', compact('device'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nama_device' => 'required',
            'serial_number' => 'required',
            'topic' => 'required',
        ]);

        $device = Device::findOrFail($id);
        $device->update($request->all());
        return redirect('/device')->with('success', 'Device updated successfully.');
    }

    public function destroy($id)
    {
        $device = Device::findOrFail($id);
        $device->delete();
        return redirect('/device')->with('success', 'Device deleted successfully.');
    }
}
