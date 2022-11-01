@extends('layouts.master')
@section('title')
    | Crew
@endsection
@section('content')
    <p class="h4">Crew</p>
    <div class="tab-content" id="myTabContent">
        <div class="tab-pane fade pt-5 show active" id="view" role="tabpanel" aria-labelledby="view-tab">
            <table id="tripdatatable" class="display nowrap text-center" style="width:100%">
                <thead>
                <tr>
                    <th>Trip ID</th>
                    <th>Trip Date</th>
                    <th>Ship Name</th>
                    <th>Ship Type</th>
                    <th>Arriving Port</th>
                    <th>Action</th>
                </tr>
                </thead>
                <tbody>
                @foreach( $trips as $trip )
                    <tr>
                        <input type="hidden" class="id_val" id="idTrip" value="{{$trip->id}}">
                        <td>{{$trip->trip_number}}</td>
                        <td>{{$trip->trip_date}}</td>
                        <td>{{$trip->ship->ship_name}}</td>
                        <td>{{$trip->ship->shiptype->ship_type_name}}</td>
                        <td>{{$trip->ship_launching_port}}</td>
                        <td>
                            <a href="#" class="btn btn-primary m-0" data-toggle="modal" data-target="#crewModal" id="addCrew">
                                <i class="fas fa-plus"></i>  Add
                            </a>
                            <a href="{{url('/admin/crewlist?trip='.$trip->id)}}" class="btn btn-primary m-0">
                                <i class="fas fa-file-alt"></i> Crew
                            </a>
                        </td>
                    </tr>
                @endforeach
                </tbody>
                <tfoot>
                <tr>
                    <th>Trip ID</th>
                    <th>Trip Date</th>
                    <th>Ship Name</th>
                    <th>Ship Type</th>
                    <th>Arriving Port</th>
                    <th>Action</th>
                </tr>
                </tfoot>
            </table>
        </div>
    </div>

    <!-- Add Crew Modal -->
    <div class="modal fade" id="crewModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-xl" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">Crew Info</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form class="needs-validation" id="createCrewForm" novalidate>
                        <div class="row">
                            <div class="col-lg-3">
                                <div class="form-group">
                                    <input type="hidden" id="tripID" name="tripNbID">
                                    <label class="form-label">Sign <span class="text-danger">*</span></label>
                                    <select name="sign-option" class="form-control" required>
                                        <option value=""></option>
                                        <option value="ON">ON</option>
                                        <option value="OFF">OFF</option>
                                        <option value="Visit">Visit</option>
                                    </select>
                                    <div class="invalid-feedback">
                                        Required
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-3">
                                <div class="form-group">
                                    <label class="form-label">First Name <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control" name="first_name" id="" required>
                                    <div class="invalid-feedback">
                                        Required
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-3">
                                <div class="form-group">
                                    <label class="form-label">Last Name <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control" name="last_name" id="" required>
                                    <div class="invalid-feedback">
                                        Required
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-3">
                                <div class="form-group">
                                    <label class="form-label">Date of Birth <span class="text-danger">*</span></label>
                                    <input type="number" class="form-control" name="dob" id="" required>
                                    <div class="invalid-feedback">
                                        Required
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-3">
                                <div class="form-group">
                                    <label class="form-label">Nationality <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control" name="nationality" id="" required>
                                    <div class="invalid-feedback">
                                        Required
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-3">
                                <div class="form-group">
                                    <label class="form-label">Passport Number</label>
                                    <input type="text" class="form-control" name="passport_nb" id="">
                                </div>
                            </div>
                            <div class="col-lg-3">
                                <div class="form-group">
                                    <label class="form-label">Seaman Book Number</label>
                                    <input type="text" class="form-control" name="seaman_nb" id="">
                                </div>
                            </div>
                            <div class="col-lg-3">
                                <div class="form-group">
                                    <label class="form-label">Company</label>
                                    <select name="company-option" class="form-control">
                                        <option value=""></option>
                                        @foreach($companies as $company)
                                            <option value="{{$company->id}}">{{$company->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div>
                            <div class="row align-items-center">
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <input type="checkbox" value="1" name="transferred"> Check the box if the transfer is completed
                                    </div>
                                </div>
                                <div class="col-lg-6 text-right">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                    <button class="btn btn-primary" id="createCrew" type="submit">Save</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
