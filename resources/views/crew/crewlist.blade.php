@extends('layouts.master')
@section('title')
    | Crew List
@endsection
@section('content')
    <p class="h4">Crew List for Trip {{$tripId}}</p>
    <div class="tab-content" id="myTabContent">
        <div class="tab-pane fade pt-5 show active" id="view" role="tabpanel" aria-labelledby="view-tab">
            <table id="tripdatatable" class="display nowrap text-center" style="width:100%">
                <thead>
                <tr>
                    <th>Action</th>
                    <th>Transferred</th>
                    <th>Sign</th>
                    <th>First Name</th>
                    <th>Last Name</th>
                    <th>Date of Birth</th>
                    <th>Nationality</th>
                    <th>Passport Number</th>
                    <th>Seaman Book Number</th>
                    <th>Company</th>
                </tr>
                </thead>
                <tbody>
                @foreach( $crews as $crew )
                    <tr>
                        <input type="hidden" class="" id="crewID" value="{{$crew->id}}">
                        <td>
                            <a href="#" class="btn text-primary pl-1 pr-1 m-0" data-toggle="modal" data-target="#editcrewModal" id="editCrewInfo">
                                <i class="fas fa-edit fa-lg"></i>
                            </a>
                            <form action="{{url('/admin/crew/'.$crew->id)}}" method="POST" class="d-inline">
                                @csrf
                                @method('DELETE')
                                <button class="btn text-danger pl-1 pr-1 m-0" id="deleteCrew">
                                    <i class="fas fa-trash fa-lg"></i>
                                </button>
                            </form>
                        </td>
                        <td>
                            @if($crew->is_transfer_completed == 0)
                                <input type="checkbox" disabled>
                            @else
                                <input type="checkbox" checked disabled>
                            @endif
                        </td>
                        <td>{{$crew->sign}}</td>
                        <td>{{$crew->first_name}}</td>
                        <td>{{$crew->last_name}}</td>
                        <td>{{$crew->date_of_birth}}</td>
                        <td>{{$crew->nationality}}</td>
                        <td>{{$crew->passport_number}}</td>
                        <td>{{$crew->seaman_book_number}}</td>
                        <td>
                            @if(!empty($crew->company->name))
                                {{$crew->company->name}}
                            @endif
                        </td>
                    </tr>
                @endforeach
                </tbody>
                <tfoot>
                <tr>
                    <th>Action</th>
                    <th>Transferred</th>
                    <th>Sign</th>
                    <th>First Name</th>
                    <th>Last Name</th>
                    <th>Date of Birth</th>
                    <th>Nationality</th>
                    <th>Passport Number</th>
                    <th>Seaman Book Number</th>
                    <th>Company</th>
                </tr>
                </tfoot>
            </table>
        </div>
    </div>

    <!-- Edit Crew Modal -->
    <div class="modal fade" id="editcrewModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-xl" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">Crew Info</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form class="needs-validation" id="editCrewForm" novalidate>
                        <div class="row">
                            <div class="col-lg-3">
                                <div class="form-group">
                                    <input type="hidden" id="crewIDInfo" name="crew_id_info">
                                    <label class="form-label">Sign <span class="text-danger">*</span></label>
                                    <select name="sign-option" id="sign" class="form-control" required>
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
                                    <input type="text" class="form-control" name="first_name" id="firstName" required>
                                    <div class="invalid-feedback">
                                        Required
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-3">
                                <div class="form-group">
                                    <label class="form-label">Last Name <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control" name="last_name" id="lastName" required>
                                    <div class="invalid-feedback">
                                        Required
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-3">
                                <div class="form-group">
                                    <label class="form-label">Date of Birth <span class="text-danger">*</span></label>
                                    <input type="number" class="form-control" name="dob" id="dateBirth" required>
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
                                    <input type="text" class="form-control" name="nationality" id="crew_nationality" required>
                                    <div class="invalid-feedback">
                                        Required
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-3">
                                <div class="form-group">
                                    <label class="form-label">Passport Number</label>
                                    <input type="text" class="form-control" name="passport_nb" id="passport">
                                </div>
                            </div>
                            <div class="col-lg-3">
                                <div class="form-group">
                                    <label class="form-label">Seaman Book Number</label>
                                    <input type="text" class="form-control" name="seaman_nb" id="seamanNB">
                                </div>
                            </div>
                            <div class="col-lg-3">
                                <div class="form-group">
                                    <label class="form-label">Company</label>
                                    <select name="company-option" class="form-control" id="company">
                                        <option value=""></option>
                                        @if( count($companies) > 0 )
                                            @foreach($companies as $company)
                                                <option value="{{$company->id}}">{{$company->name}}</option>
                                            @endforeach
                                        @endif
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div>
                            <div class="row align-items-center">
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <input type="checkbox" value="1" name="transferred" id="transfer"> Check the box if the transfer is completed
                                    </div>
                                </div>
                                <div class="col-lg-6 text-right">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                    <button class="btn btn-primary" id="updateCrewInfo" type="submit">Save</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
