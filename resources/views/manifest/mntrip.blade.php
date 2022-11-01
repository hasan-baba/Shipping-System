@extends('layouts.master')

@section('content')
    <div class="pb-4">
        <h3 class="title">List of Manifest of Trip Number <span class="text-primary">{{$tripNB}}</span></h3>
    </div>
    <table id="datatableManifest" class="display nowrap text-center" style="width:100%">
        <thead>
        <tr>
            <th>Action</th>
            <th>Print</th>
            <th>Bill of Lading</th>
            <th>Transit</th>
            <th>Trip Number</th>
            <th>Loading Port</th>
            <th>Sailing Date</th>
            <th>Discharging Port</th>
            <th>Next Discharging Port</th>
            <th>Process</th>
        </tr>
        </thead>
        <tbody>
        @foreach($mnifest as $mn)
            <tr>
                <td>
                    <a href="#" class="btn text-primary pl-1 pr-1 m-0" data-toggle="modal" data-target="#update-manifest" id="editManifest">
                        <i class="fas fa-edit fa-lg"></i>
                    </a>
                    <form action="{{url('/admin/manifest/'.$mn->id)}}" method="POST" class="d-inline">
                        @csrf
                        @method('DELETE')
                        <button type="button" class="btn text-danger pl-1 pr-1 m-0" id="manifestID">
                            <i class="fas fa-trash fa-lg"></i>
                        </button>
                    </form>
                </td>
                <td>
                    <a href="{{url('/admin/printmn?mn='.$mn->id)}}" class="btn btn-primary m-0" id="print">
                        Print
                    </a>
                </td>
                <td>
                    <a href="{{url('/admin/mnlist?manifest='.$mn->id)}}" class="btn btn-primary m-0">
                        <i class="fas fa-file-alt"></i> View Bills
                    </a>
                </td>
                <td>
                    <a href="{{url('/admin/transitlist?manifest='.$mn->id)}}" class="btn btn-primary m-0">
                        <i class="fas fa-file-alt"></i> Transit
                    </a>
                </td>
                <input type="hidden" id="manifestId" value="{{$mn->id}}">
                <td>{{$mn->trip->trip_number}}</td>
                <td>{{$mn->loading_port}}</td>
                <td>{{$mn->sailing_date}}</td>
                <td>{{$mn->discharging_port}}</td>
                <td>{{$mn->next_discharging_port}}</td>
                <td>{{$mn->process}}</td>
            </tr>
        @endforeach
        </tbody>
        <tfoot>
        <tr>
            <th>Action</th>
            <th>Print</th>
            <th>Bill of Lading</th>
            <th>Transit</th>
            <th>Trip Number</th>
            <th>Loading Port</th>
            <th>Sailing Date</th>
            <th>Discharging Port</th>
            <th>Next Discharging Port</th>
            <th>Process</th>
        </tr>
        </tfoot>
    </table>

    <!-- Modal -->
    <div class="modal fade" id="update-manifest" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">Update Manifest Info</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form class="needs-validation" id="updateManifest" novalidate>
                        <div class="form-row">
                            <div class="col-md-6 mb-3">
                                <input type="hidden" name="manifest-id" id="update_mn_id">
                                <label for="validationCustom01">Loading Port</label>
                                <input type="text" class="form-control" name="update-load-port" id="update_load_port" required>
                                <div class="invalid-feedback">
                                    Required
                                </div>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="validationCustom02">Sailing Date</label>
                                <input type="date" class="form-control" name="update-sailing-date" id="update_sail" required>
                                <div class="invalid-feedback">
                                    Required
                                </div>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="validationCustom02">Discharging Port</label>
                                <input type="text" class="form-control" name="update-discharging-port" id="update_dis_port" required>
                                <div class="invalid-feedback">
                                    Required
                                </div>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="validationCustom02">Next Discharging Port</label>
                                <input type="text" class="form-control" name="update-next-discharging-port" id="update_next_port" required>
                                <div class="invalid-feedback">
                                    Required
                                </div>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="validationCustom02">Process</label>
                                <select class="form-control" name="update-process" id="update_process" required>
                                    <option value=""></option>
                                    <option value="Discharge">Discharge</option>
                                    <option value="Load">Load</option>
                                </select>
                                <div class="invalid-feedback">
                                    Required
                                </div>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="validationCustom02">Total Quantity</label>
                                <input type="text" class="form-control" name="update-total-qty" id="update_qty">
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="validationCustom02">Total Weight</label>
                                <input type="text" class="form-control" name="update-total-weight" id="update_wght">
                            </div>
                        </div>
                        <button class="btn btn-primary float-right" type="submit" id="update_Manifest">Update Manifest</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
