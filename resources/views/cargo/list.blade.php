@extends('layouts.master')
@section('title')
    | Cargo
@endsection
@section('content')
    <p class="h4">Cargos</p>
    <!-- Button trigger modal -->
    <button type="button" class="btn btn-primary mb-4" data-toggle="modal" data-target="#cargoModal">
        Add New Cargo
    </button>

    <!-- Modal -->
    <div class="modal fade" id="cargoModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">Cargo Info</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form class="needs-validation" id="needs-validation" novalidate>
                        <div class="form-group">
                            <label for="cargoName" class="form-label">Cargo Name <span class="text-danger">*</span></label>
                            <input type="text" class="form-control cargoName" id="cargoName" required>
                            <div class="invalid-feedback">
                                Please enter Cargo Name
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="cargoArabicName" class="form-label">Cargo Arabic Name <span class="text-danger">*</span></label>
                            <input type="text" class="form-control cargoArabicName" id="cargoArabicName" required>
                            <div class="invalid-feedback">
                                Please enter Cargo Arabic Name
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <button class="btn btn-primary" id="addCargo" type="submit">Add</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>



    <table id="datatable" class="display text-center" style="width:100%">
        <thead>
        <tr>
            <th>Cargo Name</th>
            <th>Cargo Arabic Name</th>
            <th>Action</th>
        </tr>
        </thead>
        <tbody>
        @foreach($cargos as $cargo)
            <tr>
                <input type="hidden" class="delete_val" value="{{$cargo->id}}">
                <td>{{$cargo->cargo_name}}</td>
                <td>{{$cargo->cargo_arabic_name}}</td>
                <td>
                    <a href="{{url('/admin/cargo/'.$cargo->id)}}" class="btn text-primary pl-1 pr-1 m-0 editCargo" data-toggle="modal" data-target="#cargoEditModal">
                        <i class="fas fa-edit fa-lg"></i>
                    </a>
                    <form action="{{url('/admin/cargo/'.$cargo->id)}}" method="POST" class="d-inline">
                        @csrf
                        @method('DELETE')
                        <button type="button" class="btn text-danger pl-1 pr-1 m-0 cargoDeleteBtn">
                            <i class="fas fa-trash fa-lg"></i>
                        </button>
                    </form>
                </td>
            </tr>
        @endforeach
        </tbody>
        <tfoot>
        <tr>
            <th>Cargo Name</th>
            <th>Cargo Arabic Name</th>
            <th>Action</th>
        </tr>
        </tfoot>
    </table>

    <!-- Modal -->
    <div class="modal fade" id="cargoEditModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">Edit Cargo Info</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form class="needs-validation" id="editCargoForm" novalidate>
                        <input type="hidden" id="editCargoId">
                        <div class="form-group">
                            <label for="editCargoName" class="form-label">Cargo Name <span class="text-danger">*</span></label>
                            <input type="text" class="form-control" id="editCargoName" required>
                            <div class="invalid-feedback">
                                Please enter Cargo Name
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="editArabicName" class="form-label">Cargo Arabic Name <span class="text-danger">*</span></label>
                            <input type="text" class="form-control" id="editArabicName" required>
                            <div class="invalid-feedback">
                                Please enter Cargo Arabic Name
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <button class="btn btn-primary edit-cargo" type="submit">Save Changes</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
