@extends('layouts.master')
@section('title')
    | Agency
@endsection
@section('content')
    <p class="h4">Agencies</p>
    <!-- Button trigger modal -->
    <button type="button" class="btn btn-primary mb-4" data-toggle="modal" data-target="#agencyModal">
        Add New Agency
    </button>

    <!-- Modal -->
    <div class="modal fade" id="agencyModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">Agency Info</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form class="needs-validation" id="needs-validation" novalidate>
                        <div class="form-group">
                            <label for="agencyName" class="form-label">Agency Name <span class="text-danger">*</span></label>
                            <input type="text" class="form-control agencyName" id="agencyName" required>
                            <div class="invalid-feedback">
                                Please enter Agency Name
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <button class="btn btn-primary" id="addAgency" type="submit">Add</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>



    <table id="datatable" class="display text-center" style="width:100%">
        <thead>
        <tr>
            <th>Agency Name</th>
            <th>Action</th>
        </tr>
        </thead>
        <tbody>
        @foreach($agencies as $agency)
            <tr>
                <input type="hidden" class="delete_val" value="{{$agency->id}}">
                <td>{{$agency->agency_name}}</td>
                <td>
                    <a href="{{url('/admin/agency/'.$agency->id)}}" class="btn text-primary pl-1 pr-1 m-0 editAgency" data-toggle="modal" data-target="#agencyEditModal">
                        <i class="fas fa-edit fa-lg"></i>
                    </a>
                    <form action="{{url('/admin/agency/'.$agency->id)}}" method="POST" class="d-inline">
                        @csrf
                        @method('DELETE')
                        <button type="button" class="btn text-danger pl-1 pr-1 m-0 agencyDeleteBtn">
                            <i class="fas fa-trash fa-lg"></i>
                        </button>
                    </form>
                </td>
            </tr>
        @endforeach
        </tbody>
        <tfoot>
        <tr>
            <th>Agency Name</th>
            <th>Action</th>
        </tr>
        </tfoot>
    </table>

    <!-- Modal -->
    <div class="modal fade" id="agencyEditModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">Edit Agency Info</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form class="needs-validation" id="editAgencyForm" novalidate>
                        <input type="hidden" id="editAgencyId">
                        <div class="form-group">
                            <label for="editAgencyName" class="form-label">Agency Name <span class="text-danger">*</span></label>
                            <input type="text" class="form-control" id="editAgencyName" required>
                            <div class="invalid-feedback">
                                Please enter Agency Name
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <button class="btn btn-primary edit-agency" type="submit">Save Changes</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
