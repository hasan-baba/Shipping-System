@extends('layouts.master')
@section('title')
    | Trip
@endsection
@section('content')
    <p class="h4">Trips</p>
    <ul class="nav nav-tabs pt-4" id="myTab" role="tablist">
        <li class="nav-item">
            <a class="nav-link active" id="view-tab" data-toggle="tab" href="#view" role="tab" aria-controls="view" aria-selected="true">View Trip</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" id="add-tab" data-toggle="tab" href="#add" role="tab" aria-controls="add" aria-selected="false">Add Trip Info</a>
        </li>
    </ul>
    <div class="tab-content" id="myTabContent">
        <div class="tab-pane fade pt-5 show active" id="view" role="tabpanel" aria-labelledby="view-tab">
            <table id="tripdatatable" class="display nowrap text-center" style="width:100%">
                <thead>
                <tr>
                    <th>Print</th>
                    <th>Discharging Plan</th>
                    <th>Action</th>
                    <th>Trip ID</th>
                    <th>Trip Date</th>
                    <th>Ship Name</th>
                    <th>Ship Type</th>
                    <th>Arriving Date</th>
                    <th>Arriving Port</th>
                    <th>Coming From</th>
                    <th>Cargo</th>
                    <th>Total Weight</th>
                    <th>Reciever</th>
                </tr>
                </thead>
                <tbody>
                @foreach( $trips as $trip )
                    <tr>
                        <input type="hidden" class="id_val" id="idTrip" value="{{$trip->id}}">
                        <td>
                            <a href="{{url('/admin/print?trip='.$trip->id)}}" class="btn btn-primary m-0" id="print">
                                Print
                            </a>
                        </td>
                        <td>
                            <a href="#" class="btn btn-primary m-0" data-toggle="modal" data-target="#dischargingPlanModal" id="dischargePlan">
                                Discharging Plan
                            </a>
                        </td>
                        <td>
                            <a href="#" class="btn text-success pl-1 pr-1 m-0" data-toggle="modal" data-target="#view-trip" id="viewTrip">
                                <i class="fas fa-info-circle fa-lg"></i>
                            </a>
                            <a href="#" class="btn text-primary pl-1 pr-1 m-0" data-toggle="modal" data-target="#update-trip" id="editTrip">
                                <i class="fas fa-edit fa-lg"></i>
                            </a>
                            <form action="{{url('/admin/trip/'.$trip->id)}}" method="POST" class="d-inline">
                                @csrf
                                @method('DELETE')
                                <button class="btn text-danger pl-1 pr-1 m-0" id="deleteTrip">
                                    <i class="fas fa-trash fa-lg"></i>
                                </button>
                            </form>
                        </td>
                        <td>{{$trip->trip_number}}</td>
                        <td>{{$trip->trip_date}}</td>
                        <td>{{$trip->ship->ship_name}}</td>
                        <td>{{$trip->ship->shiptype->ship_type_name}}</td>
                        <td>{{$trip->expected_arrival_date}}</td>
                        <td>{{$trip->ship_launching_port}}</td>
                        <td>{{$trip->ship_coming_from}}</td>
                        <td>{{$trip->cargo->cargo_name}}</td>
                        <td>{{$trip->shipment_quantity}}</td>
                        <td>{{$trip->company_recieving}}</td>
                    </tr>
                @endforeach
                </tbody>
                <tfoot>
                <tr>
                    <th>Print</th>
                    <th>Discharging Plan</th>
                    <th>Action</th>
                    <th>Trip ID</th>
                    <th>Trip Date</th>
                    <th>Ship Name</th>
                    <th>Ship Type</th>
                    <th>Arriving Date</th>
                    <th>Arriving Port</th>
                    <th>Coming From</th>
                    <th>Cargo</th>
                    <th>Total Weight</th>
                    <th>Reciever</th>
                </tr>
                </tfoot>
            </table>
        </div>
        <div class="tab-pane fade" id="add" role="tabpanel" aria-labelledby="add-tab">
            <div class="container pt-5" id="addtrip-box">
                <form id="iserttrip-form" action="" method="POST" class="needs-validation" novalidate>
                    <div class="row pb-2">
                        <div class="col-lg-4">
                            <div class="form-group">
                                <label for="">Trip Number</label>
                                <input type="text" class="form-control" id="trip-id" name="trip_nb" aria-describedby="emailHelp" readonly="readonly" value="{{$tripNumber}}">
                                <div class="invalid-feedback">
                                    Required
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="form-group">
                                <label for="">Trip Date</label>
                                <input type="date" class="form-control" id="trip-date" name="trip_date" value="<?php echo date('Y-m-d'); ?>" aria-describedby="emailHelp">
                                <div class="invalid-feedback">
                                    Required
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="form-group">
                                <label for="">Ship Name <span class="text-danger">*</span></label>
                                <select class="custom-select" name="ship_id" id="ship-name" required>
                                    <option value=""></option>
                                    @foreach($ships as $ship)
                                        <option value="{{$ship->id}}">{{$ship->ship_name}}</option>
                                    @endforeach
                                </select>
                                <div class="invalid-feedback">
                                    Required
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row pb-2">
                        <div class="col-lg-4">
                            <div class="form-group">
                                <label for="">Agent Code</label>
                                <input type="text" class="form-control" name="agent_sign" aria-describedby="emailHelp" value="S17" readonly="readonly">
                                <div class="invalid-feedback">
                                    Required
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="form-group">
                                <label for="">Agency</label>
                                <input type="text" class="form-control" name="agent_name" aria-describedby="emailHelp" value="Tiriaky Shipping S.A.R.L.">
                                <div class="invalid-feedback">
                                    Required
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="form-group">
                                <label for="">Agent</label>
                                <button class="btn-primary border-0 rounded-circle" type="button" data-toggle="modal" data-target="#agencyinTripModal"><i class="fas fa-plus"></i></button>
                                <select class="custom-select" name="agency_id" id="agencies">
                                    <option value=""></option>
                                    @foreach($agencies as $agency)
                                        <option value="{{$agency->id}}">{{$agency->agency_name}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="row pb-2">
                        <div class="col-lg-4">
                            <div class="form-group">
                                <label for="">Ship Launching Port <span class="text-danger">*</span></label>
                                <input type="text" class="form-control" name="launch_port" aria-describedby="emailHelp" value="" required>
                                <div class="invalid-feedback">
                                    Required
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="form-group">
                                <label for="">Ship Comming From</label>
                                <input type="text" class="form-control" name="come_from_port" aria-describedby="emailHelp" value="">
                                <div class="invalid-feedback">
                                    Required
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="form-group">
                                <label for="">Lebanese Port <span class="text-danger">*</span></label>
                                <button class="btn-primary border-0 rounded-circle" type="button" data-toggle="modal" data-target="#portinTripModal"><i class="fas fa-plus"></i></button>
                                <select class="custom-select" name="port_id" id="ports" required>
                                    <option value=""></option>
                                    @foreach($ports as $port)
                                        <option value="{{$port->id}}">{{$port->port_name}}</option>
                                    @endforeach
                                </select>
                                <div class="invalid-feedback">
                                    Required
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row pb-2">
                        <div class="col-lg-4">
                            <div class="form-group">
                                <label for="">Captain Name <span class="text-danger">*</span></label>
                                <input type="text" class="form-control" name="captain_name" aria-describedby="emailHelp" value="" required>
                                <div class="invalid-feedback">
                                    Required
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="form-group">
                                <label for="">Arrival Date</label>
                                <input type="date" class="form-control" name="arrival_date" aria-describedby="emailHelp" value="">
                                <div class="invalid-feedback">
                                    Required
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="form-group">
                                <label for="">Arrival Time <span class="text-danger">*</span></label>
                                <select class="custom-select" name="arrival_time" id="" required>
                                    <option value=""></option>
                                    <option value="Morning">Morning (صباحاً)</option>
                                    <option value="Midday">Midday (ظهراً)</option>
                                    <option value="Evening">Evening (مساءً)</option>
                                </select>
                                <div class="invalid-feedback">
                                    Required
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row pb-2">
                        <div class="col-lg-4">
                            <div class="form-group">
                                <label for="">Receivers <span class="text-danger">*</span></label>
                                <input type="text" class="form-control" id="company-recieving" name="reciever" aria-describedby="emailHelp" required>
                                <div class="invalid-feedback">
                                    Required
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="form-group">
                                <label for="">Package <span class="text-danger">*</span></label>
                                <button class="btn-primary border-0 rounded-circle" type="button" data-toggle="modal" data-target="#packageinTripModal"><i class="fas fa-plus"></i></button>
                                <select class="custom-select" name="pack_id" id="packs" required>
                                    <option value=""></option>
                                    @foreach($packages as $package)
                                        <option value="{{$package->id}}">{{$package->package_name}}</option>
                                    @endforeach
                                </select>
                                <div class="invalid-feedback">
                                    Required
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="form-group">
                                <label for="">Cargo <span class="text-danger">*</span></label>
                                <button class="btn-primary border-0 rounded-circle" type="button" data-toggle="modal" data-target="#cargoinTripModal"><i class="fas fa-plus"></i></button>
                                <select class="custom-select" name="cargo" id="cargo" required>
                                    <option value=""></option>
                                    @foreach($cargos as $cargo)
                                        <option value="{{$cargo->id}}">{{$cargo->cargo_name}}</option>
                                    @endforeach
                                </select>
                                <div class="invalid-feedback">
                                    Required
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row pb-2">
                        <div class="col-lg-3">
                            <div class="form-group">
                                <label for="">Cargo Weight <span class="text-danger">*</span></label>
                                <input type="number" class="form-control" name="shipment_qty" aria-describedby="emailHelp" step="any" value="" required>
                                <div class="invalid-feedback">
                                    Required
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3">
                            <div class="form-group">
                                <label for="">Loading Weight <span class="text-danger">*</span></label>
                                <input type="text" class="form-control" name="loading_weight" value="" required>
                                <div class="invalid-feedback">
                                    Required
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3">
                            <div class="form-group">
                                <label for="">Discharging Weight</label>
                                <input type="number" class="form-control" name="unload_qty" value="">
                            </div>
                        </div>
                        <div class="col-lg-3">
                            <div class="form-group">
                                <label for="">Loaded Cargo <span class="text-danger">*</span></label>
                                <input type="text" class="form-control" name="loaded_cargo" value="" required>
                                <div class="invalid-feedback">
                                    Required
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row pb-2">
                        <div class="col-lg-4">
                            <div class="form-group">
                                <label for="">Crew Number <span class="text-danger">*</span></label>
                                <input type="number" class="form-control" name="crew" aria-describedby="emailHelp" value="" required>
                                <div class="invalid-feedback">
                                    Required
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="form-group">
                                <label for="">Passengers</label>
                                <input type="number" class="form-control" name="passengers" aria-describedby="emailHelp" value="">
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="form-group">
                                <label for="">Passengers Transit</label>
                                <input type="number" class="form-control" name="passengers_transit" aria-describedby="emailHelp" value="">
                            </div>
                        </div>
                    </div>
                    <div class="row pb-2">
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label for="">Next Destination <span class="text-danger">*</span></label>
                                <input type="text" class="form-control" name="destination" aria-describedby="emailHelp" value="" required>
                                <div class="invalid-feedback">
                                    Required
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label for="">Departure Date <span class="text-danger">*</span></label>
                                <input type="date" class="form-control" name="depature_date" aria-describedby="emailHelp" value="" required>
                                <div class="invalid-feedback">
                                    Required
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row py-2">
                        <div class="col-lg-12">
                            <button type="submit" name="addtrip_btn" id="addtrip-btn" class="btn btn-primary">Add Trip</button>
                            <button type="reset" class="btn btn-primary">Clear Information</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- info modal -->
    <div class="modal fade" id="view-trip" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">Trip Information</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body" id="info-content">
                    <div class='row'>
                        <div class='col-6'>
                            <div class='row'>
                                <div class='col-6'>
                                    <p class="font-weight-bold">Trip ID</p>
                                </div>
                                <div class='col-6'>
                                    <p class='text-center' id="trip_id"></p>
                                </div>
                            </div>
                            <div class='row'>
                                <div class='col-6'>
                                    <p class="font-weight-bold">Trip Date</p>
                                </div>
                                <div class='col-6'>
                                    <p class='text-center' id='trip_date'> </p>
                                </div>
                            </div>
                            <div class='row'>
                                <div class='col-6'>
                                    <p class="font-weight-bold">Ship Name</p>
                                </div>
                                <div class='col-6'>
                                    <p class='text-center' id="ship_name"> </p>
                                </div>
                            </div>
                            <div class='row'>
                                <div class='col-6'>
                                    <p class="font-weight-bold">Agent Sign</p>
                                </div>
                                <div class="col-6">
                                    <p class='text-center' id="agent_sign"> </p>
                                </div>
                            </div>
                            <div class='row'>
                                <div class='col-6'>
                                    <p class="font-weight-bold">Agent</p>
                                </div>
                                <div class='col-6'>
                                    <p class='text-center' id="agent"></p>
                                </div>
                            </div>
                            <div class='row'>
                                <div class='col-6'>
                                    <p class="font-weight-bold">Captain Name</p>
                                </div>
                                <div class='col-6'>
                                    <p class='text-center' id="captain_name"></p>
                                </div>
                            </div>
                            <div class='row'>
                                <div class='col-6'>
                                    <p class="font-weight-bold">last_port</p>
                                </div>
                                <div class='col-6'>
                                    <p class='text-center' id="last_port"> </p>
                                </div>
                            </div>
                            <div class='row'>
                                <div class='col-6'>
                                    <p class="font-weight-bold">from_port</p>
                                </div>
                                <div class='col-6'>
                                    <p class='text-center' id="from_port"></p>
                                </div>
                            </div>
                            <div class='row'>
                                <div class='col-6'>
                                    <p class="font-weight-bold">Port Name</p>
                                </div>
                                <div class='col-6'>
                                    <p class='text-center' id="port_name"></p>
                                </div>
                            </div>
                            <div class='row'>
                                <div class='col-6'>
                                    <p class="font-weight-bold">Arrival Date</p>
                                </div>
                                <div class='col-6'>
                                    <p class='text-center' id="arrival_date"></p>
                                </div>
                            </div>
                            <div class='row'>
                                <div class='col-6'>
                                    <p class="font-weight-bold">Depature Date</p>
                                </div>
                                <div class='col-6'>
                                    <p class='text-center' id="depature_date"></p>
                                </div>
                            </div>
                            <div class='row'>
                                <div class='col-6'>
                                    <p class="font-weight-bold">Arrival Time</p>
                                </div>
                                <div class='col-6'>
                                    <p class='text-center' id="arrival_time"></p>
                                </div>
                            </div>
                        </div>
                        <div class='col-6'>
                            <div class='row'>
                                <div class='col-6'>
                                    <p class="font-weight-bold">Passengers</p>
                                </div>
                                <div class="col-6">
                                    <p class='text-center' id="passengers"></p>
                                </div>
                            </div>
                            <div class='row'>
                                <div class='col-6'>
                                    <p class="font-weight-bold">Passengers In Transit</p>
                                </div>
                                <div class='col-6'>
                                    <p class='text-center' id="passengersin_transit"></p>
                                </div>
                            </div>
                            <div class='row'>
                                <div class='col-6'>
                                    <p class="font-weight-bold">Crew</p>
                                </div>
                                <div class='col-6'>
                                    <p class='text-center' id="crew"></p>
                                </div>
                            </div>
                            <div class='row'>
                                <div class='col-6'>
                                    <p class="font-weight-bold">Destination</p>
                                </div>
                                <div class="col-6">
                                    <p class='text-center' id="destination"></p>
                                </div>
                            </div>
                            <div class='row'>
                                <div class='col-6'>
                                    <p class="font-weight-bold">Cargo</p>
                                </div>
                                <div class='col-6'>
                                    <p class='text-center' id="cargo_name"> </p>
                                </div>
                            </div>
                            <div class='row'>
                                <div class='col-6'>
                                    <p class="font-weight-bold">Pack</p>
                                </div>
                                <div class='col-6'>
                                    <p class='text-center' id="pack"></p>
                                </div>
                            </div>
                            <div class='row'>
                                <div class='col-6'>
                                    <p class="font-weight-bold">Cargo Weight</p>
                                </div>
                                <div class='col-6'>
                                    <p class='text-center' id="total_weight"></p>
                                </div>
                            </div>
                            <div class='row'>
                                <div class='col-6'>
                                    <p class="font-weight-bold">Discharge Weight</p>
                                </div>
                                <div class='col-6'>
                                    <p class='text-center' id="discharge_weight"></p>
                                </div>
                            </div>
                            <div class='row'>
                                <div class='col-6'>
                                    <p class="font-weight-bold">Loading Weight</p>
                                </div>
                                <div class='col-6'>
                                    <p class='text-center' id="loading_weight"> </p>
                                </div>
                            </div>
                            <div class='row'>
                                <div class='col-6'>
                                    <p class="font-weight-bold">Loaded Cargo</p>
                                </div>
                                <div class='col-6'>
                                    <p class='text-center' id="loaded_cargo"> </p>
                                </div>
                            </div>
                            <div class='row'>
                                <div class='col-6'>
                                    <p class="font-weight-bold">Agency</p>
                                </div>
                                <div class='col-6'>
                                    <p class='text-center' id="agency"> </p>
                                </div>
                            </div>
                            <div class='row'>
                                <div class='col-6'>
                                    <p class="font-weight-bold">Reciever</p>
                                </div>
                                <div class='col-6'>
                                    <p class='text-center' id="reciever"></p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- update trip modal -->
    <div class="modal fade" id="update-trip" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-xl" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">Trip Information</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form id="update-trip-form" action="" method="POST" class="needs-validation" novalidate>
                        <div class="row pb-2">
                            <div class="col-lg-4">
                                <div class="form-group">
                                    <input type="hidden" id="updatedTripID">
                                    <label for="">Trip Number</label>
                                    <input type="text" class="form-control" id="update_trip_id" name="update_trip_nb" aria-describedby="emailHelp" readonly="readonly">
                                    <div class="invalid-feedback">
                                        Required
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="form-group">
                                    <label for="">Trip Date</label>
                                    <input type="date" class="form-control" id="update_trip_date" name="trip_date" aria-describedby="emailHelp">
                                    <div class="invalid-feedback">
                                        Required
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="form-group">
                                    <label for="">Ship Name <span class="text-danger">*</span></label>
                                    <select class="custom-select" name="update_ship_name" id="update_ship_name" required>
                                        <option value=""></option>
                                        @foreach($ships as $ship)
                                            <option value="{{$ship->id}}">{{$ship->ship_name}}</option>
                                        @endforeach
                                    </select>
                                    <div class="invalid-feedback">
                                        Required
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row pb-2">
                            <div class="col-lg-4">
                                <div class="form-group">
                                    <label for="">Agent Code</label>
                                    <input type="text" class="form-control" name="agent_sign" id="update_agent_sign" aria-describedby="emailHelp" readonly="readonly">
                                    <div class="invalid-feedback">
                                        Required
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="form-group">
                                    <label for="">Agency</label>
                                    <input type="text" class="form-control" name="agent_name" id="update_agent" aria-describedby="emailHelp">
                                    <div class="invalid-feedback">
                                        Required
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="form-group">
                                    <label for="">Agent</label>
                                    <select class="custom-select" name="agency_id" id="update_agency">
                                        <option value=""></option>
                                        @foreach($agencies as $agency)
                                            <option value="{{$agency->id}}">{{$agency->agency_name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="row pb-2">
                            <div class="col-lg-4">
                                <div class="form-group">
                                    <label for="">Ship Launching Port <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control" name="launch_port" id="update_last_port" aria-describedby="emailHelp" required>
                                    <div class="invalid-feedback">
                                        Required
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="form-group">
                                    <label for="">Ship Comming From</label>
                                    <input type="text" class="form-control" name="come_from_port" id="update_from_port" aria-describedby="emailHelp">
                                    <div class="invalid-feedback">
                                        Required
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="form-group">
                                    <label for="">Lebanese Port <span class="text-danger">*</span></label>
                                    <select class="custom-select" name="port_id" id="update_port_name" required>
                                        <option value=""></option>
                                        @foreach($ports as $port)
                                            <option value="{{$port->id}}">{{$port->port_name}}</option>
                                        @endforeach
                                    </select>
                                    <div class="invalid-feedback">
                                        Required
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row pb-2">
                            <div class="col-lg-4">
                                <div class="form-group">
                                    <label for="">Captain Name <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control" name="captain_name" id="update_captain_name" aria-describedby="emailHelp" required>
                                    <div class="invalid-feedback">
                                        Required
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="form-group">
                                    <label for="">Arrival Date</label>
                                    <input type="date" class="form-control" name="arrival_date" aria-describedby="emailHelp" id="update_arrival_date">
                                    <div class="invalid-feedback">
                                        Required
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="form-group">
                                    <label for="">Arrival Time <span class="text-danger">*</span></label>
                                    <select class="custom-select" name="arrival_time" id="update_arrival_time" required>
                                        <option value=""></option>
                                        <option value="morning">Morning (صباحا)</option>
                                        <option value="midday">Midday (ظهرا)</option>
                                        <option value="evening">Evening (المساء)</option>

                                    </select>
                                    <div class="invalid-feedback">
                                        Required
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row pb-2">
                            <div class="col-lg-4">
                                <div class="form-group">
                                    <label for="">Receivers <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control" id="update_reciever" name="reciever" aria-describedby="emailHelp" required>
                                    <div class="invalid-feedback">
                                        Required
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="form-group">
                                    <label for="">Package <span class="text-danger">*</span></label>
                                    <select class="custom-select" name="pack_id" id="update_pack" required>
                                        <option value=""></option>
                                        @foreach($packages as $package)
                                            <option value="{{$package->id}}">{{$package->package_name}}</option>
                                        @endforeach
                                    </select>
                                    <div class="invalid-feedback">
                                        Required
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="form-group">
                                    <label for="">Cargo <span class="text-danger">*</span></label>
                                    <select class="custom-select" name="cargo" id="update_cargo_name" required>
                                        <option value=""></option>
                                        @foreach($cargos as $cargo)
                                            <option value="{{$cargo->id}}">{{$cargo->cargo_name}}</option>
                                        @endforeach
                                    </select>
                                    <div class="invalid-feedback">
                                        Required
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row pb-2">
                            <div class="col-lg-3">
                                <div class="form-group">
                                    <label for="">Cargo Weight <span class="text-danger">*</span></label>
                                    <input type="number" class="form-control" name="shipment_qty" aria-describedby="emailHelp" id="update_total_weight" required>
                                    <div class="invalid-feedback">
                                        Required
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-3">
                                <div class="form-group">
                                    <label for="">Loading Weight <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control" name="loading_weight" value="" id="update_loading_weight" required>
                                    <div class="invalid-feedback">
                                        Required
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-3">
                                <div class="form-group">
                                    <label for="">Discharging Weight</label>
                                    <input type="number" class="form-control" name="unload_qty" aria-describedby="emailHelp" id="update_discharge_weight">
                                </div>
                            </div>
                            <div class="col-lg-3">
                                <div class="form-group">
                                    <label for="">Loaded Cargo <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control" name="loaded_cargo" value="" id="update_loaded_cargo" required>
                                    <div class="invalid-feedback">
                                        Required
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row pb-2">
                            <div class="col-lg-4">
                                <div class="form-group">
                                    <label for="">Crew Number <span class="text-danger">*</span></label>
                                    <input type="number" class="form-control" name="crew" aria-describedby="emailHelp" id="update_crew" required>
                                    <div class="invalid-feedback">
                                        Required
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="form-group">
                                    <label for="">Passengers</label>
                                    <input type="number" class="form-control" name="passengers" aria-describedby="emailHelp" id="update_passengers">
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="form-group">
                                    <label for="">Passengers Transit</label>
                                    <input type="number" class="form-control" name="passengers_transit" aria-describedby="emailHelp" id="update_passengersin_transit">
                                </div>
                            </div>
                        </div>
                        <div class="row pb-2">
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label for="">Next Destination <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control" name="destination" aria-describedby="emailHelp" id="update_destination" required>
                                    <div class="invalid-feedback">
                                        Required
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label for="">Departure Date <span class="text-danger">*</span></label>
                                    <input type="date" class="form-control" name="depature_date" aria-describedby="emailHelp" id="update_depature_date" required>
                                    <div class="invalid-feedback">
                                        Required
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row py-2">
                            <div class="col-lg-12">
                                <button type="submit" name="update-trip" id="updateTripBtn" class="btn btn-primary">Save Changes</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- Agency Modal -->
    <div class="modal fade" id="agencyinTripModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">Agency Info</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form class="needs-validation" id="agencyForm" novalidate>
                        <div class="form-group">
                            <label for="" class="form-label">Agency Name</label>
                            <input type="text" class="form-control" name="agencyName" required>
                            <div class="invalid-feedback">
                                Required
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <button class="btn btn-primary" id="addAgencyinTrip" type="submit">Add</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- Port Modal -->
    <div class="modal fade" id="portinTripModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">Port Info</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form class="needs-validation" id="portForm" novalidate>
                        <div class="form-group">
                            <label for="" class="form-label">Port Name</label>
                            <input type="text" class="form-control" name="portName" required>
                            <div class="invalid-feedback">
                                Required
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="editShipTypeAB" class="form-label">Port Arabic Name</label>
                            <input type="text" class="form-control" name="portArabicName" required>
                            <div class="invalid-feedback">
                                Required
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <button class="btn btn-primary" id="addPortinTrip" type="submit">Add</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- Cargo Modal -->
    <div class="modal fade" id="cargoinTripModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">Cargo Info</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form class="needs-validation" id="cargoForm" novalidate>
                        <div class="form-group">
                            <label for="" class="form-label">Cargo Name</label>
                            <input type="text" class="form-control" name="cargoName" required>
                            <div class="invalid-feedback">
                                Required
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="" class="form-label">Cargo Arabic Name</label>
                            <input type="text" class="form-control" name="cargoArabicName" required>
                            <div class="invalid-feedback">
                                Required
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <button class="btn btn-primary" id="addCargoinTrip" type="submit">Add</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- Package Type Modal -->
    <div class="modal fade" id="packageinTripModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">Package Info</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form class="needs-validation" id="packageForm" novalidate>
                        <div class="form-group">
                            <label for="" class="form-label">Package Name</label>
                            <input type="text" class="form-control" name="packageName" required>
                            <div class="invalid-feedback">
                                Required
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <button class="btn btn-primary" id="addPackageinTrip" type="submit">Add</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- Add / Edit Discharging Plan Modal -->
    <div class="modal fade" id="dischargingPlanModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">Discharging Plan</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form class="needs-validation" id="createDischargingPlanForm" novalidate>
                        <div class="form-row">
                            <div class="col-md-12 pb-2">
                                <input type="hidden" name="tripId" id="trip_id_to_call" value="">
                                <input type="hidden" id="dischargingPlan_ID">
                                <label for="validationCustom01">Cargo</label>
                                <select class="form-control" id="cargo-lst" name="cargo_id_discharge_plan" required>
                                    <option value=""></option>
                                </select>
                            </div>
                            <div class="col-md-6 pb-2">
                                <label for="validationCustom01">Total Quantity</label>
                                <input type="number" class="form-control" name="" id="quantityDischargingPlan" step="any" readonly>
                            </div>
                            <div class="col-md-6 pb-2">
                                <label for="validationCustom01">Total Weight</label>
                                <input type="number" class="form-control" name="" id="weightDischargingPlan" step="any" readonly>
                            </div>
                            <div class="col-md-6 pb-2">
                                <label for="validationCustom01">Discharging Quantity <span class="text-danger">*</span></label>
                                <input type="number" class="form-control" name="dis_Qty" id="dischargingQuantity" step="any" required>
                                <div class="invalid-feedback">
                                    Required
                                </div>
                            </div>
                            <div class="col-md-6 pb-2">
                                <label for="validationCustom01">Discharging Weight <span class="text-danger">*</span></label>
                                <input type="number" class="form-control" name="dis_Weight" id="dischargingWeight" step="any" required>
                                <div class="invalid-feedback">
                                    Required
                                </div>
                            </div>
                            <div class="col-md-6 pb-2">
                                <label for="validationCustom01">Remaining Quantity</label>
                                <input type="number" class="form-control" name="" id="remainingQuantity" readonly>
                            </div>
                            <div class="col-md-6 pb-2">
                                <label for="validationCustom01">Remaining Weight</label>
                                <input type="text" class="form-control" name="" id="remainingWeight" readonly>
                            </div>
                        </div>
                        <button class="btn btn-primary" type="submit" id="createDischargingPlan">Save</button>
                        <button class="btn btn-primary" type="submit" id="updateDischargingPlan">Update</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
