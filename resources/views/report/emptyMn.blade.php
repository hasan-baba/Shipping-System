<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Document</title>
    <link
        href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css"
        rel="stylesheet"
    />
</head>
@include('layouts.printbtn')
<body>
<div class="container-fluid">
    <div class="row">
        <div class="col-6">
            <h5>MUSTAFA TIRIAKY & SONS</h5>
        </div>
        <div class="col-6" dir="rtl">
            <h5>مصطفى الترياقي واولاده</h5>
        </div>
    </div>
    <div class="row">
        <div class="col-6">
            <h5 style="margin-left: 3rem;">SHIPPING AGENCY</h5>
        </div>
        <div class="col-6" dir="rtl">
            <h5 style="margin-right: 3rem;">وكيل بواخر</h5>
        </div>
    </div>
    <div class="row">
        <div class="col-6">
            <h5 style="margin-left: 3rem;">SIDON LIBANON</h5>
        </div>
        <div class="col-6" dir="rtl">
            <h5 style="margin-right: 3rem;">صيدا - لبنان</h5>
        </div>
    </div>
    <div class="row">
        <div class="col-6">
            <h5>TELEFAX : + 961 7 720 715</h5>
        </div>
        <div class="col-6" dir="rtl">
            <h5 style="text-align: end;">مانيفستو</h5>
        </div>
    </div>
    <div class="row">
        <div class="col-4">
            <h5>MOBILE : + 961 3 386 399</h5>
            <h5 style="margin-left: 88px;">+ 961 3 387715</h5>
        </div>
        <div class="col-8">
            <h5 style="margin-left:6rem">CARGO MANIFEST</h5>
        </div>
    </div>
    <div class="row">
        <div class="col-6">
            <p>{{$manifest->trip->ship->shiptype->ship_type_ab}} <span>{{$manifest->trip->ship->ship_name}}</span> </p>
        </div>
        <div class="col-6">
            <p>PORT OF DISCHARGE: <span>{{$manifest->discharging_port}}</span>  </p>
        </div>
    </div>
    <div class="row">
        <div class="col-6">
            <p>FLAG: <span>{{$manifest->trip->ship->flag}}</span> </p>
        </div>
        <div class="col-6">
            <p>CAPTAIN'S NAME: <span>{{$manifest->trip->captain_name}}</span>  </p>
        </div>
    </div>
    <div class="row">
        <div class="col-6">
            <p>DATE: <span>{{$manifest->trip->departure_date}}</span> </p>
        </div>
    </div>
    <p style="position: relative; bottom: -8rem; left: 36%; font-size: 20px;">EMPTY FROM {{$manifest->trip->port->port_name}} TO {{$manifest->trip->ship_heading_to}}</p>
    <table class="table table-bordered" border="1" style="position: relative;">
        <thead>
        <th>REMARKS</th>
        <th>B/L NO.</th>
        <th>SHIPPER NAME</th>
        <th>CONSIGNEE <span>QUANTITY</span> </th>
        <th>DESCRIPTION</th>
        <th>WEIGHT (MTS)</th>
        </thead>
        <tbody>
        @for($i=0; $i<7; $i++)
        <tr class="border-0">
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
        </tr>
        @endfor
        </tbody>
    </table>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
