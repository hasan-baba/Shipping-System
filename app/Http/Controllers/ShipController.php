<?php

namespace App\Http\Controllers;

use App\Models\Ship;
use App\Models\ShipType;
use Illuminate\Http\Request;

class ShipController extends Controller
{
    public function list() {
//        $ships = Ship::orderBy('id', 'desc')->get();
        $ship_types = ShipType::all();
        $ships = Ship::with('shiptype')->get()->sortByDesc('id');
        return view('ship.list', ['ships' => $ships, 'ship_types' => $ship_types]);
    }
    public function edit($id) {
//        $ship = Ship::findOrFail($id);
        $ship = Ship::with('shiptype')->findOrFail($id);
        return response()->json([
            'ship' => $ship
        ]);
    }
    public function update(Request $request, $id) {
        $ship = Ship::findOrFail($id);
        $ship->ship_name = $request->input('edit_ship_name');
        $ship->ex_name = $request->input('ex_name');
        $ship->ship_type = $request->input('ship_type');
        $ship->color = $request->input('color');
        $ship->flag = $request->input('flag');
        $ship->mssi = $request->input('mssi');
        $ship->imo_number = $request->input('imo_number');
        $ship->issc = $request->input('issc');
        $ship->call_sign = $request->input('callsign');
        $ship->registry_port = $request->input('reg_port');
        $ship->registration_date = $request->input('reg_date');
        $ship->registration_number = $request->input('reg_number');
        $ship->owner = $request->input('owner');
        $ship->charterers = $request->input('charterers');
        $ship->date_of_built = $request->input('ship_dob');
        $ship->net_tonnage = $request->input('net_tonage');
        $ship->gross_tonnage = $request->input('gross_ton');
        $ship->dead_weight = $request->input('deadwt');
        $ship->speed = $request->input('speed');
        $ship->overall_length = $request->input('ship_length');
        $ship->draft = $request->input('draft');
        $ship->breadth = $request->input('breadth');
        $ship->depth = $request->input('depth');
        $ship->annuel_survey_of_machinery = $request->input('annuel_survey_machinery');
        $ship->pollition_certificate = $request->input('pollution_certificate');
        $ship->load_line_certificate = $request->input('loadLine_cert');
        $ship->safety_equipment_certificate = $request->input('safty_ec');
        $ship->safety_construction_certificate = $request->input('safty_cc');
        $ship->classification_certificate = $request->input('classification_certificate');
        $ship->radio_telegraphy_certificate = $request->input('radio_telegraphy_certificate');
        $ship->update();
        return response()->json([
            'status' => 200,
            'message' => 'Successfully Updated'
        ]);
    }
    public function store(Request $request) {
        $IMOnb = Ship::where('imo_number', '=', $request->input('imo_number'))->first();
        if ($IMOnb === null) {
            $ship = new Ship;
            $ship->ship_name = $request->input('ship_name');
            $ship->ex_name = $request->input('ex_name');
            $ship->ship_type = $request->input('ship_type');
            $ship->color = $request->input('color');
            $ship->flag = $request->input('flag');
            $ship->mssi = $request->input('mssi');
            $ship->imo_number = $request->input('imo_number');
            $ship->issc = $request->input('issc');
            $ship->call_sign = $request->input('callsign');
            $ship->registry_port = $request->input('reg_port');
            $ship->registration_date = $request->input('reg_date');
            $ship->registration_number = $request->input('reg_number');
            $ship->owner = $request->input('owner');
            $ship->charterers = $request->input('charterers');
            $ship->date_of_built = $request->input('ship_dob');
            $ship->net_tonnage = $request->input('net_tonage');
            $ship->gross_tonnage = $request->input('gross_ton');
            $ship->dead_weight = $request->input('deadwt');
            $ship->speed = $request->input('speed');
            $ship->overall_length = $request->input('ship_length');
            $ship->draft = $request->input('draft');
            $ship->breadth = $request->input('breadth');
            $ship->depth = $request->input('depth');
            $ship->annuel_survey_of_machinery = $request->input('annuel_survey_machinery');
            $ship->pollition_certificate = $request->input('pollution_certificate');
            $ship->load_line_certificate = $request->input('loadLine_cert');
            $ship->safety_equipment_certificate = $request->input('safty_ec');
            $ship->safety_construction_certificate = $request->input('safty_cc');
            $ship->classification_certificate = $request->input('classification_certificate');
            $ship->radio_telegraphy_certificate = $request->input('radio_telegraphy_certificate');
            $ship->save();
            return response()->json([
                'status' => 200,
                'message' => 'Successfully Added'
            ]);
        } else {
            return response()->json([
                'status' => 500,
                'message' => 'IMO number already exist. Please enter a unique IMO number'
            ]);
        }
    }
    public function destroy($id) {
        $ship = Ship::findOrFail($id);
        $ship->delete();
        return response()->json(['status' => 'Ship Deleted Successfully!']);
    }
}
