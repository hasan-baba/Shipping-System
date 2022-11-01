<?php

namespace App\Http\Controllers;

use App\Models\ShipType;
use Illuminate\Http\Request;

class ShipTypeController extends Controller
{
    public function list() {
        $shiptypes = ShipType::orderBy('ship_type_name')->get();
        return view('shiptype.list', ['shiptypes' => $shiptypes]);
    }
    public function store(Request $request) {
        $shiptypes = new ShipType;
        $shiptypes->ship_type_name = $request->input('ShipTypeName');
        $shiptypes->ship_type_ab = $request->input('ShipTypeAB');
        $shiptypes->save();
        return response()->json([
            'status' => 200,
            'message' => 'Added Successfully',
            'shipTypeName' => $request->input('ShipTypeName'),
            'shipTypeAB' => $request->input('ShipTypeAB'),
            'id' => $shiptypes->id
        ]);
    }
    public function edit($id) {
        $shiptypes = ShipType::findOrFail($id);
        return response()->json([
            'shiptype' => $shiptypes
        ]);
    }
    public function update(Request $request, $id) {
        $shiptypes = ShipType::findOrFail($id);
        $shiptypes->ship_type_name = $request->input('ship_type_name');
        $shiptypes->ship_type_ab = $request->input('ship_type_ab');
        $shiptypes->update();
        return response()->json([
            'status' => 200,
            'message' => 'Successfully Updated'
        ]);
    }
    public function destroy($id) {
        $shiptypes = ShipType::findOrFail($id);
        $shiptypes->delete();
        return response()->json(['status' => 'ShipType Deleted Successfully!']);
    }
}
