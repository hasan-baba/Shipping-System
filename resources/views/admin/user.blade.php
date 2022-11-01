@extends('layouts.master')
@section('title')
    | User
@endsection
@section('content')
    <p class="h4">User</p>

    <!-- Button trigger modal -->
    <button type="button" class="btn btn-primary mb-4" data-toggle="modal" data-target="#userModal">
        Add New User
    </button>

    <!-- Add User Modal -->
    <div class="modal fade" id="userModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">User Info</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form class="needs-validation" id="addUserForm" novalidate>
                        @csrf
                        <div class="form-group">
                            <label>Email address <span class="text-danger">*</span></label>
                            <input type="email" class="form-control" name="email" required>
                            <div class="invalid-feedback">
                                Required
                            </div>
                        </div>
                        <div class="form-group">
                            <label>User Name <span class="text-danger">*</span></label>
                            <input type="text" class="form-control" name="user" required>
                            <div class="invalid-feedback">
                                Required
                            </div>
                        </div>
                        <div class="form-group">
                            <label>Password <span class="text-danger">*</span></label>
                            <input type="password" class="form-control" name="password" required>
                            <div class="invalid-feedback">
                                Required
                            </div>
                        </div>
                        <div class="form-group">
                            <label>Confirm Password <span class="text-danger">*</span></label>
                            <input type="password" class="form-control" required>
                            <div class="invalid-feedback">
                                Required
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <button class="btn btn-primary" id="addNewUser" type="submit">Add User</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <div class="pt-4">
        <table id="datatable" class="display text-center" style="width:100%">
            <thead>
            <tr>
                <th>User Name</th>
                <th>User Email</th>
                <th>Action</th>
            </tr>
            </thead>
            <tbody>
            @foreach($users as $user)
                <tr>
                    <input type="hidden" id="user_id" value="{{$user->id}}">
                    <td>{{$user->name}}</td>
                    <td>{{$user->email}}</td>
                    <td>
                        <a href="{{url('/admin/user/'.$user->id)}}" class="btn text-primary pl-1 pr-1 m-0" id="editUser" data-toggle="modal" data-target="#userEditModal">
                            <i class="fas fa-edit fa-lg"></i>
                        </a>
                        <form action="{{url('/admin/user/'.$user->id)}}" method="POST" class="d-inline">
                            @csrf
                            @method('DELETE')
                            <button type="button" class="btn text-danger pl-1 pr-1 m-0" id="userDeleteBtn">
                                <i class="fas fa-trash fa-lg"></i>
                            </button>
                        </form>
                    </td>
                </tr>
            @endforeach
            </tbody>
            <tfoot>
            <tr>
                <th>User Name</th>
                <th>User Email</th>
                <th>Action</th>
            </tr>
            </tfoot>
        </table>
    </div>

    <!-- Edit User Modal -->
    <div class="modal fade" id="userEditModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">Edit User Info</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form class="needs-validation" id="editUserForm" novalidate>
                        @csrf
                        <div class="form-group">
                            <label>Email address <span class="text-danger">*</span></label>
                            <input type="hidden" id="userID">
                            <input type="email" class="form-control" id="editUserEmail" name="editEmail" required>
                            <div class="invalid-feedback">
                                Required
                            </div>
                        </div>
                        <div class="form-group">
                            <label>User Name <span class="text-danger">*</span></label>
                            <input type="text" class="form-control" id="editUserName" name="editUser" required>
                            <div class="invalid-feedback">
                                Required
                            </div>
                        </div>
                        <div class="form-group">
                            <label>Password</label>
                            <input type="text" class="form-control" id="editPassword" name="editPassword" placeholder="Update Password">
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <button class="btn btn-primary" id="updateUser" type="submit">Save Changes</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
