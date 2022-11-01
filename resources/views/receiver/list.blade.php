@extends('layouts.master')
@section('title')
    | Receiver
@endsection
@section('content')
    <p class="h4">Receivers</p>
    <!-- Button trigger modal -->
    <button type="button" class="btn btn-primary mb-4" data-toggle="modal" data-target="#receiverModal">
        Add New Receiver
    </button>

    <!-- Modal -->
    <div class="modal fade" id="receiverModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">Receiver Info</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form class="needs-validation" id="needs-validation" novalidate>
                        <div class="form-group">
                            <label for="receiverName" class="form-label">Receiver Name <span class="text-danger">*</span></label>
                            <input type="text" class="form-control receiverName" id="receiverName" required>
                            <div class="invalid-feedback">
                                Please enter Receiver Name
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="receiverCode" class="form-label">Receiver Code <span class="text-danger">*</span></label>
                            <input type="text" class="form-control receiverCode" id="receiverCode" required>
                            <div class="invalid-feedback">
                                Please enter Receiver Code
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <button class="btn btn-primary" id="addReceiver" type="submit">Add</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>



    <table id="datatable" class="display text-center" style="width:100%">
        <thead>
        <tr>
            <th>Receiver Name</th>
            <th>Receiver Code</th>
            <th>Action</th>
        </tr>
        </thead>
        <tbody>
        @foreach($receivers as $receiver)
            <tr>
                <input type="hidden" class="delete_val" value="{{$receiver->id}}">
                <td>{{$receiver->receiver_name}}</td>
                <td>{{$receiver->receiver_code}}</td>
                <td>
                    <a href="{{url('/admin/receiver/'.$receiver->id)}}" class="btn text-primary pl-1 pr-1 m-0 editReceiver" data-toggle="modal" data-target="#receiverEditModal">
                        <i class="fas fa-edit fa-lg"></i>
                    </a>
                    <form action="{{url('/admin/receiver/'.$receiver->id)}}" method="POST" class="d-inline">
                        @csrf
                        @method('DELETE')
                        <button type="button" class="btn text-danger pl-1 pr-1 m-0 receiverDeleteBtn">
                            <i class="fas fa-trash fa-lg"></i>
                        </button>
                    </form>
                </td>
            </tr>
        @endforeach
        </tbody>
        <tfoot>
        <tr>
            <th>Receiver Name</th>
            <th>Receiver Code</th>
            <th>Action</th>
        </tr>
        </tfoot>
    </table>

    <!-- Modal -->
    <div class="modal fade" id="receiverEditModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">Edit Receiver Info</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form class="needs-validation" id="editReceiverForm" novalidate>
                        <input type="hidden" id="editReceiverId">
                        <div class="form-group">
                            <label for="editReceiverName" class="form-label">Receiver Name <span class="text-danger">*</span></label>
                            <input type="text" class="form-control" id="editReceiverName" required>
                            <div class="invalid-feedback">
                                Please enter Receiver Name
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="editCode" class="form-label">Receiver Code <span class="text-danger">*</span></label>
                            <input type="text" class="form-control" id="editCode" required>
                            <div class="invalid-feedback">
                                Please enter Receiver Code
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <button class="btn btn-primary edit-receiver" type="submit">Save Changes</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
