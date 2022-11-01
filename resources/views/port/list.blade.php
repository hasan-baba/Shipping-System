@extends('layouts.master')
@section('title')
    | Port
@endsection
@section('content')
    <p class="h4">Ports</p>
    <!-- Button trigger modal -->
    <button type="button" class="btn btn-primary mb-4" data-toggle="modal" data-target="#portModal">
        Add New Port
    </button>

    <!-- Modal -->
    <div class="modal fade" id="portModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">Port Info</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form class="needs-validation" id="needs-validation" novalidate>
                        <div class="form-group">
                            <label for="portName" class="form-label">Port Name <span class="text-danger">*</span></label>
                            <input type="text" class="form-control portName" id="portName" required>
                            <div class="invalid-feedback">
                                Please enter Port Name
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="portArabicName" class="form-label">Port Arabic Name <span class="text-danger">*</span></label>
                            <input type="text" class="form-control portArabicName" id="portArabicName" required>
                            <div class="invalid-feedback">
                                Please enter Port Arabic Name
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <button class="btn btn-primary" id="addPort" type="submit">Add</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>



    <table id="datatable" class="display text-center" style="width:100%">
        <thead>
        <tr>
            <th>Port Name</th>
            <th>Port Arabic Name</th>
            <th>Action</th>
        </tr>
        </thead>
        <tbody>
        @foreach($ports as $port)
            <tr>
                <input type="hidden" class="delete_val" value="{{$port->id}}">
                <td>{{$port->port_name}}</td>
                <td>{{$port->port_arabic_name}}</td>
                <td>
                    <a href="{{url('/admin/port/'.$port->id)}}" class="btn text-primary pl-1 pr-1 m-0 editPort" data-toggle="modal" data-target="#portEditModal">
                        <i class="fas fa-edit fa-lg"></i>
                    </a>
                    <form action="{{url('/admin/port/'.$port->id)}}" method="POST" class="d-inline">
                        @csrf
                        @method('DELETE')
                        <button type="button" class="btn text-danger pl-1 pr-1 m-0 portDeleteBtn">
                            <i class="fas fa-trash fa-lg"></i>
                        </button>
                    </form>
                </td>
            </tr>
        @endforeach
        </tbody>
        <tfoot>
        <tr>
            <th>Port Name</th>
            <th>Port Arabic Name</th>
            <th>Action</th>
        </tr>
        </tfoot>
    </table>

    <!-- Modal -->
    <div class="modal fade" id="portEditModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">Edit Port Info</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form class="needs-validation" id="editPortForm" novalidate>
                        <input type="hidden" id="editPortId">
                        <div class="form-group">
                            <label for="editPortName" class="form-label">Port Name <span class="text-danger">*</span></label>
                            <input type="text" class="form-control" id="editPortName" required>
                            <div class="invalid-feedback">
                                Please enter Port Name
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="editArabicName" class="form-label">Port Arabic Name <span class="text-danger">*</span></label>
                            <input type="text" class="form-control" id="editArabicName" required>
                            <div class="invalid-feedback">
                                Please enter Port Arabic Name
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <button class="btn btn-primary edit-port" type="submit">Save Changes</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
