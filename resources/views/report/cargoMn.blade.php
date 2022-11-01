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
    <style>
        th {
            font-size: 14px;
        }
        @media print {
            textarea {
                resize: none;
            }
        }
    </style>
</head>
@include('layouts.printbtn')
<body>
<div class="container-fluid">
    <div class="row">
        <div class="text-center">
            <h4>CARGO MANIFEST</h4>
        </div>
    </div>
    <div class="row">
        <div class="col-6">
            <div class="row">
                <div class="col-4">
                    <p>{{$manifest->trip->ship->shiptype->ship_type_ab}}</p>
                </div>
                <div class="col-8">
                    <p>{{$manifest->trip->ship->ship_name}}</p>
                </div>
            </div>
            <div class="row">
                <div class="col-4">
                    <p>FLAG:</p>
                </div>
                <div class="col-8">
                    <p>{{$manifest->trip->ship->flag}}</p>
                </div>
            </div>
            <div class="row">
                <div class="col-4">
                    <p>SAILING DATE:</p>
                </div>
                <div class="col-8">
                    @php
                        $date=date_create($manifest->sailing_date);
                        echo date_format($date,"d-m-Y");
                    @endphp
                </div>
            </div>
        </div>
        <div class="col-6">
            <div class="row">
                <div class="col-4">
                    <p>PORT OF LOADING:</p>
                </div>
                <div class="col-8">
                    <p>{{$manifest->loading_port}}</p>
                </div>
            </div>
            <div class="row">
                <div class="col-4">
                    <p>PORT OF DISCHARGING:</p>
                </div>
                <div class="col-8">
                    <p>{{$manifest->discharging_port}}</p>
                </div>
            </div>
            <div class="row">
                <div class="col-4">
                    <p>CAPTAIN'S NAME:</p>
                </div>
                <div class="col-8">
                    <p>{{$manifest->trip->captain_name}}</p>
                </div>
            </div>
        </div>
    </div>
    <div class="row mx-2">
        <table class="table text-center">
            <thead>
            <th class="border border-dark" style="text-decoration: underline; width: 5%;">
                B/L NO.
            </th>
            <th class="border border-dark" style="text-decoration: underline; width: 15%;">
                SHIPPER
            </th>
            <th class="border border-dark" style="text-decoration: underline; width: 15%;">
                CONSIGNEE
            </th>
            <th class="border border-dark" colspan="2" style="text-decoration: underline; width: 15%;">
                QUANTITY
            </th>
            <th class="border border-dark" style="text-decoration: underline; width: 10%;">
                CARGO
            </th>
            <th class="border border-dark" style="text-decoration: underline; width: 30%;">
                DESCRIPTIONS
            </th>
            <th class="border border-dark" style="text-decoration: underline; width: 10%;">
                WEIGHT (MTS)
            </th>
            </thead>
            <tbody>
            @php
                $weight = 0;
                $quantity = 0;
            @endphp
            @foreach($manifest->bills as $bill)
                <tr class="border border-dark">
                    <td class="border border-dark">{{$bill->billnb}}</td>
                    <td class="border border-dark">{{$bill->shipper}}</td>
                    <td class="border border-dark">{{$bill->consignee}}</td>
                    <td class="border border-dark">
                        {{$bill->quantity}}
                        @php $quantity = $quantity + $bill->quantity; @endphp
                    </td>
                    <td>{{$bill->package->package_name}}</td>
                    <td style="border: 1px solid black;">{{$bill->cargo->cargo_name}}</td>
                    <td class="border border-dark"><textarea class="border-0" style="width: 100%;"></textarea></td>
                    <td class="border border-dark">
                        {{$bill->weight}}
                        @php $weight = $weight + $bill->weight; @endphp
                    </td>
                </tr>
            @endforeach
            <tr>
                <td class="border-0"></td>
                <td class="border-0"></td>
                <td class="border-0"></td>
                <td class="border-0" style="font-weight: bold">TOTAL: {{$quantity}}</td>
                <td class="border-0"></td>
                <td class="border-0"></td>
                <td class="border-0" style="font-weight: bold; text-align: right" colspan="2">TOTAL: {{$weight}} MT</td>
            </tr>
            </tbody>
        </table>
    </div>
    <div class="row">
        <div class="col-2"></div>
        <div class="col-2"></div>
        <div class="col-2"></div>
        <div class="col-2"></div>
        <div class="col-2"></div>
        <div class="col-2">
            <p style="text-decoration: underline; font-size: 24px">MASTER</p>
        </div>
    </div>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
