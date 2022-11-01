@extends('layouts.master')

@section('content')
    <div class="pb-4">
        <h3 class="title">Transit of Manifest <span class="text-primary">{{$manifestId}}</span></h3>
    </div>
    <button class="btn btn-primary mb-4 float-right" type="button" id="new_transit" data-toggle="modal" data-target="#transitModal">Add New Transit</button>

    <table id="datatableManifest" class="display nowrap text-center" style="width:100%">
        <thead>
        <tr>
            <th>Action</th>
            <th>Transit Quantity</th>
            <th>Transit Weight</th>
            <th>Transit Package</th>
            <th>Transit Cargo</th>
        </tr>
        </thead>
        <tbody>
        @foreach($transits as $transit)
            <tr>
                <input type="hidden" value="{{$transit->id}}" id="transit_id">
                <td>
                    <a href="#" class="btn text-primary pl-1 pr-1 m-0" data-toggle="modal" data-target="#update-transit" id="editTransit">
                        <i class="fas fa-edit fa-lg"></i>
                    </a>
                    <form action="{{url('/admin/transit/'.$transit->id)}}" method="POST" class="d-inline">
                        @csrf
                        @method('DELETE')
                        <button type="button" class="btn text-danger pl-1 pr-1 m-0" id="deleteTransit">
                            <i class="fas fa-trash fa-lg"></i>
                        </button>
                    </form>
                </td>
                <td>{{$transit->transitQty}}</td>
                <td>{{$transit->transitWeight}}</td>
                <td>{{$transit->transitPack}}</td>
                <td>{{$transit->transitCargo}}</td>
            </tr>
        @endforeach
        </tbody>
        <tfoot>
        <tr>
            <th>Action</th>
            <th>Transit Quantity</th>
            <th>Transit Weight</th>
            <th>Transit Package</th>
            <th>Transit Cargo</th>
        </tr>
        </tfoot>
    </table>

    <!-- Add Transit Modal -->
    <div class="modal fade" id="transitModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">Add Transit Info</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form class="needs-validation" id="add_transit" novalidate>
                        <div class="form-row">
                            <div class="col-md-6 mb-3">
                                <input type="hidden" name="manifest_id" value="{{$manifestId}}">
                                <label for="validationCustom01">Transit Quantity</label>
                                <input type="number" class="form-control" name="trns_qty" id="trns_qty" required>
                                <div class="invalid-feedback">
                                    Required
                                </div>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="validationCustom02">Transit Weight</label>
                                <input type="number" class="form-control" name="trns_weight" id="trns_weight" required>
                                <div class="invalid-feedback">
                                    Required
                                </div>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="validationCustom02">Transit Pack</label>
                                <input type="text" class="form-control" name="trns_pack" id="trns_pack" required>
                                <div class="invalid-feedback">
                                    Required
                                </div>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="validationCustom02">Transit Cargo</label>
                                <input type="text" class="form-control" name="trns_cargo" id="trns_cargo" required>
                                <div class="invalid-feedback">
                                    Required
                                </div>
                            </div>
                        </div>
                        <button class="btn btn-primary float-right" type="submit" id="add_trans">Save Transit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Edit Transit Modal -->
    <div class="modal fade" id="update-transit" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">Transit Info</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form class="needs-validation" id="updateTransit" novalidate>
                        <div class="form-row">
                            <div class="col-md-6 mb-3">
                                <input type="hidden" name="transitID" id="tnstID" value="">
                                <input type="hidden" name="manifestID" id="mnID" value="">
                                <label for="validationCustom01">Transit Quantity</label>
                                <input type="number" class="form-control" name="transitQty" id="transit_Qty" required>
                                <div class="invalid-feedback">
                                    Required
                                </div>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="validationCustom02">Transit Weight</label>
                                <input type="number" class="form-control" name="transitWght" id="transit_Wght" required>
                                <div class="invalid-feedback">
                                    Required
                                </div>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="validationCustom02">Transit Pack</label>
                                <input type="text" class="form-control" name="transitPack" id="transit_Pack" required>
                                <div class="invalid-feedback">
                                    Required
                                </div>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="validationCustom02">Transit Cargo</label>
                                <input type="text" class="form-control" name="transitCargo" id="transit_Cargo" required>
                                <div class="invalid-feedback">
                                    Required
                                </div>
                            </div>
                        </div>
                        <button class="btn btn-primary float-right" type="submit" id="update_transit">Save Transit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
