<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use App\Models\BillofLading;
use App\Models\DischargingPlan;
use App\Models\Manifest;
use App\Models\Trip;
use App\Models\Ship;
use App\Models\Agency;
use App\Models\Port;
use App\Models\Cargo;
use App\Models\Package;
use App\Models\Crew;
use Illuminate\Http\Request;
use App\Models\Transit;

class TripController extends Controller
{
    public function list() {
//        $trips = Trip::all();
        $trips = Trip::with('ship.shiptype', 'cargo')->orderBy('id', 'DESC')->get();
        $ships = Ship::all();
        $agencies = Agency::all();
        $ports = Port::all();
        $cargos = Cargo::all();
        $packages = Package::all();
        $lastTrip = Trip::all()->last();
        if($lastTrip === null) {
            $tripNumber = ((now()->year)*1000+1);
        } else {
            $tripNumber = ($lastTrip->trip_number) + 1;
        }
        return view('trip.list', [
            'trips' => $trips,
            'ships' => $ships,
            'agencies' => $agencies,
            'ports' => $ports,
            'cargos' => $cargos,
            'packages' => $packages,
            'tripNumber' => $tripNumber
        ]);
    }

    public function store(Request $request) {
        $trip = new Trip;
        $trip->trip_number = $request->input('trip_nb');
        $trip->trip_date = $request->input('trip_date');
        $trip->ship_name_id = $request->input('ship_id');
        $trip->agent_code = $request->input('agent_sign');
        $trip->agency_name = $request->input('agent_name');
        $trip->agency_name_id = $request->input('agency_id');
        $trip->ship_launching_port = $request->input('launch_port');
        $trip->ship_coming_from = $request->input('come_from_port');
        $trip->port_name_id = $request->input('port_id');
        $trip->captain_name = $request->input('captain_name');
        $trip->expected_arrival_date = $request->input('arrival_date');
        $trip->expected_arrival_time = $request->input('arrival_time');
        $trip->company_recieving = $request->input('reciever');
        $trip->package_name_id = $request->input('pack_id');
        $trip->loading_weight = $request->input('loading_weight');
        $trip->loaded_cargo = $request->input('loaded_cargo');
        $trip->cargo_name_id = $request->input('cargo');
        $trip->shipment_quantity = $request->input('shipment_qty');
        $trip->unload_quantity = $request->input('unload_qty');
        $trip->crew_number = $request->input('crew');
        $trip->passengers = $request->input('passengers');
        $trip->passengers_transit = $request->input('passengers_transit');
        $trip->ship_heading_to = $request->input('destination');
        $trip->departure_date = $request->input('depature_date');
        $trip->save();
        return response()->json([
            'status' => 200,
            'message' => 'Successfully Added'
        ]);
    }

    public function update(Request $request, $id) {
        $trip = Trip::findOrFail($id);
        $trip->trip_number = $request->input('update_trip_nb');
        $trip->trip_date = $request->input('trip_date');
        $trip->ship_name_id = $request->input('update_ship_name');
        $trip->agent_code = $request->input('agent_sign');
        $trip->agency_name = $request->input('agent_name');
        $trip->agency_name_id = $request->input('agency_id');
        $trip->ship_launching_port = $request->input('launch_port');
        $trip->ship_coming_from = $request->input('come_from_port');
        $trip->port_name_id = $request->input('port_id');
        $trip->captain_name = $request->input('captain_name');
        $trip->expected_arrival_date = $request->input('arrival_date');
        $trip->expected_arrival_time = $request->input('arrival_time');
        $trip->company_recieving = $request->input('reciever');
        $trip->package_name_id = $request->input('pack_id');
        $trip->cargo_name_id = $request->input('cargo');
        $trip->shipment_quantity = $request->input('shipment_qty');
        $trip->unload_quantity = $request->input('unload_qty');
        $trip->loading_weight = $request->input('loading_weight');
        $trip->loaded_cargo = $request->input('loaded_cargo');
        $trip->crew_number = $request->input('crew');
        $trip->passengers = $request->input('passengers');
        $trip->passengers_transit = $request->input('passengers_transit');
        $trip->ship_heading_to = $request->input('destination');
        $trip->departure_date = $request->input('depature_date');
        $trip->update();
        return response()->json([
            'status' => 200,
            'message' => 'Successfully Updated'
        ]);
    }

    public function edit($id) {
        $trip = Trip::with('ship.shiptype', 'cargo', 'port', 'package', 'agency')->findOrFail($id);
        return response()->json([
            'trip' => $trip
        ]);
    }

    public function destroy($id) {
        $trip = Trip::findOrFail($id);
        $trip->delete();
        return response()->json(['status' => 'Ship Deleted Successfully!']);
    }

    public function print(Request $request) {
        $tripId = $request->trip;
        $trip = Trip::findOrFail($tripId);
        return view('trip.print', [
            'tripId' => $tripId,
            'trip' => $trip
        ]);
    }

    public function printKnowledge(Request $request) {
        $trip = $request->trip;
        $city = $request->city;
        $cancel = $request->cancel;
        $tripId = Trip::with('ship.shiptype', 'cargo', 'port')->findOrFail($trip);
        return view('report.knowledge', [
            'tripId' => $tripId,
            'city' => $city,
            'cancel' => $cancel
        ]);
    }

    public function printCustomStatement(Request $request) {
        $tripId = $request->trip;
        $trip = Trip::with('ship.shiptype', 'cargo', 'port')->findOrFail($tripId);
        return view('report.customStatement', [
            'trip' => $trip
        ]);
    }
    public function printMotor(Request $request) {
        $tripId = $request->trip;
        $motorType = $request->motor;
        $trip = Trip::with('ship.shiptype', 'cargo', 'port')->findOrFail($tripId);
        return view('report.motor', [
            'trip' => $trip,
            'motorType' => $motorType
        ]);
    }
    public function printCustomerSatisfaction(Request $request) {
        $tripId = $request->trip;
        $trip = Trip::with('ship.shiptype', 'cargo', 'port')->findOrFail($tripId);
        return view('report.customerSatisfaction', [
            'trip' => $trip
        ]);
    }
    public function printCustomerSatisfactionWSS(Request $request) {
        $tripId = $request->trip;
        $trip = Trip::with('ship.shiptype', 'cargo', 'port')->findOrFail($tripId);
        return view('report.customerSatisfactionWSS', [
            'trip' => $trip
        ]);
    }
    public function printShipsParticular(Request $request) {
        $tripId = $request->trip;
        $trip = Trip::with('ship.shiptype', 'cargo', 'port', 'package')->findOrFail($tripId);
        return view('report.shipsParticular', [
            'trip' => $trip
        ]);
    }
    public function printJiehGeneralSecurity(Request $request) {
        $tripId = $request->trip;
        $trip = Trip::with('ship.shiptype', 'cargo', 'port', 'package')->findOrFail($tripId);
        return view('report.jiehGeneralSecurity', [
            'trip' => $trip
        ]);
    }
    public function printSaidaGeneralSecurity(Request $request) {
        $tripId = $request->trip;
        $trip = Trip::with('ship.shiptype', 'cargo', 'port', 'package')->findOrFail($tripId);
        return view('report.saidaGeneralSecurity', [
            'trip' => $trip
        ]);
    }
    public function printPermessionLeaveJieh(Request $request) {
        $tripId = $request->trip;
        $trip = Trip::with('ship.shiptype', 'cargo', 'port', 'package')->findOrFail($tripId);
        return view('report.permessionLeaveJieh', [
            'trip' => $trip
        ]);
    }
    public function printPermessionLeaveZahrani(Request $request) {
        $tripId = $request->trip;
        $trip = Trip::with('ship.shiptype', 'cargo', 'port', 'package')->findOrFail($tripId);
        return view('report.permessionLeaveZahrani', [
            'trip' => $trip
        ]);
    }
    public function printPermessionLeaveSaida(Request $request) {
        $tripId = $request->trip;
        $trip = Trip::with('ship.shiptype', 'cargo', 'port', 'package')->findOrFail($tripId);
        return view('report.permessionLeaveSaida', [
            'trip' => $trip
        ]);
    }
    public function printPermessionLeaveSaidaArmy(Request $request) {
        $tripId = $request->trip;
        $trip = Trip::with('ship.shiptype', 'cargo', 'port', 'package')->findOrFail($tripId);
        return view('report.permessionLeaveSaidaArmy', [
            'trip' => $trip
        ]);
    }
    public function printReceivePassport(Request $request) {
        $tripId = $request->trip;
        $trip = Trip::with('ship.shiptype', 'cargo', 'port', 'package')->findOrFail($tripId);
        return view('report.receivePassport', [
            'trip' => $trip
        ]);
    }
    public function printAssignCrewJieh(Request $request) {
        $tripId = $request->trip;
        $trip = Trip::with('ship.shiptype', 'cargo', 'port', 'package', 'crew')->findOrFail($tripId);
        $crew = Crew::with('trip')->where('trip_id', $tripId)->where('sign', 'ON')->where('is_transfer_completed', 0)->get();
        return view('report.assignCrewJieh', [
            'trip' => $trip,
            'crew' => $crew
        ]);
    }
    public function printAssignCrewSaida(Request $request) {
        $tripId = $request->trip;
        $trip = Trip::with('ship.shiptype', 'cargo', 'port', 'package', 'crew')->findOrFail($tripId);
        $crew = Crew::with('trip')->where('trip_id', $tripId)->where('sign', 'ON')->where('is_transfer_completed', 0)->get();
        return view('report.assignCrewSaida', [
            'trip' => $trip,
            'crew' => $crew
        ]);
    }
    public function printAssignPassenger(Request $request) {
        $tripId = $request->trip;
        $trip = Trip::with('ship.shiptype', 'cargo', 'port', 'package', 'crew')->findOrFail($tripId);
        $crew = Crew::with('trip')->where('trip_id', $tripId)->where('sign', 'ON')->where('is_transfer_completed', 0)->get();
        return view('report.assignPassenger', [
            'trip' => $trip,
            'crew' => $crew
        ]);
    }
    public function printVisa(Request $request) {
        $tripId = $request->trip;
        $trip = Trip::with('ship.shiptype', 'cargo', 'port', 'package', 'crew')->findOrFail($tripId);
        $crew = Crew::with('trip')->where('trip_id', $tripId)->where('sign', 'ON')->where('is_transfer_completed', 0)->get();
        return view('report.visa', [
            'trip' => $trip,
            'crew' => $crew
        ]);
    }
    public function printDepartureJieh(Request $request) {
        $tripId = $request->trip;
        $trip = Trip::with('ship.shiptype', 'cargo', 'port', 'package', 'crew')->findOrFail($tripId);
        $crew = Crew::with('trip')->where('trip_id', $tripId)->where('sign', 'OFF')->where('is_transfer_completed', 0)->get();
        return view('report.departureJieh', [
            'trip' => $trip,
            'crew' => $crew
        ]);
    }
    public function printDepartureSaida(Request $request) {
        $tripId = $request->trip;
        $trip = Trip::with('ship.shiptype', 'cargo', 'port', 'package', 'crew')->findOrFail($tripId);
        $crew = Crew::with('trip')->where('trip_id', $tripId)->where('sign', 'OFF')->where('is_transfer_completed', 0)->get();
        return view('report.departureSaida', [
            'trip' => $trip,
            'crew' => $crew
        ]);
    }
    public function printDeparturePassengerSaida(Request $request) {
        $tripId = $request->trip;
        $trip = Trip::with('ship.shiptype', 'cargo', 'port', 'package', 'crew')->findOrFail($tripId);
        $crew = Crew::with('trip')->where('trip_id', $tripId)->where('sign', 'OFF')->where('is_transfer_completed', 0)->get();
        return view('report.departurePassengerSaida', [
            'trip' => $trip,
            'crew' => $crew
        ]);
    }
    public function printBoardPermitSaidaZahrani(Request $request) {
        $tripId = $request->trip;
        $trip = Trip::with('ship.shiptype', 'cargo', 'port', 'package', 'crew')->findOrFail($tripId);
        $crew = Crew::with('trip')->where('trip_id', $tripId)->where('sign', 'Visit')->where('is_transfer_completed', 0)->get();
        return view('report.boardPermitSaidaZahrani', [
            'trip' => $trip,
            'crew' => $crew
        ]);
    }
    public function printBoardPermitJieh(Request $request) {
        $tripId = $request->trip;
        $trip = Trip::with('ship.shiptype', 'cargo', 'port', 'package', 'crew')->findOrFail($tripId);
        $crew = Crew::with('trip')->where('trip_id', $tripId)->where('sign', 'Visit')->where('is_transfer_completed', 0)->get();
        return view('report.boardPermitJieh', [
            'trip' => $trip,
            'crew' => $crew
        ]);
    }
    public function printClearancePermission(Request $request) {
        $tripId = $request->trip;
        $trip = Trip::with('ship.shiptype', 'cargo', 'port', 'package', 'crew')->findOrFail($tripId);
        return view('report.clearancePermission', [
            'trip' => $trip
        ]);
    }
    public function printRequestStatement(Request $request) {
        $tripId = $request->trip;
        $trip = Trip::with('ship.shiptype', 'cargo', 'port', 'package', 'crew')->findOrFail($tripId);
        return view('report.requestStatement', [
            'trip' => $trip
        ]);
    }
    public function printStatement(Request $request) {
        $tripId = $request->trip;
        $trip = Trip::with('ship.shiptype', 'cargo', 'port', 'package', 'crew')->findOrFail($tripId);
        return view('report.statement', [
            'trip' => $trip
        ]);
    }
    public function printObligationSaida(Request $request) {
        $tripId = $request->trip;
        $trip = Trip::with('ship.shiptype', 'cargo', 'port', 'package', 'crew')->findOrFail($tripId);
        return view('report.obligationSaida', [
            'trip' => $trip
        ]);
    }
    public function printObligationJieh(Request $request) {
        $tripId = $request->trip;
        $trip = Trip::with('ship.shiptype', 'cargo', 'port', 'package', 'crew')->findOrFail($tripId);
        return view('report.obligationJieh', [
            'trip' => $trip
        ]);
    }
    public function printObligationZahrani(Request $request) {
        $tripId = $request->trip;
        $trip = Trip::with('ship.shiptype', 'cargo', 'port', 'package', 'crew')->findOrFail($tripId);
        return view('report.obligationZahrani', [
            'trip' => $trip
        ]);
    }
    public function printCargpRecap(Request $request) {
        $tripId = $request->trip;
        $trip = Trip::with('ship.shiptype', 'cargo', 'port', 'package', 'crew')->findOrFail($tripId);
        $manifests = Manifest::where('trip_number_id', $tripId)->get();
        $items = array();
        foreach($manifests as $mn) {
            $items[] = BillofLading::with('cargo')->where('manifest_id', $mn->id)->get();
        }
        return view('report.cargoRecap', [
            'trip' => $trip,
            'countmn' => count($manifests),
            'manifests' => $manifests,
            'items' => $items
        ]);
    }
    public function printCargpRecapMultiple(Request $request) {
        $tripId = $request->trip;
        $trip = Trip::with('ship.shiptype', 'cargo', 'port', 'package', 'crew')->findOrFail($tripId);
        $manifests = Manifest::where('trip_number_id', $tripId)->get();
        $items = array();
        foreach($manifests as $mn) {
            $transit = Transit::where('manifest_id', $mn->id)->get();
            if($transit->isEmpty()) {
               //do nothing
            } else {
                $items[$mn->id] = $transit;
            }
        }
        $bills = BillofLading::whereRelation('manifest.trip', 'id', '=', $tripId)
            ->groupBy('cargo_id')
            ->get();

        $total_weight = BillofLading::whereRelation('manifest.trip', 'id', '=', $tripId)
            ->sum('weight');
        $arr_total_weight = array();
        foreach ($bills as $bill) {
            $total = BillofLading::whereRelation('manifest.trip', 'id', '=', $tripId)
                ->where('cargo_id', '=', $bill->cargo_id)
                ->with('cargo')
                ->sum('weight');
            $arr_total_weight[$bill->cargo->cargo_name] = $total;
        }
        $lastManifest = Manifest::with('trip')->where('trip_number_id', $tripId)->latest()->first();
        return view('report.cargoRecapMultiple', [
            'trip' => $trip,
            'countmn' => count($manifests),
            'manifests' => $manifests,
            'lastManifest' => $lastManifest,
            'items' => $items,
            'arr_total_weight' => $arr_total_weight,
            'total_weight' => $total_weight
        ]);
    }
    public function printCargpRecapLebPort(Request $request) {
        $tripId = $request->trip;
        $trip = Trip::with('ship.shiptype', 'cargo', 'port', 'package', 'crew')->findOrFail($tripId);
        $manifests = Manifest::with('bills.cargo')->where('trip_number_id', $tripId)->get();
        $items = array();
        foreach($manifests as $mn) {
            $items[] = BillofLading::with('cargo')->where('manifest_id', $mn->id)->get();
        }
        return view('report.cargoRecapLebPort', [
            'trip' => $trip,
            'countmn' => count($manifests),
            'manifests' => $manifests,
            'items' => $items
        ]);
    }
    public function printCargpRecapNextPort(Request $request) {
        $tripId = $request->trip;
        $trip = Trip::with('ship.shiptype', 'cargo', 'port', 'package', 'crew')->findOrFail($tripId);
        $manifests = Manifest::with('bills.cargo')->where('trip_number_id', $tripId)->get();
        $items = array();
        foreach($manifests as $mn) {
            $items[] = BillofLading::with('cargo')->where('manifest_id', $mn->id)->get();
        }
        return view('report.cargoRecapNextPort', [
            'trip' => $trip,
            'countmn' => count($manifests),
            'manifests' => $manifests,
            'items' => $items
        ]);
    }
    public function printCargpRecapTransit(Request $request) {
        $tripId = $request->trip;
        $trip = Trip::with('ship.shiptype', 'cargo', 'port', 'package', 'crew')->findOrFail($tripId);
        $manifests = Manifest::with('bills.cargo')->where('trip_number_id', $tripId)->get();
        $items = array();
        foreach($manifests as $mn) {
            $items[] = BillofLading::with('cargo')->where('manifest_id', $mn->id)->get();
        }
        return view('report.cargoRecapTransit', [
            'trip' => $trip,
            'countmn' => count($manifests),
            'manifests' => $manifests,
            'items' => $items
        ]);
    }
    public function printCargpRecapTableForm(Request $request) {
        $tripId = $request->trip;
        $trip = Trip::with('ship.shiptype', 'cargo', 'port', 'package', 'crew')->findOrFail($tripId);
        $manifests = Manifest::where('trip_number_id', $tripId)->get();
        $items = array();
        foreach($manifests as $mn) {
            $transit = Transit::where('manifest_id', $mn->id)->get();
            if($transit->isEmpty()) {
                //do nothing
            } else {
                $items[$mn->id] = $transit;
            }
        }
        $bills = BillofLading::whereRelation('manifest.trip', 'id', '=', $tripId)
            ->groupBy('cargo_id')
            ->get();

        $total_weight = BillofLading::whereRelation('manifest.trip', 'id', '=', $tripId)
            ->sum('weight');
        $arr_total_weight = array();
        $lastManifest = '';
        foreach ($bills as $bill) {
            $total_weight = BillofLading::whereRelation('manifest.trip', 'id', '=', $tripId)
                ->where('cargo_id', '=', $bill->cargo_id)
                ->with('cargo')
                ->sum('weight');
            $total_quantity = BillofLading::whereRelation('manifest.trip', 'id', '=', $tripId)
                ->where('cargo_id', '=', $bill->cargo_id)
                ->with('cargo')
                ->sum('quantity');
            $package = BillofLading::whereRelation('manifest.trip', 'id', '=', $tripId)
                ->where('cargo_id', '=', $bill->cargo_id)
                ->with('package')
                ->first();
            $lastManifest = Manifest::with('trip')->where('trip_number_id', $tripId)->latest()->first();
            $arr_total_weight[$bill->cargo->cargo_name] = array(
                'weight' => $total_weight,
                'quantity' => $total_quantity,
                'package' => $package,
                'loadingPort' => $lastManifest);
        }
        return view('report.cargoRecapTableForm', [
            'trip' => $trip,
            'countmn' => count($manifests),
            'manifests' => $manifests,
            'lastManifest' => $lastManifest,
            'items' => $items,
            'arr_total_weight' => $arr_total_weight,
            'total_weight' => $total_weight
        ]);
    }
    public function printDeliveryBon(Request $request) {
        $tripId = $request->trip;
        $trip = Trip::with('ship.shiptype', 'cargo', 'port', 'package', 'crew')->findOrFail($tripId);
        return view('report.deliveryBon', [
            'trip' => $trip
        ]);
    }
    public function printShippingOrder(Request $request) {
        $tripId = $request->trip;
        $trip = Trip::with('ship.shiptype', 'cargo', 'port', 'package', 'crew')->findOrFail($tripId);
        return view('report.shippingOrder', [
            'trip' => $trip
        ]);
    }
    public function printRedMn(Request $request) {
        $tripId = $request->trip;
        $discharging_plan = DischargingPlan::with('cargo')->where('trip_id', $tripId)->get();
        $bill_max = BillofLading::select('billnb','shipper', 'consignee', 'package_id', 'cargo_id', DB::raw('MAX(weight) as max_weight'))
            ->whereRelation('manifest.trip', 'id', '=', $tripId)
            ->with('package', 'cargo')
            ->groupBy('cargo_id')
            ->get();
        $arr_total_weight = array();
        foreach ($discharging_plan as $plan) {
            $total = BillofLading::whereRelation('manifest.trip', 'id', '=', $tripId)
                ->where('cargo_id', '=', $plan->cargo_id)
                ->with('cargo')
                ->sum('weight');
            $arr_total_weight[$plan->cargo_id] = $total;
        }
        $trip = Trip::with('ship', 'agency', 'port')->findOrFail($tripId);
        $lastManifest = Manifest::with('trip')->where('trip_number_id', $tripId)->latest()->first();
        return view('report.redMn', [
            'tripId' => $tripId,
            'trip' => $trip,
            'discharging_plan' => $discharging_plan,
            'bill_max' => $bill_max,
            'arr_total_weight' => $arr_total_weight,
            'lastManifest' => $lastManifest
        ]);
    }
    public function printRedMnNoQty(Request $request) {
        $tripId = $request->trip;
        $discharging_plan = DischargingPlan::with('cargo')->where('trip_id', $tripId)->get();
        $bill_max = BillofLading::select('billnb', 'shipper', 'consignee', 'package_id', 'cargo_id', DB::raw('MAX(weight) as max_weight'))
            ->whereRelation('manifest.trip', 'id', '=', $tripId)
            ->with('package', 'cargo')
            ->groupBy('cargo_id')
            ->get();
        $arr_total_weight = array();
        foreach ($discharging_plan as $plan) {
            $total = BillofLading::whereRelation('manifest.trip', 'id', '=', $tripId)
                ->where('cargo_id', '=', $plan->cargo_id)
                ->with('cargo')
                ->sum('weight');
            $arr_total_weight[$plan->cargo_id] = $total;
        }
        $trip = Trip::with('ship', 'agency', 'port')->findOrFail($tripId);
        $lastManifest = Manifest::with('trip')->where('trip_number_id', $tripId)->latest()->first();
        return view('report.redMnWithoutQty', [
            'tripId' => $tripId,
            'trip' => $trip,
            'discharging_plan' => $discharging_plan,
            'bill_max' => $bill_max,
            'arr_total_weight' => $arr_total_weight,
            'lastManifest' => $lastManifest
        ]);
    }
    public function printEmptyRedMn(Request $request) {
        $tripId = $request->trip;
        $trip = Trip::with('ship', 'agency', 'port')->findOrFail($tripId);
        return view('report.emptyRedMn', [
            'tripId' => $tripId,
            'trip' => $trip
        ]);
    }
}
