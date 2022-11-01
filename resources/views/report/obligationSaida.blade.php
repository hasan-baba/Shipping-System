@include('layouts.printbtn')
@extends('layouts.printHeaderFooter')
@section('content')
    <div class="container-fluid" style="font-size: 19px">
        <div class="row">
            <div class="col-12">
                @php $date = date('Y/m/d') @endphp
                <p style="text-align: left">صيدا في {{$date}}</p>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <p style="text-align: center; text-decoration: underline; font-weight: bold; font-size: 25px">
                    تعهد
                </p>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <p>جانب  رئيس مكتب جمرك صيدا المحترم،</p>
                <p>بعد التحية،</p>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <p>
                    نفيدكم علما بأننا نتعهد بدفع كافة الرسوم و الغرامات التي تحددها
                    إدارة الجمارك إذا تبين لدى التسليم أي زيادة أو نقص
                </p>
                <p>
                    عن الكمية المحددة في المانيفست عن الباخرة {{$trip->ship->ship_name}} في مرفأ
                    {{$trip->port->port_arabic_name}}
                </p>
                <p>التي ستفرغ حمولتها من مادة {{$trip->cargo->cargo_name}}</p>
                <p>في خزانات {{$trip->company_recieving}} <span>بتاريخ</span> {{$trip->expected_arrival_date}}</p>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <p style="text-align: left">و لكم جزيل الشكر</p>
            </div>
        </div>
    </div>
@endsection
