@extends('layouts.master')
@section('title')
| Ship
@endsection
@section('content')
    <p class="h4">Ships</p>
    <nav class="pt-4">
        <div class="nav nav-tabs" id="nav-tab" role="tablist">
            <a class="nav-item nav-link active" id="nav-info-tab" data-toggle="tab" href="#nav-info" role="tab" aria-controls="nav-ship" aria-selected="true">View Ship Info</a>
            <a class="nav-item nav-link" id="nav-ship-tab" data-toggle="tab" href="#nav-ship" role="tab" aria-controls="nav-info" aria-selected="false">Add Ship</a>
        </div>
    </nav>
    <div class="tab-content" id="nav-tabContent">
        <div class="tab-pane fade pt-5  show active" id="nav-info" role="tabpanel" aria-labelledby="nav-info-tab">
            <table id="datatable" class="display text-center" style="width:100%">
                <thead>
                <tr>
                    <th>Action</th>
                    <th>IMO Number</th>
                    <th>Ship Name</th>
                    <th>Ship Type</th>
                    <th>Ship Flag</th>
                    <th>Ship Dead Weight</th>
                </tr>
                </thead>
                <tbody>
                @foreach( $ships as $ship )
                    <tr>
                        <input type="hidden" class="id_val" id="idShip" value="{{$ship->id}}">
                        <td>
                            <a href="#" title="View Details" class="btn text-success infobtn pl-1 pr-1 m-0" data-toggle="modal" data-target="#infoship-modal" id="infoShip">
                                <i class="fas fa-info-circle fa-lg"></i>
                            </a>
                            <a href="#" title="Edit User" class="btn text-primary editBtn pl-1 pr-1 m-0" data-toggle="modal" data-target="#update-ship" id="editShip">
                                <i class="fas fa-edit fa-lg"></i>
                            </a>
                            <form action="{{url('/admin/ship/'.$ship->id)}}" method="POST" class="d-inline">
                                @csrf
                                @method('DELETE')
                                <a href="#" title="Delete User" class="btn text-danger delshipbtn pl-1 pr-1 m-0" id="deleteShip">
                                    <i class="fas fa-trash fa-lg"></i>
                                </a>
                            </form>
                        </td>
                        <td>{{$ship->imo_number}}</td>
                        <td>{{$ship->ship_name}}</td>
                        <td>{{$ship->shiptype->ship_type_name}}</td>
                        <td>{{$ship->flag}}</td>
                        <td>{{$ship->dead_weight}}</td>
                    </tr>
                @endforeach
                </tbody>
                <tfoot>
                <tr>
                    <th>Action</th>
                    <th>IMO Number</th>
                    <th>Ship Name</th>
                    <th>Ship Type</th>
                    <th>Ship Flag</th>
                    <th>Ship Dead Weight</th>
                </tr>
                </tfoot>
            </table>
        </div>

        <div class="tab-pane fade" id="nav-ship" role="tabpanel" aria-labelledby="nav-ship-tab">
            <div class="container pt-5" id="insertship-box">
                <form id="isertship-form" action="#" method="POST" class="needs-validation" novalidate>
                    <div class="row pb-2">
                        <div class="col-lg-4">
                            <div class="form-group">
                                <label for="">Ship Name <span class="text-danger">*</span></label>
                                <input id="ship_name" type="text" class="form-control" name="ship_name" aria-describedby="emailHelp" required>
                                <div class="invalid-feedback">
                                    Required
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="form-group">
                                <label for="">EX Name <span class="text-danger">*</span></label>
                                <input type="text" class="form-control" name="ex_name" aria-describedby="emailHelp" required>
                                <div class="invalid-feedback">
                                    Required
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="form-group">
                                <label for="">Ship Type <span class="text-danger">*</span></label>
                                <button class="btn-primary border-0 rounded-circle" type="button" data-toggle="modal" data-target="#shipTypeModal"><i class="fas fa-plus"></i></button>
                                <select class="selectpicker custom-select" data-live-search="true" id="shipTypeOption" name="ship_type" required>
                                    <option value=""></option>
                                    @foreach($ship_types as $ship_type)
                                        <option value="{{$ship_type->id}}">{{$ship_type->ship_type_name}}</option>
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
                                <label for="">Flag <span class="text-danger">*</span></label>
                                <input type="text" class="form-control" name="flag" aria-describedby="emailHelp" required>
                                <div class="invalid-feedback">
                                    Required
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="form-group">
                                <label for="">MMSI <span class="text-danger">*</span></label>
                                <input type="number" class="form-control" name="mssi" aria-describedby="emailHelp" required>
                                <div class="invalid-feedback">
                                    Required, Please enter a valid Number
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="form-group">
                                <label for="">IMO Number <span class="text-danger">*</span></label>
                                <input type="number" class="form-control" name="imo_number" aria-describedby="emailHelp" required>
                                <div class="invalid-feedback">
                                    Required, Please enter a valid Number
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="form-group">
                                <label for="">I.S.S.C</label>
                                <input type="text" class="form-control" name="issc" aria-describedby="emailHelp">
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="form-group">
                                <label for="">Color</label>
                                <input type="text" class="form-control" name="color" aria-describedby="emailHelp">
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="form-group">
                                <label for="">CallSign <span class="text-danger">*</span></label>
                                <input type="text" class="form-control" name="callsign" aria-describedby="emailHelp" required>
                                <div class="invalid-feedback">
                                    Required
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row pb-2">
                        <div class="col-lg-4">
                            <div class="form-group">
                                <label for="">Registry Port</label>
                                <input type="text" class="form-control" name="reg_port" aria-describedby="emailHelp">
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="form-group">
                                <label for="">Registration Date</label>
                                <input type="date" class="form-control" name="reg_date" aria-describedby="emailHelp">
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="form-group">
                                <label for="">Registration Number</label>
                                <input type="text" class="form-control" name="reg_number" aria-describedby="emailHelp">
                            </div>
                        </div>
                    </div>
                    <div class="row pb-2">
                        <div class="col-lg-4">
                            <div class="form-group">
                                <label for="">Owner</label>
                                <input type="text" class="form-control" name="owner" aria-describedby="emailHelp">
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="form-group">
                                <label for="">Charterers</label>
                                <input type="text" class="form-control" name="charterers" aria-describedby="emailHelp">
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="form-group">
                                <label for="">Date of Built <span class="text-danger">*</span></label>
                                <input type="number" class="form-control" name="ship_dob" aria-describedby="emailHelp" required>
                                <div class="invalid-feedback">
                                    Required, Please enter a valid year of build (ex: 2022)
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row pb-2">
                        <div class="col-lg-3">
                            <div class="form-group">
                                <label for="">Net Tonnage <span class="text-danger">*</span></label>
                                <input type="text" class="form-control" name="net_tonage" aria-describedby="emailHelp" required>
                                <div class="invalid-feedback">
                                    Required, Please enter a valid Number
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3">
                            <div class="form-group">
                                <label for="">Gross Tonnage <span class="text-danger">*</span></label>
                                <input type="text" class="form-control" name="gross_ton" aria-describedby="emailHelp" required>
                                <div class="invalid-feedback">
                                    Required, Please enter a valid Number
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3">
                            <div class="form-group">
                                <label for="">Dead Weight <span class="text-danger">*</span></label>
                                <input type="text" class="form-control" name="deadwt" aria-describedby="emailHelp" required>
                                <div class="invalid-feedback">
                                    Required, Please enter a valid Number
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3">
                            <div class="form-group">
                                <label for="">Speed</label>
                                <input type="text" class="form-control" name="speed" aria-describedby="emailHelp">
                            </div>
                        </div>
                    </div>
                    <div class="row pb-2">
                        <div class="col-lg-3">
                            <div class="form-group">
                                <label for="">Overall Length <span class="text-danger">*</span></label>
                                <input type="text" class="form-control" name="ship_length" aria-describedby="emailHelp" required>
                                <div class="invalid-feedback">
                                    Required, Please enter a valid Number
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3">
                            <div class="form-group">
                                <label for="">Breadth <span class="text-danger">*</span></label>
                                <input type="text" class="form-control" name="breadth" aria-describedby="emailHelp" required>
                                <div class="invalid-feedback">
                                    Required, Please enter a valid Number
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3">
                            <div class="form-group">
                                <label for="">Draft <span class="text-danger">*</span></label>
                                <input type="text" class="form-control" name="draft" aria-describedby="emailHelp" required>
                                <div class="invalid-feedback">
                                    Required, Please enter a valid Number
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3">
                            <div class="form-group">
                                <label for="">Depth</label>
                                <input type="text" class="form-control" name="depth" aria-describedby="emailHelp">
                            </div>
                        </div>
                    </div>
                    <div class="row pb-2">
                        <div class="col-lg-4">
                            <div class="form-group">
                                <label for="">Annuel Survey of Machinery</label>
                                <input type="date" class="form-control" name="annuel_survey_machinery" aria-describedby="emailHelp">
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="form-group">
                                <label for="">Pollition Certificate</label>
                                <input type="date" class="form-control" name="pollution_certificate" aria-describedby="emailHelp">
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="form-group">
                                <label for="">Load Line Certificate</label>
                                <input type="date" class="form-control" name="loadLine_cert" aria-describedby="emailHelp">
                            </div>
                        </div>
                    </div>
                    <div class="row pb-2">
                        <div class="col-lg-4">
                            <div class="form-group">
                                <label for="">Safety Equipment Certificate</label>
                                <input type="date" class="form-control" name="safty_ec" aria-describedby="emailHelp">
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="form-group">
                                <label for="">Safety Construction Certificate</label>
                                <input type="date" class="form-control" name="safty_cc" aria-describedby="emailHelp">
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="form-group">
                                <label for="">Classification Certificate</label>
                                <input type="date" class="form-control" name="classification_certificate" aria-describedby="emailHelp">
                            </div>
                        </div>
                    </div>
                    <div class="row pb-2">
                        <div class="col-lg-4">
                            <div class="form-group">
                                <label for="">Radio Telegraphy Certificate</label>
                                <input type="date" class="form-control" name="radio_telegraphy_certificate" aria-describedby="emailHelp">
                            </div>
                        </div>
                    </div>
                    <div class="row py-2">
                        <div class="col-lg-12 text-left">
                            <button type="submit" name="addship_btn" id="insertship-btn" class="btn btn-primary">Add Ship</button>
                            <button type="reset" class="btn btn-primary">Clear Information</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Info Ship Modal -->
    <div class="modal fade bd-example-modal-lg" id="infoship-modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">Ship Information</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body" id="info-content">
                    <div class='row'>
                        <div class='col-6'>
                            <div class='row m-auto'>
                                <div class='col-6'>
                                    <p class='font-weight-bold'>Ship Name</p>
                                </div>
                                <div class='col-6'>
                                    <p class='text-center' id="ship-info-name"></p>
                                </div>
                            </div>
                            <div class='row m-auto'>
                                <div class='col-6'>
                                    <p class='font-weight-bold'>Ship Type</p>
                                </div>
                                <div class='col-6'>
                                    <p class='text-center' id='ship-info-type'> </p>
                                </div>
                            </div>
                            <div class='row m-auto'>
                                <div class='col-6'>
                                    <p class='font-weight-bold'>Ship IMO Number</p>
                                </div>
                                <div class='col-6'>
                                    <p class='text-center' id="imo-info-nb"> </p>
                                </div>
                            </div>
                            <div class='row m-auto'>
                                <div class='col-6'>
                                    <p class='font-weight-bold'>Ship MMSI</p>
                                </div>
                                <div class="col-6">
                                    <p class='text-center' id="mssi-info"> </p>
                                </div>
                            </div>
                            <div class='row m-auto'>
                                <div class='col-6'>
                                    <p class='font-weight-bold'>Ship Flag</p>
                                </div>
                                <div class='col-6'>
                                    <p class='text-center' id="flag-info"></p>
                                </div>
                            </div>
                            <div class='row m-auto'>
                                <div class='col-6'>
                                    <p class='font-weight-bold'>Ship EX Name</p>
                                </div>
                                <div class='col-6'>
                                    <p class='text-center' id="ex-info-name"></p>
                                </div>
                            </div>
                            <div class='row m-auto'>
                                <div class='col-6'>
                                    <p class='font-weight-bold'>Ship Call Sign</p>
                                </div>
                                <div class='col-6'>
                                    <p class='text-center' id="call-info-sign"> </p>
                                </div>
                            </div>
                            <div class='row m-auto'>
                                <div class='col-6'>
                                    <p class='font-weight-bold'>Ship registration Port</p>
                                </div>
                                <div class='col-6'>
                                    <p class='text-center' id="registry-info-port"></p>
                                </div>
                            </div>
                            <div class='row m-auto'>
                                <div class='col-6'>
                                    <p class='font-weight-bold'>Ship registration Number</p>
                                </div>
                                <div class='col-6'>
                                    <p class='text-center' id="registry-info-number"></p>
                                </div>
                            </div>
                            <div class='row m-auto'>
                                <div class='col-6'>
                                    <p class='font-weight-bold'>Ship registration Date</p>
                                </div>
                                <div class='col-6'>
                                    <p class='text-center' id="registry-info-date"></p>
                                </div>
                            </div>
                            <div class='row m-auto'>
                                <div class='col-6'>
                                    <p class='font-weight-bold'>Ship Net Tonnage</p>
                                </div>
                                <div class='col-6'>
                                    <p class='text-center' id="net-info-tonnage"></p>
                                </div>
                            </div>
                            <div class='row m-auto'>
                                <div class='col-6'>
                                    <p class='font-weight-bold'>Ship Gross Tonnage</p>
                                </div>
                                <div class='col-6'>
                                    <p class='text-center' id="gross-info-tonage"></p>
                                </div>
                            </div>
                            <div class='row m-auto'>
                                <div class='col-6'>
                                    <p class='font-weight-bold'>Ship Dead Weight</p>
                                </div>
                                <div class="col-6">
                                    <p class='text-center' id="dead-info-weight"></p>
                                </div>
                            </div>
                            <div class='row m-auto'>
                                <div class='col-6'>
                                    <p class='font-weight-bold'>Ship Date of Build</p>
                                </div>
                                <div class='col-6'>
                                    <p class='text-center' id="info-dob"></p>
                                </div>
                            </div>
                            <div class='row m-auto'>
                                <div class='col-6'>
                                    <p class='font-weight-bold'>Ship Speed</p>
                                </div>
                                <div class='col-6'>
                                    <p class='text-center' id="speed-info"></p>
                                </div>
                            </div>
                        </div>
                        <div class='col-6'>
                            <div class='row m-auto'>
                                <div class='col-6'>
                                    <p class='font-weight-bold'>Ship Length</p>
                                </div>
                                <div class="col-6">
                                    <p class='text-center' id="length-info"></p>
                                </div>
                            </div>
                            <div class='row m-auto'>
                                <div class='col-6'>
                                    <p class='font-weight-bold'>Ship Draft</p>
                                </div>
                                <div class='col-6'>
                                    <p class='text-center' id="draft-info"> </p>
                                </div>
                            </div>
                            <div class='row m-auto'>
                                <div class='col-6'>
                                    <p class='font-weight-bold'>Ship Breadth </p>
                                </div>
                                <div class='col-6'>
                                    <p class='text-center' id="breadth-info"></p>
                                </div>
                            </div>
                            <div class='row m-auto'>
                                <div class='col-6'>
                                    <p class='font-weight-bold'>Ship Depth</p>
                                </div>
                                <div class='col-6'>
                                    <p class='text-center' id="depth-info"></p>
                                </div>
                            </div>
                            <div class='row m-auto'>
                                <div class='col-6'>
                                    <p class='font-weight-bold'>Ship Color</p>
                                </div>
                                <div class='col-6'>
                                    <p class='text-center' id="color-info"></p>
                                </div>
                            </div>
                            <div class='row m-auto'>
                                <div class='col-6'>
                                    <p class='font-weight-bold'>Ship ISCC Number</p>
                                </div>
                                <div class='col-6'>
                                    <p class='text-center' id="isscnb-info"> </p>
                                </div>
                            </div>
                            <div class='row m-auto'>
                                <div class='col-6'>
                                    <p class='font-weight-bold'>Ship Pollution Certificate</p>
                                </div>
                                <div class='col-6'>
                                    <p class='text-center' id="pollutioncert-info"> </p>
                                </div>
                            </div>
                            <div class='row m-auto'>
                                <div class='col-6'>
                                    <p class='font-weight-bold'>Ship Safety Equipment Certificate</p>
                                </div>
                                <div class='col-6'>
                                    <p class='text-center' id="saftyequipment-cert-info"></p>
                                </div>
                            </div>
                            <div class='row m-auto'>
                                <div class='col-6'>
                                    <p class='font-weight-bold'>Ship Radio Telegraphy Certificate</p>
                                </div>
                                <div class='col-6'>
                                    <p class='text-center' id="radio-cert-info"></p>
                                </div>
                            </div>
                            <div class='row m-auto'>
                                <div class='col-6'>
                                    <p class='font-weight-bold'>Ship Safety Construction Certificate</p>
                                </div>
                                <div class='col-6'>
                                    <p class='text-center' id="safty-cc-info"> </p>
                                </div>
                            </div>
                            <div class='row m-auto'>
                                <div class='col-6'>
                                    <p class='font-weight-bold'>Ship Annuel Survey of Machinery</p>
                                </div>
                                <div class='col-6'>
                                    <p class='text-center' id="aso-machinery-info"></p>
                                </div>
                            </div>
                            <div class='row m-auto'>
                                <div class='col-6'>
                                    <p class='font-weight-bold'>Ship Load Line Certificate</p>
                                </div>
                                <div class='col-6'>
                                    <p class='text-center' id="ll-certificate-info"></p>
                                </div>
                            </div>
                            <div class='row m-auto'>
                                <div class='col-6'>
                                    <p class='font-weight-bold'>Ship Owner</p>
                                </div>
                                <div class='col-6'>
                                    <p class='text-center' id="owners-info"></p>
                                </div>
                            </div>
                            <div class='row m-auto'>
                                <div class='col-6'>
                                    <p class='font-weight-bold'>Ship Charterers</p>
                                </div>
                                <div class='col-6'>
                                    <p class='text-center' id="charterers-info"></p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Edit Ship Modal -->
    <div class="modal fade bd-example-modal-xl" id="update-ship" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-xl" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">Ship Information</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form id="updateShipForm" action="#" method="POST" class="needs-validation" novalidate>
                        <div class="row pb-2">
                            <div class="col-lg-4">
                                <div class="form-group">
                                    <input type="hidden" id="updateShipId">
                                    <label for="">Ship Name <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control" name="edit_ship_name" id="edit_ship_name" required>
                                    <div class="invalid-feedback">
                                        Required
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="form-group">
                                    <label for="">EX Name <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control" id="ex_name" name="ex_name" aria-describedby="emailHelp" required>
                                    <div class="invalid-feedback">
                                        Required
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="form-group">
                                    <label for="">Ship Type <span class="text-danger">*</span></label>
                                    <select class="selectpicker custom-select" data-live-search="true" id="ship_type" name="ship_type" required>
                                        <option value=""></option>
                                        @foreach($ship_types as $ship_type)
                                            <option value="{{$ship_type->id}}">{{$ship_type->ship_type_name}}</option>
                                        @endforeach
                                    </select>
                                    <div class="invalid-feedback">
                                        Required
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row pb-2">
                            <div class="col-lg-2">
                                <div class="form-group">
                                    <label for="">Flag <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control" name="flag" id="flag" aria-describedby="emailHelp" required>
                                    <div class="invalid-feedback">
                                        Required
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-2">
                                <div class="form-group">
                                    <label for="">MMSI <span class="text-danger">*</span></label>
                                    <input type="number" class="form-control" name="mssi" id="mssi" aria-describedby="emailHelp" required>
                                    <div class="invalid-feedback">
                                        Required, Please enter a valid Number
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-2">
                                <div class="form-group">
                                    <label for="">IMO Number <span class="text-danger">*</span></label>
                                    <input type="number" class="form-control" name="imo_number" id="imo_number" aria-describedby="emailHelp" required>
                                    <div class="invalid-feedback">
                                        Required, Please enter a valid Number
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-2">
                                <div class="form-group">
                                    <label for="">I.S.S.C</label>
                                    <input type="text" class="form-control" name="issc" id="issc" aria-describedby="emailHelp">
                                </div>
                            </div>
                            <div class="col-lg-2">
                                <div class="form-group">
                                    <label for="">Color</label>
                                    <input type="text" class="form-control" name="color" id="color" aria-describedby="emailHelp">
                                </div>
                            </div>
                            <div class="col-lg-2">
                                <div class="form-group">
                                    <label for="">CallSign <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control" name="callsign" id="call_sign" aria-describedby="emailHelp" required>
                                    <div class="invalid-feedback">
                                        Required
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row pb-2">
                            <div class="col-lg-4">
                                <div class="form-group">
                                    <label for="">Registry Port</label>
                                    <input type="text" class="form-control" name="reg_port" id="registry_port" aria-describedby="emailHelp">
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="form-group">
                                    <label for="">Registration Date</label>
                                    <input type="date" class="form-control" name="reg_date" id="registration_date" aria-describedby="emailHelp">
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="form-group">
                                    <label for="">Registration Number</label>
                                    <input type="text" class="form-control" id="registration_number" name="reg_number" aria-describedby="emailHelp">
                                </div>
                            </div>
                        </div>
                        <div class="row pb-2">
                            <div class="col-lg-4">
                                <div class="form-group">
                                    <label for="">Owner</label>
                                    <input type="text" class="form-control" name="owner" id="owner" aria-describedby="emailHelp">
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="form-group">
                                    <label for="">Charterers</label>
                                    <input type="text" class="form-control" name="charterers" id="charterers" aria-describedby="emailHelp">
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="form-group">
                                    <label for="">Date of Built <span class="text-danger">*</span></label>
                                    <input type="number" class="form-control" name="ship_dob" id="date_of_built" aria-describedby="emailHelp" required>
                                    <div class="invalid-feedback">
                                        Required, Please enter a valid year of build (ex: 2022)
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row pb-2">
                            <div class="col-lg-3">
                                <div class="form-group">
                                    <label for="">Net Tonnage <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control" name="net_tonage" id="net_tonnage" aria-describedby="emailHelp" required>
                                    <div class="invalid-feedback">
                                        Required, Please enter a valid Number
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-3">
                                <div class="form-group">
                                    <label for="">Gross Tonnage <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control" name="gross_ton" id="gross_tonnage" aria-describedby="emailHelp" required>
                                    <div class="invalid-feedback">
                                        Required, Please enter a valid Number
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-3">
                                <div class="form-group">
                                    <label for="">Dead Weight <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control" name="deadwt" id="dead_weight" aria-describedby="emailHelp" required>
                                    <div class="invalid-feedback">
                                        Required, Please enter a valid Number
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-3">
                                <div class="form-group">
                                    <label for="">Speed</label>
                                    <input type="text" class="form-control" name="speed" id="speed" aria-describedby="emailHelp">
                                </div>
                            </div>
                        </div>
                        <div class="row pb-2">
                            <div class="col-lg-3">
                                <div class="form-group">
                                    <label for="">Overall Length <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control" name="ship_length" id="overall_length" aria-describedby="emailHelp" required>
                                    <div class="invalid-feedback">
                                        Required, Please enter a valid Number
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-3">
                                <div class="form-group">
                                    <label for="">Draft <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control" name="draft" id="draft" aria-describedby="emailHelp" required>
                                    <div class="invalid-feedback">
                                        Required, Please enter a valid Number
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-3">
                                <div class="form-group">
                                    <label for="">Breadth <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control" name="breadth" id="breadth" aria-describedby="emailHelp" required>
                                    <div class="invalid-feedback">
                                        Required, Please enter a valid Number
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-3">
                                <div class="form-group">
                                    <label for="">Depth</label>
                                    <input type="text" class="form-control" name="depth" id="depth" aria-describedby="emailHelp">
                                </div>
                            </div>
                        </div>
                        <div class="row pb-2">
                            <div class="col-lg-4">
                                <div class="form-group">
                                    <label for="">Annuel Survey of Machinery</label>
                                    <input type="date" class="form-control" name="annuel_survey_machinery" id="annuel_survey_of_machinery" aria-describedby="emailHelp">
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="form-group">
                                    <label for="">Pollition Certificate</label>
                                    <input type="date" class="form-control" name="pollution_certificate" id="pollition_certificate" aria-describedby="emailHelp">
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="form-group">
                                    <label for="">Load Line Certificate</label>
                                    <input type="date" class="form-control" name="loadLine_cert" id="load_line_certificate" aria-describedby="emailHelp">
                                </div>
                            </div>
                        </div>
                        <div class="row pb-2">
                            <div class="col-lg-4">
                                <div class="form-group">
                                    <label for="">Safety Equipment Certificate</label>
                                    <input type="date" class="form-control" name="safty_ec" id="safety_equipment_certificate" aria-describedby="emailHelp">
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="form-group">
                                    <label for="">Safety Construction Certificate</label>
                                    <input type="date" class="form-control" name="safty_cc" id="safety_construction_certificate" aria-describedby="emailHelp">
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="form-group">
                                    <label for="">Classification Certificate</label>
                                    <input type="date" class="form-control" name="classification_certificate" aria-describedby="emailHelp">
                                </div>
                            </div>
                        </div>
                        <div class="row pb-2">
                            <div class="col-lg-4">
                                <div class="form-group">
                                    <label for="">Radio Telegraphy Certificate</label>
                                    <input type="date" class="form-control" name="radio_telegraphy_certificate" id="radio_telegraphy_certificate" aria-describedby="emailHelp">
                                </div>
                            </div>
                        </div>
                        <div class="row py-2">
                            <div class="col-lg-12 text-left">
                                <button type="submit" id="updateShipInfo" class="btn btn-primary">Update Ship Info</button>
                                <button type="reset" class="btn btn-primary">Clear Information</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Ship Type Modal -->
    <div class="modal fade" id="shipTypeModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">Ship Type Info</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form class="needs-validation" id="needs-validation" novalidate>
                        <input type="hidden" id="editShipTypeId">
                        <div class="form-group">
                            <label for="editShipTypeName" class="form-label">Ship Type Name</label>
                            <input type="text" class="form-control" id="shipTypeName" required>
                            <div class="invalid-feedback">
                                Please enter Ship Type Name
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="editShipTypeAB" class="form-label">Ship Type AB</label>
                            <input type="text" class="form-control" id="shipTypeAB" required>
                            <div class="invalid-feedback">
                                Please enter Ship Type AB
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <button class="btn btn-primary" id="addNewShipType" type="submit">Add</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
