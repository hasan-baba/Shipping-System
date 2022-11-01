@extends('layouts.master')
@section('title')
    | Package
@endsection
@section('content')
    <p class="h4">Packages</p>
    <!-- Button trigger modal -->
    <button type="button" class="btn btn-primary mb-4" data-toggle="modal" data-target="#packageModal">
        Add New Package
    </button>

    <!-- Modal -->
    <div class="modal fade" id="packageModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">Package Info</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form class="needs-validation" id="needs-validation" novalidate>
                        <div class="form-group">
                            <label for="packageName" class="form-label">Package Name <span class="text-danger">*</span></label>
                            <input type="text" class="form-control packageName" id="packageName" required>
                            <div class="invalid-feedback">
                                Please enter Package Name
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <button class="btn btn-primary" id="addPackage" type="submit">Add</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>



    <table id="datatable" class="display text-center" style="width:100%">
        <thead>
        <tr>
            <th>Package Name</th>
            <th>Action</th>
        </tr>
        </thead>
        <tbody>
        @foreach($packages as $package)
            <tr>
                <input type="hidden" class="delete_val" value="{{$package->id}}">
                <td>{{$package->package_name}}</td>
                <td>
                    <a href="{{url('/admin/package/'.$package->id)}}" class="btn text-primary pl-1 pr-1 m-0 editPackage" data-toggle="modal" data-target="#packageEditModal">
                        <i class="fas fa-edit fa-lg"></i>
                    </a>
                    <form action="{{url('/admin/package/'.$package->id)}}" method="POST" class="d-inline">
                        @csrf
                        @method('DELETE')
                        <button type="button" class="btn text-danger pl-1 pr-1 m-0 packageDeleteBtn">
                            <i class="fas fa-trash fa-lg"></i>
                        </button>
                    </form>
                </td>
            </tr>
        @endforeach
        </tbody>
        <tfoot>
        <tr>
            <th>Package Name</th>
            <th>Action</th>
        </tr>
        </tfoot>
    </table>

    <!-- Modal -->
    <div class="modal fade" id="packageEditModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">Edit Package Info</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form class="needs-validation" id="editPackageForm" novalidate>
                        <input type="hidden" id="editPackageId">
                        <div class="form-group">
                            <label for="editPackageName" class="form-label">Package Name <span class="text-danger">*</span></label>
                            <input type="text" class="form-control" id="editPackageName" required>
                            <div class="invalid-feedback">
                                Please enter package Name
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <button class="btn btn-primary edit-package" type="submit">Save Changes</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
