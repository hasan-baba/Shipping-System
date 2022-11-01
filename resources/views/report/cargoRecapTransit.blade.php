<!DOCTYPE html>
<html>
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
        <div class="col-12">
            <p style="float: left">{{$trip->ship->shiptype->ship_type_ab}} {{$trip->ship->ship_name}}</p>
        </div>
        <div class="col-12">
            <p style="float: left">Flag: <span>{{$trip->ship->flag}}</span></p>
        </div>
        <div class="col-12">
            @php $date = date('d F Y') @endphp
            <p style="float: left">Date: <span>{{$date}}</span></p>
        </div>
        <div class="col-12 text-center">
            <h3 class="text-decoration-underline">CARGO RECAPITULATION</h3>
        </div>
        <div class="col-12">
            <div class="row">
                <div class="col-3">
                    <p style="float: left">
                        VESSEL'S NAME
                    </p>
                </div>
                <div class="col-9">
                    <p>{{$trip->ship->shiptype->ship_type_ab}} {{$trip->ship->ship_name}}</p>
                </div>
            </div>
        </div>
        <div class="col-12">
            <div class="row">
                <div class="col-3">
                    <p style="float: left">
                        LOADING PORT
                    </p>
                </div>
                <div class="col-9">
                    <p>
                        @foreach($manifests as $mn)
                            @if ($loop->last)
                                {{$mn->loading_port}}
                            @else
                                {{$mn->loading_port}} -
                            @endif
                        @endforeach
                    </p>
                </div>
            </div>
        </div>
        <div class="col-12">
            <div class="row">
                <div class="col-3">
                    <p style="float: left">
                        DISCHARGING PORT
                    </p>
                </div>
                <div class="col-9">
                    <p>
                        @foreach($manifests as $mn)
                            @if ($loop->last)
                                {{$mn->discharging_port}}
                            @else
                                {{$mn->discharging_port}} -
                            @endif
                        @endforeach
                    </p>
                </div>
            </div>
        </div>
        <div class="col-12">
            @php $total = 0 @endphp
            @foreach($items as $item)
                @foreach($item as $it)
            <div class="row">
                <div class="col-3">
                    <p style="float: left">
                        CARGO ON BOARD
                    </p>
                </div>
                <div class="col-9">
                    <p>
                        {{$it['cargo']['cargo_name']}}
                        @php $total += $it['weight']@endphp
                    </p>
                </div>
            </div>
                @endforeach
            @endforeach
        </div>
        <div class="col-12">
            <div class="row">
                <div class="col-3">
                    <p style="float: left">
                        TOTAL WEIGHT
                    </p>
                </div>
                <div class="col-9">
                    <p style="float: left"><span>{{$total}}</span> <span>METRIC TONS IN BULK</span></p>
                </div>
            </div>
        </div>
        <div class="col-12">
            <div class="row">
                <div class="col-3">
                    <p style="float: left">
                        NUMBER OF PAGES OF MANIFEST
                    </p>
                </div>
                <div class="col-9">
                    @foreach($number_name as $key => $val)
                        @if($countmn == $key)
                        <p style="float: left">{{$countmn}} {{$val}}</p>
                        @endif
                    @endforeach
                </div>
            </div>
        </div>
        <div class="col-12">
            <div class="row">
                <div class="col-3">
                    <p style="float: left">
                        CARGO IN TRANSIT
                    </p>
                </div>
                <div class="col-9">
                    <p>
                        @foreach($items as $item)
                            @foreach($item as $it)
                                @if ($loop->last)
                                    {{$it['transitCargo']}}
                                @else
                                    {{$it['transitCargo']}} -
                                @endif
                            @endforeach
                        @endforeach
                    </p>
                </div>
            </div>
        </div>
        <div class="col-12 text-center">
            <p>MASTER OF {{$trip->ship->shiptype->ship_type_ab}} {{$trip->ship->ship_name}}</p>
        </div>
    </div>
</div>
</body>
<!-- JavaScript Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
</html>
