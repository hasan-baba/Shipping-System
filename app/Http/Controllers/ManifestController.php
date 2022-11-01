<?php

namespace App\Http\Controllers;

use App\Models\Manifest;
use App\Models\Package;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use App\Models\Trip;
use App\Models\Cargo;
use App\Models\BillofLading;
use App\Models\Transit;

class ManifestController extends Controller
{
    public function list() {
        $trips = Trip::with('ship.shiptype', 'cargo', 'port')->get();
        return view('manifest.list', [
            'trips' => $trips
        ]);
    }
    public function triplist(Request $request) {
        $tripId = $request->trip;
        $tripNB = Trip::findOrFail($tripId)->trip_number;
        $mnifest = Manifest::with('trip')->where('trip_number_id', $tripId)->get();
        return view('manifest.mntrip', [
            'tripId' => $tripId,
            'mnifest' => $mnifest,
            'tripNB' => $tripNB
        ]);
    }
    public function mnlist(Request $request) {
        $manifestId = $request->manifest;
        $cargos = Cargo::all();
        $packages = Package::all();
        $billLading = BillofLading::with('cargo', 'package')->where('manifest_id', $manifestId)->get();
        return view('manifest.mnbillLading', [
            'manifestId' => $manifestId,
            'billLading' => $billLading,
            'cargos' => $cargos,
            'packages' => $packages
        ]);
    }
    public function transitlist(Request $request) {
        $manifestId = $request->manifest;
        $transits = Transit::where('manifest_id', $manifestId)->get();
        return view('manifest.mntransit', [
            'manifestId' => $manifestId,
            'transits' => $transits
        ]);
    }
    public function addmn(Request $request) {
        $tripId = $request->trip;
        $tripNb = Trip::findOrFail($tripId);
        $cargos = Cargo::all();
        $packages = Package::all();
        return view('manifest.addmn', [
            'tripId' => $tripId,
            'tripNb' => $tripNb,
            'cargos' => $cargos,
            'packages' => $packages
        ]);
    }
    public function edit($id) {
        $manifest = Manifest::findOrFail($id);
        return response()->json([
            'manifest' => $manifest
        ]);
    }
    public function update(Request $request, $id) {
        $manifest = Manifest::findOrFail($id);
        $manifest->loading_port = $request->input('update-load-port');
        $manifest->sailing_date = $request->input('update-sailing-date');
        $manifest->discharging_port = $request->input('update-discharging-port');
        $manifest->next_discharging_port = $request->input('update-next-discharging-port');
        $manifest->process = $request->input('update-process');
        $manifest->total_qty = $request->input('update-total-qty');
        $manifest->total_weight = $request->input('update-total-weight');
        $manifest->update();
        return response()->json([
            'status' => 200,
            'message' => 'Successfully Updated'
        ]);
    }

    public function store(Request $request) {
        $manifest = new Manifest;
        $manifest->trip_number_id = $request->input('tripId');
        $manifest->loading_port = $request->input('loading_port');
        $manifest->sailing_date = $request->input('sailing_date');
        $manifest->discharging_port = $request->input('discharging_port');
        $manifest->next_discharging_port = $request->input('next_discharging_port');
        $manifest->process = $request->input('process');
        $manifest->save();
        $insertedID = $manifest->id;
        return response()->json([
            'status' => 200,
            'message' => 'Added Successfully',
            'manifestID' => $insertedID
        ]);
    }
    public function destroy($id) {
        $manifest = Manifest::findOrFail($id);
        try {
            $manifest->delete();
            return response()->json([
                'status' => 200,
                'msg' => 'Manifest Deleted Successfully!',
                'icon' => 'success'
            ]);
        } catch(Exception $e) {
            return $e;
        }
    }
    public function print(Request $request) {
        $mnId = $request->mn;
        $manifest = Manifest::findOrFail($mnId);
        return view('manifest.print', [
            'mnid' => $mnId,
            'manifest' => $manifest
        ]);
    }
    public function printBulkCargoMn(Request $request) {
        $mnID = $request->mn;
        $manifest = Manifest::with('trip.ship.shiptype','bills')->findOrFail($mnID);
        return view('report.bulkCargoMn', [
            'manifest' => $manifest
        ]);
    }
    public function printCargoMn(Request $request) {
        $mnID = $request->mn;
        $manifest = Manifest::with('trip.ship.shiptype','bills')->findOrFail($mnID);
        return view('report.cargoMn', [
            'manifest' => $manifest
        ]);
    }
    public function printEmptyMn(Request $request) {
        $mnID = $request->mn;
        $manifest = Manifest::with('trip.ship.shiptype', 'trip.port')->findOrFail($mnID);
        return view('report.emptyMn', [
            'manifest' => $manifest
        ]);
    }
    public function printBlueMn(Request $request) {
        $mnID = $request->mn;
        $manifest = Manifest::with('trip.ship.shiptype', 'trip.port', 'bills.manifest', 'bills.package', 'bills.cargo')->findOrFail($mnID);
        return view('report.blueMn', [
            'manifest' => $manifest
        ]);
    }
}
