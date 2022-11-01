<!DOCTYPE html>
<html lang="ar">
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
@php
    $number_name = array(
            1 => 'ONE',
            2 => 'TWO',
            3 => 'THREE',
            4 => 'FOUR',
            5 => 'FIVE',
            6 => 'SIX',
            7 => 'SEVEN',
            8 => 'EIGHT',
            9 => 'NINE',
            10 => 'TEN',
            11 => 'ELEVEN',
            12 => 'TWELVE',
            13 => 'THIRTEEN',
            14 => 'FOURTEEN',
            15 => 'FIFTEEN',
            16 => 'SIXTEEN',
            17 => 'SEVENTEEN',
            18 => 'EIGHTEEN',
            19 => 'NINETEEN',
            20 => 'TWENTY'
        )
@endphp
<div class="container-fluid">
    <div class="row">
        <div class="col-12 mt-5">
            @php
                $date = date("d M Y");
            @endphp
            <p style="text-align: right">{{$trip->port->port_name}} {{$date}}</p>
        </div>
    </div>
    <div class="row">
        <div class="col-12">
            <p>{{$trip->ship->shiptype->ship_type_ab}}: {{$trip->ship->ship_name}}</p>
        </div>
        <div class="col-12">
            <p>FLAG : {{$trip->ship->flag}}</p>
        </div>
    </div>
    <div>
        <div class="row">
            <div class="col-12 text-center">
                <h4 style="text-decoration: underline">CARGO RECAPITULATION FOR {{$trip->port->port_name}}</h4>
            </div>
        </div>
        <div class="row text-center mt-4">
            <div class="col-3">
                <h6 style="text-decoration: underline">PORT OF</h6>
                <h6 style="text-decoration: underline">LOADING</h6>
            </div>
            <div class="col-2 d-flex align-items-center justify-content-center">
                <h6 style="text-decoration: underline">QUANTITY</h6>
            </div>
            <div class="col-2 d-flex align-items-center justify-content-center">
                <h6 style="text-decoration: underline">WEIGHT</h6>
            </div>
            <div class="col-2 d-flex align-items-center justify-content-center">
                <h6 style="text-decoration: underline">CARGO</h6>
            </div>
            <div class="col-3">
                <h6 style="text-decoration: underline">No PAGES OF</h6>
                <h6 style="text-decoration: underline">MANIFEST</h6>
            </div>
        </div>


        @foreach($arr_total_weight as $key => $arr)
        <div class="row text-center mt-4">
            <div class="col-3">
                <h6>{{$arr['loadingPort']->loading_port}}</h6>
                <p class="m-0">=======</p>
            </div>
            <div class="col-2">
                @if( strtoupper($arr['package']->package->package_name)=='BULK')
                    <h6>1</h6>
                    <p class="m-0">=======</p>
                @else
                    <h6>{{$arr['quantity']}}</h6>
                    <p class="m-0">=======</p>
                @endif
            </div>
            <div class="col-2">
                <h6>{{$arr['weight']}}</h6>
                <p class="m-0">=======</p>
            </div>
            <div class="col-2">
                <h6>{{$key}}</h6>
                <p class="m-0">=======</p>
            </div>
            <div class="col-3">
                @foreach($number_name as $key => $val)
                    @if($countmn == $key)
                        <p class="m-0">({{$countmn}} {{$val}})</p>
                        <p class="m-0">=======</p>
                    @endif
                @endforeach
            </div>
        </div>
        @endforeach
    <div class="mt-5">
        <div class="row">
            <div class="col-12 text-center">
                <h4 style="text-decoration: underline">CARGO IN TRANSIT</h4>
                <h4 style="text-decoration: underline">
                    <input type="text" style="width: 100%; text-align: center; border: 0" placeholder="From .. To .. ">
                </h4>
            </div>
        </div>
        <div class="row text-center mt-4">
            <div class="col-3">
                <h6 style="text-decoration: underline">PORT OF</h6>
                <h6 style="text-decoration: underline">LOADING</h6>
            </div>
            <div class="col-2 d-flex align-items-center justify-content-center">
                <h6 style="text-decoration: underline">QUANTITY</h6>
            </div>
            <div class="col-2 d-flex align-items-center justify-content-center">
                <h6 style="text-decoration: underline">WEIGHT</h6>
            </div>
            <div class="col-2 d-flex align-items-center justify-content-center">
                <h6 style="text-decoration: underline">CARGO</h6>
            </div>
            <div class="col-3">
                <h6 style="text-decoration: underline">No PAGES OF</h6>
                <h6 style="text-decoration: underline">MANIFEST</h6>
            </div>
        </div>
        @if($items == null)
            <div class="row text-center mt-4">
                <div class="col-3">
                    <h6>NIL</h6>
                    <p class="m-0">=======</p>
                </div>
                <div class="col-2">
                    <h6>NIL</h6>
                    <p class="m-0">=======</p>
                </div>
                <div class="col-2">
                    <h6>NIL</h6>
                    <p class="m-0">=======</p>
                </div>
                <div class="col-2">
                    <h6>NIL</h6>
                    <p class="m-0">=======</p>
                </div>
                <div class="col-3">
                    <h6>NIL</h6>
                    <p class="m-0">=======</p>
                </div>
            </div>
        @else
            @foreach($items as $item)
            @foreach($item as $it)
                <div class="row text-center mt-4">
                    <div class="col-3">
                        <p class="m-0">{{$it['manifest']['loading_port']}}</p>
                        <p class="m-0">=======</p>
                    </div>
                    <div class="col-2">
                        <p class="m-0">{{$it['transitQty']}}</p>
                        <p class="m-0">=======</p>
                    </div>
                    <div class="col-2">
                        <p class="m-0">{{$it['transitWeight']}}</p>
                        <p class="m-0">=======</p>
                    </div>
                    <div class="col-2">
                        <p class="m-0">{{$it['transitCargo']}}</p>
                        <p class="m-0">=======</p>
                    </div>
                    <div class="col-3">
                        @foreach($number_name as $key => $val)
                            @if($countmn == $key)
                                <p class="m-0">{{$countmn}}</p>
                                <p class="m-0">=======</p>
                            @endif
                        @endforeach
                    </div>
                </div>
            @endforeach
        @endforeach
        @endif
    </div>
    </div>
</div>
</body>
</html>
