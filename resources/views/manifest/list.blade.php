@extends('layouts.master')
@section('title')
    | Manifest
@endsection
@section('content')
    <p class="h4">Manifests</p>
    <div class="pt-4">
        <table id="datatable" class="display text-center" style="width:100%">
            <thead>
            <tr>
                <th>Trip ID</th>
                <th>Ship Name</th>
                <th>Port Name</th>
                <th>Cargo</th>
                <th>Receivers</th>
                <th>Action</th>
            </tr>
            </thead>
            <tbody>
            @foreach($trips as $trip)
                <tr>
                    <input type="hidden" class="delete_val" value="{{$trip->id}}">
                    <td>{{$trip->trip_number}}</td>
                    <td>{{$trip->ship->ship_name}}</td>
                    <td>{{$trip->port->port_name}}</td>
                    <td>{{$trip->cargo->cargo_name}}</td>
                    <td>{{$trip->company_recieving}}</td>
                    <td>
                        <a href="{{url('/admin/addmn?trip='.$trip->id)}}" class="btn btn-primary m-0">
                            <i class="fas fa-plus"></i> Add
                        </a>
                        <a href="{{url('/admin/tripmnlist?trip='.$trip->id)}}" class="btn btn-primary m-0">
                            <i class="fas fa-file-alt"></i> Manifest
                        </a>
                    </td>
                </tr>
            @endforeach
            </tbody>
            <tfoot>
            <tr>
                <th>Trip ID</th>
                <th>Ship Name</th>
                <th>Port Name</th>
                <th>Cargo</th>
                <th>Receivers</th>
                <th>Action</th>
            </tr>
            </tfoot>
        </table>
    </div>
@endsection
