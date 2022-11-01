<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Document</title>
    <!-- CSS only -->
    <link
        href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css"
        rel="stylesheet"
    />
</head>
@include('layouts.printbtn')
<body>
<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            @php
                $today = date('d/m/Y');
            @endphp
            <p>{{$trip->port->port_name}} {{$today}}</p>
        </div>
    </div>
    <div class="row">
        <div class="col-12">
            <p style="text-align: left">{{$trip->ship->shiptype->ship_type_ab}}: {{$trip->ship->ship_name}}</p>
            <p style="text-align: left">Flag: {{$trip->ship->flag}}</p>
        </div>
    </div>
    <div class="row">
        <h3 style="text-align: center">Motor <span style="text-transform: capitalize;">{{$motorType}}</span> Hire</h3>
    </div>
    <div class="row">
        <div class="col-">
            <p style="text-align: left;">
                .THIS IS TO CERTIFY THAT ONE MOTOR <span class="text-uppercase">{{$motorType}}</span> WAS AT THE DISPOSAL OF
                SHIP’S AGENT FOR HANDLING OF THIS VESSEL ON THE FOLLOWING DATES
            </p>
        </div>
    </div>
    <div class="row">
        <div class="col-12">
            <p style="padding-right: 10%">Master</p>
        </div>
    </div>
</div>
</body>
<!-- JavaScript Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
</html>
