<?php

namespace App\Http\Controllers;

use App\Models\Port;
use Illuminate\Http\Request;

class PortController extends Controller
{
    public function list() {
        $ports = Port::orderBy('port_name')->get();
        return view('port.list', ['ports' => $ports]);
    }
    public function store(Request $request) {
        $ports = new Port;
        $ports->port_name = $request->input('portName');
        $ports->port_arabic_name = $request->input('portArabicName');
        $ports->save();
        return response()->json([
            'status' => 200,
            'message' => 'Added Successfully',
            'id' => $ports->id,
            'port_name' => $request->input('portName')
        ]);
    }
    public function edit($id) {
        $ports = Port::findOrFail($id);
        return response()->json([
            'port' => $ports
        ]);
    }
    public function update(Request $request, $id) {
        $ports = Port::findOrFail($id);
        $ports->port_name = $request->input('port_name');
        $ports->port_arabic_name = $request->input('port_arabic_name');
        $ports->update();
        return response()->json([
            'status' => 200,
            'message' => 'Successfully Updated'
        ]);
    }
    public function destroy($id) {
        $ports = Port::findOrFail($id);
        $ports->delete();
        return response()->json(['status' => 'Port Deleted Successfully!']);
    }
}
