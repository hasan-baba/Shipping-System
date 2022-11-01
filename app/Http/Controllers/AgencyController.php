<?php

namespace App\Http\Controllers;

use http\Env\Response;
use Illuminate\Http\Request;
use App\Models\Agency;
use Illuminate\Support\Facades\Validator;

class AgencyController extends Controller
{
    public function list() {
        $agencies = Agency::orderBy('agency_name')->get();
        return view('agency.list', ['agencies' => $agencies]);
    }
    public function store(Request $request) {
        $agency = new Agency;
        $agency->agency_name = $request->input('agencyName');
        $agency->save();
        return response()->json([
            'status' => 200,
            'message' => 'Added Successfully',
            'id' => $agency->id,
            'agency_name' => $request->input('agencyName')
        ]);
    }
    public function edit($id) {
        $agency = Agency::findOrFail($id);
        return response()->json([
            'agency' => $agency
        ]);
    }
    public function update(Request $request, $id) {
        $agency = Agency::findOrFail($id);
        $agency->agency_name = $request->input('agency_name');
        $agency->update();
        return response()->json([
            'status' => 200,
            'message' => 'Successfully Updated'
        ]);
    }
    public function destroy($id) {
        $agency = Agency::findOrFail($id);
        $agency->delete();
        return response()->json(['status' => 'Agency Deleted Successfully!']);
    }
}
