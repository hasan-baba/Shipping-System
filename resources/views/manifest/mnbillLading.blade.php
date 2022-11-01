@extends('layouts.master')

@section('content')
    <div class="pb-4">
        <h3 class="title">Bill of Lading of Manifest <span class="text-primary">{{$manifestId}}</span></h3>
    </div>
    <button class="btn btn-primary mb-4 float-right" type="button" data-toggle="modal" data-target="#billofLadingModal">Add New Bill of Lading</button>

    <table id="datatableManifest" class="display nowrap text-center" style="width:100%">
        <thead>
        <tr>
            <th>Action</th>
            <th>Shipper</th>
            <th>Consignee</th>
            <th>Notify</th>
            <th>Cargo</th>
            <th>Package</th>
            <th>Quantity</th>
            <th>Weight</th>
        </tr>
        </thead>
        <tbody>
        @foreach($billLading as $bill)
            <tr>
                <input type="hidden" id="billID" value="{{$bill->id}}">
                <td>
                    <a href="#" class="btn text-primary pl-1 pr-1 m-0" data-toggle="modal" data-target="#update-bill" id="editBill">
                        <i class="fas fa-edit fa-lg"></i>
                    </a>
                    <form action="{{url('/admin/billoflading/'.$bill->id)}}" method="POST" class="d-inline">
                        @csrf
                        @method('DELETE')
                        <button type="button" class="btn text-danger pl-1 pr-1 m-0" id="deleteBill">
                            <i class="fas fa-trash fa-lg"></i>
                        </button>
                    </form>
                </td>
                <td>{{$bill->shipper}}</td>
                <td>{{$bill->consignee}}</td>
                <td>{{$bill->notify}}</td>
                <td>{{$bill->cargo->cargo_name}}</td>
                <td>{{$bill->package->package_name}}</td>
                <td>{{$bill->quantity}}</td>
                <td>{{$bill->weight}}</td>
            </tr>
        @endforeach
        </tbody>
        <tfoot>
        <tr>
            <th>Action</th>
            <th>Shipper</th>
            <th>Consignee</th>
            <th>Notify</th>
            <th>Cargo</th>
            <th>Package</th>
            <th>Quantity</th>
            <th>Weight</th>
        </tr>
        </tfoot>
    </table>

    <!-- Add Bill of Lading Modal -->
    <div class="modal fade" id="billofLadingModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">Add Bill of Lading Info</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form class="needs-validation" id="billofLadingForm" novalidate>
                        <div class="form-row">
                            <div class="col-md-6 pb-2">
                                <input type="hidden" value="{{$manifestId}}" name="manifest_id">
                                <label for="validationCustom01">Shipper <span class="text-danger">*</span></label>
                                <input type="hidden" name="tripId" value="">
                                <input type="text" class="form-control" name="shipper" id="validationCustom01" required>
                                <div class="invalid-feedback">
                                    Required
                                </div>
                            </div>
                            <div class="col-md-6 pb-2">
                                <label for="validationCustom01">Consignee <span class="text-danger">*</span></label>
                                <input type="text" class="form-control" name="consignee" id="validationCustom01" required>
                                <div class="invalid-feedback">
                                    Required
                                </div>
                            </div>
                            <div class="col-md-6 pb-2">
                                <label for="validationCustom02">Notify</label>
                                <input type="text" class="form-control" name="notify" id="validationCustom02">
                            </div>
                            <div class="col-md-6 pb-2">
                                <label for="validationCustom02">Cargo <span class="text-danger">*</span></label>
                                <select class="form-control" name="cargo_id" id="validationCustom02" required>>
                                    <option value=""></option>
                                    @foreach($cargos as $cargo)
                                        <option value="{{$cargo->id}}">{{$cargo->cargo_name}}</option>
                                    @endforeach
                                </select>
                                <div class="invalid-feedback">
                                    Required
                                </div>
                            </div>
                            <div class="col-md-4 pb-2">
                                <label for="validationCustom02">Package <span class="text-danger">*</span></label>
                                <select class="form-control" name="package_id" id="bulk-qty" required>
                                    <option value=""></option>
                                    @foreach($packages as $package)
                                        <option value="{{$package->id}}">{{$package->package_name}}</option>
                                    @endforeach
                                </select>
                                <div class="invalid-feedback">
                                    Required
                                </div>
                            </div>
                            <div class="col-md-4 pb-2">
                                <label for="validationCustom02">Quantity <span class="text-danger">*</span></label>
                                <input type="number" class="form-control" name="quantity" id="qty-bill" required>
                                <div class="invalid-feedback">
                                    Required
                                </div>
                            </div>
                            <div class="col-md-4 pb-2">
                                <label for="validationCustom02">Weight <span class="text-danger">*</span></label>
                                <input type="number" class="form-control" name="weight" id="validationCustom02" required>
                                <div class="invalid-feedback">
                                    Required
                                </div>
                            </div>
                        </div>
                        <button class="btn btn-primary" type="submit" id="addNewBillLading">Add Bill of Lading</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- Edit Bill of Lading Modal -->
    <div class="modal fade" id="update-bill" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">Add Bill of Lading Info</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form class="needs-validation" id="updateBillofLadingForm" novalidate>
                        <div class="form-row">
                            <div class="col-md-12 pb-2">
                                <label for="validationCustom01">Bill of lading Number</label>
                                <input type="text" class="form-control" name="billofladingnb" id="update_billnb">
                            </div>
                            <div class="col-md-6 pb-2">
                                <input type="hidden" id="billLadingID" name="bill_id" value="">
                                <label for="validationCustom01">Shipper</label>
                                <input type="text" class="form-control" name="shipper" id="update_shipper" required>
                                <div class="invalid-feedback">
                                    Required
                                </div>
                            </div>
                            <div class="col-md-6 pb-2">
                                <label for="validationCustom01">Consignee</label>
                                <input type="text" class="form-control" name="consignee" id="update_consignee" required>
                                <div class="invalid-feedback">
                                    Required
                                </div>
                            </div>
                            <div class="col-md-6 pb-2">
                                <label for="validationCustom02">Notify</label>
                                <input type="text" class="form-control" name="notify" id="update_notify" required>
                                <div class="invalid-feedback">
                                    Required
                                </div>
                            </div>
                            <div class="col-md-6 pb-2">
                                <label for="validationCustom02">Cargo</label>
                                <select class="form-control" name="cargo_id" id="update_cargo" required>>
                                    <option value=""></option>
                                    @foreach($cargos as $cargo)
                                        <option value="{{$cargo->id}}">{{$cargo->cargo_name}}</option>
                                    @endforeach
                                </select>
                                <div class="invalid-feedback">
                                    Required
                                </div>
                            </div>
                            <div class="col-md-4 pb-2">
                                <label for="validationCustom02">Package</label>
                                <select class="form-control" name="package_id" id="update_package" required>
                                    <option value=""></option>
                                    @foreach($packages as $package)
                                        <option value="{{$package->id}}">{{$package->package_name}}</option>
                                    @endforeach
                                </select>
                                <div class="invalid-feedback">
                                    Required
                                </div>
                            </div>
                            <div class="col-md-4 pb-2">
                                <label for="validationCustom02">Quantity</label>
                                <input type="text" class="form-control" name="quantity" id="update_qty" required>
                                <div class="invalid-feedback">
                                    Required
                                </div>
                            </div>
                            <div class="col-md-4 pb-2">
                                <label for="validationCustom02">Weight</label>
                                <input type="text" class="form-control" name="weight" id="update_wght" required>
                                <div class="invalid-feedback">
                                    Required
                                </div>
                            </div>
                        </div>
                        <button class="btn btn-primary float-right" type="submit" id="update_bill_of_lading">Save Changes</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
