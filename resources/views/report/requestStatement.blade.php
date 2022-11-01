@include('layouts.printbtn')
@extends('layouts.printHeaderFooter')
@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                @php $date = date('Y/m/d') @endphp
                <p style="text-align: left">صيدا في {{$date}}</p>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <p>حضرة رئيس مرفأ صيدا المحترم،</p>
                <p>الموضوع: إعطاؤنا إفادة تثبت بأن شهادات الناقلة {{$trip->ship->ship_name}} سارية المفعول</p>
                <p>نعرض لحضرتكم بأن الناقلة {{$trip->ship->ship_name}} رافعة العلم  {{$trip->ship->flag}}</p>
                <p>قد وصلت الى مرفأ {{$trip->port->port_arabic_name}} بتاريخ {{$trip->expected_arrival_date}} و معها كمية {{$trip->shipment_quantity}}</p>
                <p>من مادة {{$trip->cargo->cargo_name}} لتفريغها في مرفأ {{$trip->port->port_arabic_name}}</p>
                <p>وبما أن شهاداتها و مستنداتها مكتملة و سارية المفعول، نرجو من حضرتكم إعطائنا إفادة تثبت ذلك و أنه لا مانع لديكم من إعطاء الإذن للناقلة المذكورة أعلاه بتفريغ حمولتها بعد موافقة وزارة الصناعة و النفط شركة المراقبة المكلفة.</p>
            </div>
        </div>
    </div>
@endsection
