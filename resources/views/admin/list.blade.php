@extends('layouts.master')
@section('content')
    <p class="h4">Dashboard</p>
    <div class="pt-4">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h5 class="card-category">Trips of the Month</h5>
                        <h4 class="card-title"> Trips <a href="/admin/trip" class="btn btn-primary float-right">View Trips</a> </h4>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table text-center">
                                <thead class=" text-primary">
                                    <tr>
                                        <th>Trip Number</th>
                                        <th>Ship Name</th>
                                        <th>Arrival Date</th>
                                        <th>Arrival Port</th>
                                        <th>Cargo</th>
                                    </tr>
                                </thead>
                                <tbody>
                                @foreach($trips as $trip)
                                <tr>
                                    <td>{{$trip->trip_number}}</td>
                                    <td>{{$trip->ship->ship_name}}</td>
                                    <td>
                                        @php
                                            $date=date_create($trip->expected_arrival_date);
                                            echo date_format($date,"d-m-Y");
                                        @endphp
                                    </td>
                                    <td>{{$trip->port->port_name}}</td>
                                    <td>{{$trip->cargo->cargo_name}}</td>
                                </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
