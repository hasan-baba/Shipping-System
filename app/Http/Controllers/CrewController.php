<?php

namespace App\Http\Controllers;

use App\Models\Company;
use App\Models\Crew;
use App\Models\Trip;
use Illuminate\Http\Request;
use function PHPUnit\Framework\isNull;

class CrewController extends Controller
{
    public function crewlist(Request $request) {
        $tripId = $request->trip;
        $crews = Crew::with('trip')->where('trip_id', $tripId)->get();
        $companies = Company::orderBy('name')->get();
        return view('crew.crewlist', [
            'crews' => $crews,
            'tripId' => $tripId,
            'companies' => $companies
        ]);
    }
    public function list() {
        $trips = Trip::with('ship.shiptype', 'cargo', 'port')->get();
        $companies = Company::orderBy('name')->get();
        return view('crew.list', [
            'trips' => $trips,
            'companies' => $companies
        ]);
    }
    public function store(Request $request) {
        $crew = new Crew;
        $crew->trip_id = $request->input('tripNbID');
        $crew->sign = $request->input('sign-option');
        $crew->first_name = $request->input('first_name');
        $crew->last_name = $request->input('last_name');
        $crew->date_of_birth = $request->input('dob');
        $crew->nationality = $request->input('nationality');
        $crew->passport_number = $request->input('passport_nb');
        $crew->seaman_book_number = $request->input('seaman_nb');
        $crew->company_id = $request->input('company-option');
        $crew->is_transfer_completed = ($request->input('transferred')) ? 1 : 0;
        $crew->save();
        return response()->json([
            'status' => 200,
            'message' => 'Added Successfully',
        ]);
    }
    public function edit($id) {
        $crew = Crew::findOrFail($id);
        return response()->json([
            'crew' => $crew
        ]);
    }
    public function update(Request $request, $id) {
        $crew = Crew::findOrFail($id);
        $crew->sign = $request->input('sign-option');
        $crew->first_name = $request->input('first_name');
        $crew->last_name = $request->input('last_name');
        $crew->date_of_birth = $request->input('dob');
        $crew->nationality = $request->input('nationality');
        $crew->passport_number = $request->input('passport_nb');
        $crew->seaman_book_number = $request->input('seaman_nb');
        $crew->company_id = $request->input('company-option');
        $crew->is_transfer_completed = ($request->input('transferred')) ? 1 : 0;
        $crew->update();
        return response()->json([
            'status' => 200,
            'message' => 'Successfully Updated'
        ]);
    }
    public function destroy($id) {
        $crew = Crew::findOrFail($id);
        $crew->delete();
        return response()->json(['status' => 'Crew Deleted Successfully!']);
    }
}
