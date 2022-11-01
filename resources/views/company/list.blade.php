@extends('layouts.master')
@section('title')
    | Company
@endsection
@section('content')
    <p class="h4">Company</p>
    <!-- Button trigger modal -->
    <button type="button" class="btn btn-primary mb-4" data-toggle="modal" data-target="#companyModal">
        Add New Company
    </button>

    <!-- Modal -->
    <div class="modal fade" id="companyModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">Company Info</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form class="needs-validation" id="needs-validation" novalidate>
                        <div class="form-group">
                            <label for="companyName" class="form-label">Company Name <span class="text-danger">*</span></label>
                            <input type="text" class="form-control companyName" id="companyName" required>
                            <div class="invalid-feedback">
                                Please enter Company Name
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="editArabicName" class="form-label">Country</label>
                            <input type="text" class="form-control country" id="editArabicName">
                        </div>
                        <div class="form-group">
                            <label for="editArabicName" class="form-label">Address</label>
                            <input type="text" class="form-control address" id="editArabicName">
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <button class="btn btn-primary" id="addCompany" type="submit">Add</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>



    <table id="datatable" class="display text-center" style="width:100%">
        <thead>
        <tr>
            <th>Company Name</th>
            <th>Country</th>
            <th>Address</th>
            <th>Action</th>
        </tr>
        </thead>
        <tbody>
        @foreach($companies as $company)
            <tr>
                <input type="hidden" class="delete_val" value="{{$company->id}}">
                <td>{{$company->name}}</td>
                <td>{{$company->country}}</td>
                <td>{{$company->address}}</td>
                <td>
                    <a href="{{url('/admin/company/'.$company->id)}}" class="btn text-primary pl-1 pr-1 m-0 editCompany" data-toggle="modal" data-target="#companyEditModal">
                        <i class="fas fa-edit fa-lg"></i>
                    </a>
                    <form action="{{url('/admin/company/'.$company->id)}}" method="POST" class="d-inline">
                        @csrf
                        @method('DELETE')
                        <button type="button" class="btn text-danger pl-1 pr-1 m-0 companyDeleteBtn">
                            <i class="fas fa-trash fa-lg"></i>
                        </button>
                    </form>
                </td>
            </tr>
        @endforeach
        </tbody>
        <tfoot>
        <tr>
            <th>Company Name</th>
            <th>Country</th>
            <th>Address</th>
            <th>Action</th>
        </tr>
        </tfoot>
    </table>

    <!-- Modal -->
    <div class="modal fade" id="companyEditModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">Edit Company Info</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form class="needs-validation" id="editCompanyForm" novalidate>
                        <input type="hidden" id="editCompanyId">
                        <div class="form-group">
                            <label for="editCompanyName" class="form-label">Company Name <span class="text-danger">*</span></label>
                            <input type="text" class="form-control" id="editCompanyName" required>
                            <div class="invalid-feedback">
                                Please enter Company Name
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="editArabicName" class="form-label">Country</label>
                            <input type="text" class="form-control" id="editCountry">
                        </div>
                        <div class="form-group">
                            <label for="editArabicName" class="form-label">Address</label>
                            <input type="text" class="form-control" id="editAddress">
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <button class="btn btn-primary edit-company" type="submit">Save Changes</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
