<?php

namespace App\Http\Controllers;

use App\Models\BillofLading;
use App\Models\DischargingPlan;
use App\Models\Trip;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

class BillofLadingController extends Controller
{
    public function store(Request $request) {
        $billLading = new BillofLading;
        $billLading->manifest_id = $request->input('manifest_id');
        $billLading->billnb = $request->input('billofladingnb');
        $billLading->shipper = $request->input('shipper');
        $billLading->consignee = $request->input('consignee');
        $billLading->notify = $request->input('notify');
        $billLading->cargo_id = $request->input('cargo_id');
        $billLading->package_id = $request->input('package_id');
        $billLading->quantity = $request->input('quantity');
        $billLading->weight = $request->input('weight');
        $billLading->save();
        return response()->json([
            'status' => 200,
            'message' => 'Added Successfully'
        ]);
    }

    public function index(Request $request) {
        $id = $request->input('manifest_id');
        $billLading = BillofLading::with('cargo', 'package')->where('manifest_id', $id)->get();
        return response()->json([
            'status' => 200,
            'billLading' => $billLading,
        ]);
    }
    public function edit($id) {
        $billLading = BillofLading::with('cargo')->findOrFail($id);
        return response()->json([
            'billLading' => $billLading
        ]);
    }
    public function update(Request $request, $id) {
        $billLading = BillofLading::findOrFail($id);
        $billLading->billnb = $request->input('billofladingnb');
        $billLading->shipper = $request->input('shipper');
        $billLading->consignee = $request->input('consignee');
        $billLading->notify = $request->input('notify');
        $billLading->cargo_id = $request->input('cargo_id');
        $billLading->package_id = $request->input('package_id');
        $billLading->quantity = $request->input('quantity');
        $billLading->weight = $request->input('weight');
        $billLading->update();
        return response()->json([
            'status' => 200,
            'message' => 'Successfully Updated'
        ]);
    }
    public function destroy($id) {
        $bill = BillofLading::findOrFail($id);
        $bill->delete();
        return response()->json(['status' => 'Bill of Lading Deleted Successfully!']);
    }
    public function cargo($id) {
        $billLading = BillofLading::whereRelation('manifest.trip', 'id', '=', $id)
            ->with('cargo')
            ->select('cargo_id')
            ->groupBy('cargo_id')
            ->get();
        return response()->json([
            'billLading' => $billLading
        ]);
    }
    public function cargoTotalWeightQuantity($tripId, $cargoId) {
        $totalWeight = BillofLading::whereRelation('manifest.trip', 'id', '=', $tripId)
            ->where('cargo_id', '=', $cargoId)
            ->with('cargo')
            ->sum('weight');
        $totalQuantity = BillofLading::whereRelation('manifest.trip', 'id', '=', $tripId)
            ->where('cargo_id', '=', $cargoId)
            ->with('cargo')
            ->sum('quantity');
        $is_found = DischargingPlan::where('cargo_id', $cargoId)
            ->where('trip_id', $tripId)
            ->get();
        $package = BillofLading::with('package')->whereRelation('manifest.trip', 'id', '=', $tripId)
            ->where('cargo_id', '=', $cargoId)
            ->groupBy('cargo_id')
            ->get();
        return response()->json([
            'totalWeight' => $totalWeight,
            'totalQuantity' => $totalQuantity,
            'is_found' => $is_found,
            'package' => $package
        ]);
    }
}
