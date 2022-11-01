@extends('layouts.master')

@section('content')
    <p class="h4">Bill of Lading</p>
    <form class="needs-validation pt-4" id="manifestForm" novalidate>
        <div class="form-row">
            <div class="col-md-6 pb-2">
                <label for="validationCustom01">Trip ID</label>
                <input type="hidden" name="tripId" value="{{$tripId}}">
                <input type="text" class="form-control" name="trip_number_id" id="validationCustom01" value="{{$tripNb->trip_number}}" readonly>
            </div>
            <div class="col-md-6 pb-2">
                <label for="validationCustom01">Loading Port <span class="text-danger">*</span></label>
                <input type="text" class="form-control" name="loading_port" id="validationCustom01" required>
                <div class="invalid-feedback">
                    Required
                </div>
            </div>
            <div class="col-md-6 pb-2">
                <label for="validationCustom02">Sailing Date <span class="text-danger">*</span></label>
                <input type="date" class="form-control" name="sailing_date" id="validationCustom02" required>
                <div class="invalid-feedback">
                    Required
                </div>
            </div>
            <div class="col-md-6 pb-2">
                <label for="validationCustom02">Discharging Port <span class="text-danger">*</span></label>
                <input type="text" class="form-control" name="discharging_port" id="validationCustom02" required>
                <div class="invalid-feedback">
                    Required
                </div>
            </div>
            <div class="col-md-6 pb-2">
                <label for="validationCustom02">Next Discharging Port <span class="text-danger">*</span></label>
                <input type="text" class="form-control" name="next_discharging_port" id="validationCustom02" required>
                <div class="invalid-feedback">
                    Required
                </div>
            </div>
            <div class="col-md-6 pb-2">
                <label for="validationCustom02">Process <span class="text-danger">*</span></label>
                <select class="form-control" name="process" required>
                    <option value=""></option>
                    <option value="Discharge">Discharge</option>
                    <option value="Load">Load</option>
                </select>
                <div class="invalid-feedback">
                    Required
                </div>
            </div>
        </div>
        <button class="btn btn-primary" type="submit" id="addManifest">Save Manifest</button>
    </form>
    <button class="btn btn-primary" type="button" id="addBillOfLading" data-toggle="modal" data-target="#billofLadingModal">Add Bill of Lading</button>
    <!-- Table -->
    <div class="container pt-5">
        <h3>Bill of Ladings</h3>
        <button type="button" class="btn btn-success" id="refreshDataTable">
            <i class="fas fa-sync"></i> Refresh
        </button>
        <div class="table-responsive">
            <table class="table table-striped table-bordered table-hover" style="overflow-x: scroll;" id="billLadingData">
                <thead>
                <tr>
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
                </tbody>
            </table>
        </div>
    </div>
    <!-- Bill of Lading Modal -->
    <div class="modal fade" id="billofLadingModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-xl" role="document">
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
                            <div class="col-md-12 pb-2">
                                <label for="validationCustom01">Bill of lading Number</label>
                                <input type="text" class="form-control" name="billofladingnb" id="validationCustom01">
                            </div>
                            <div class="col-md-6 pb-2">
                                <input type="hidden" name="manifest_id" id="insertedManifestID">
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
                                <input type="number" class="form-control" name="quantity" id="qty-bill" min="0" step="any" required>
                                <div class="invalid-feedback">
                                    Required
                                </div>
                            </div>
                            <div class="col-md-4 pb-2">
                                <label for="validationCustom02">Weight <span class="text-danger">*</span></label>
                                <input type="number" class="form-control" name="weight" id="validationCustom02" min="0" step="any" required>
                                <div class="invalid-feedback">
                                    Required
                                </div>
                            </div>
                        </div>
                        <button class="btn btn-primary" type="submit" id="addBillLading">Add Bill of Lading</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- Discharging Plan Modal -->
    <div class="modal fade" id="dischargingPlanModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">Discharging Plan</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form class="needs-validation" id="dischargingPlanForm" novalidate>
                        <div class="form-row">
                            <div class="col-md-12 pb-2">
                                <input type="hidden" name="bill_Lading_Discharging_Plan" id="billLadingDischargingPlan">
                                <label for="validationCustom01">Cargo</label>
                                <input type="text" class="form-control" name="" id="cargo_dis_plan" readonly>
                            </div>
                            <div class="col-md-6 pb-2">
                                <label for="validationCustom01">Total Quantity</label>
                                <input type="number" class="form-control" name="" id="qty_dis_plan" min="0" step="any" readonly>
                            </div>
                            <div class="col-md-6 pb-2">
                                <label for="validationCustom01">Total Weight</label>
                                <input type="text" class="form-control" name="" id="wght_dis_plan" readonly>
                            </div>
                            <div class="col-md-6 pb-2">
                                <label for="validationCustom01">Discharging Quantity <span class="text-danger">*</span></label>
                                <input type="number" class="form-control" name="dis_Qty" id="disQty" min="0" step="any" required>
                                <div class="invalid-feedback">
                                    Required
                                </div>
                            </div>
                            <div class="col-md-6 pb-2">
                                <label for="validationCustom01">Discharging Weight <span class="text-danger">*</span></label>
                                <input type="number" class="form-control" name="dis_Weight" id="disWeight" min="0" step="any" required>
                                <div class="invalid-feedback">
                                    Required
                                </div>
                            </div>
                            <div class="col-md-6 pb-2">
                                <label for="validationCustom01">Remaining Quantity</label>
                                <input type="number" class="form-control" name="" id="remainingQty" min="0" step="any" readonly>
                            </div>
                            <div class="col-md-6 pb-2">
                                <label for="validationCustom01">Remaining Weight</label>
                                <input type="number" class="form-control" name="" id="remainingWght" min="0" step="any" readonly>
                            </div>
                        </div>
                        <button class="btn btn-primary" type="submit" id="saveDischargingPlan">Save</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
