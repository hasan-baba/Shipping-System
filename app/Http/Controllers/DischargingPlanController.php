<?php

namespace App\Http\Controllers;

use App\Models\DischargingPlan;
use Illuminate\Http\Request;

class DischargingPlanController extends Controller
{
    public function store(Request $request) {
        $disPlan = new DischargingPlan;
        $disPlan->cargo_id = $request->input('cargo_id_discharge_plan');
        $disPlan->trip_id = $request->input('tripId');
        $disPlan->discharging_qty = $request->input('dis_Qty');
        $disPlan->discharging_wght = $request->input('dis_Weight');
        $disPlan->save();
        return response()->json([
            'status' => 200,
            'message' => 'Added Successfully',
        ]);
    }
    public function edit($id) {
        $discharge = DischargingPlan::with('bill.cargo')->findOrFail($id);
        return response()->json([
            'discharge' => $discharge
        ]);
    }
    public function fetch($id) {
        $discharge = DischargingPlan::where('bill_of_lading_id', $id)->get();
        return response()->json([
            'discharge' => $discharge,
            'message' => 'Already exist'
        ]);
    }
    public function update(Request $request, $id) {
        $discharge = DischargingPlan::findOrFail($id);
        $discharge->discharging_qty = $request->input('dis_Qty');
        $discharge->discharging_wght = $request->input('dis_Weight');
        $discharge->update();
        return response()->json([
            'status' => 200,
            'message' => 'Successfully Updated'
        ]);
    }
    public function destroy($id) {
        $discharge = DischargingPlan::findOrFail($id);
        $discharge->delete();
        return response()->json(['status' => 'Discharging Plan Deleted Successfully!']);
    }
}
