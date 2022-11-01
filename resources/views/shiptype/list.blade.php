@extends('layouts.master')
@section('title')
    | Ship Type
@endsection
@section('content')
    <p class="h4">Ship Types</p>
    <!-- Button trigger modal -->
    <button type="button" class="btn btn-primary mb-4" data-toggle="modal" data-target="#shiptypeModal">
        Add New Ship Type
    </button>

    <!-- Modal -->
    <div class="modal fade" id="shiptypeModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
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
                        <div class="form-group">
                            <label for="shiptypeName" class="form-label">Ship Type Name <span class="text-danger">*</span></label>
                            <input type="text" class="form-control shiptypeName" id="shiptypeName" required>
                            <div class="invalid-feedback">
                                Please enter Ship Type Name
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="shiptypeAB" class="form-label">Ship Type AB <span class="text-danger">*</span></label>
                            <input type="text" class="form-control shiptypeAB" id="shiptypeAB" required>
                            <div class="invalid-feedback">
                                Please enter Ship Type AB
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <button class="btn btn-primary" id="addShipType" type="submit">Add</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>



    <table id="datatable" class="display text-center" style="width:100%">
        <thead>
        <tr>
            <th>Ship Type Name</th>
            <th>Ship Type AB</th>
            <th>Action</th>
        </tr>
        </thead>
        <tbody>
        @foreach($shiptypes as $shiptype)
            <tr>
                <input type="hidden" class="delete_val" id="ship_type_id" value="{{$shiptype->id}}">
                <td>{{$shiptype->ship_type_name}}</td>
                <td>{{$shiptype->ship_type_ab}}</td>
                <td>
                    <a href="{{url('/admin/shiptype/'.$shiptype->id)}}" class="btn text-primary pl-1 pr-1 m-0 editShipType" data-toggle="modal" data-target="#shiptypeEditModal">
                        <i class="fas fa-edit fa-lg"></i>
                    </a>
                    <form action="{{url('/admin/shiptype/'.$shiptype->id)}}" method="POST" class="d-inline">
                        @csrf
                        @method('DELETE')
                        <button type="button" class="btn text-danger pl-1 pr-1 m-0 shipTypeDeleteBtn">
                            <i class="fas fa-trash fa-lg"></i>
                        </button>
                    </form>
                </td>
            </tr>
        @endforeach
        </tbody>
        <tfoot>
        <tr>
            <th>Ship Type Name</th>
            <th>Ship Type AB</th>
            <th>Action</th>
        </tr>
        </tfoot>
    </table>

    <!-- Modal -->
    <div class="modal fade" id="shiptypeEditModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">Edit Ship Type Info</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form class="needs-validation" id="editShipTypeForm" novalidate>
                        <input type="hidden" id="editShipTypeId">
                        <div class="form-group">
                            <label for="editShipTypeName" class="form-label">Ship Type Name <span class="text-danger">*</span></label>
                            <input type="text" class="form-control" id="editShipTypeName" required>
                            <div class="invalid-feedback">
                                Please enter Ship Type Name
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="editShipTypeAB" class="form-label">Ship Type AB <span class="text-danger">*</span></label>
                            <input type="text" class="form-control" id="editShipTypeAB" required>
                            <div class="invalid-feedback">
                                Please enter Ship Type AB
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <button class="btn btn-primary edit-shiptype" type="submit">Save Changes</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
