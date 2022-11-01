<?php

namespace App\Http\Controllers;

use App\Models\Transit;
use Illuminate\Http\Request;

class TransitController extends Controller
{
    public function store(Request $request) {
        $transit = new Transit;
        $transit->manifest_id = $request->input('manifest_id');
        $transit->transitQty = $request->input('trns_qty');
        $transit->transitWeight = $request->input('trns_weight');
        $transit->transitPack = $request->input('trns_pack');
        $transit->transitCargo = $request->input('trns_cargo');
        $transit->save();
        return response()->json([
            'status' => 200,
            'message' => 'Added Successfully'
        ]);
    }
    public function edit($id) {
        $transit = Transit::findOrFail($id);
        return response()->json([
            'transit' => $transit
        ]);
    }
    public function update(Request $request, $id) {
        $transit = Transit::findOrFail($id);
        $transit->transitQty = $request->input('transitQty');
        $transit->transitWeight = $request->input('transitWght');
        $transit->transitPack = $request->input('transitPack');
        $transit->transitCargo = $request->input('transitCargo');
        $transit->update();
        return response()->json([
            'status' => 200,
            'message' => 'Successfully Updated'
        ]);
    }
    public function destroy($id) {
        $transit = Transit::findOrFail($id);
        $transit->delete();
        return response()->json([
            'status' => 200,
            'message' => 'Transit Deleted Successfully!'
        ]);
    }
}
