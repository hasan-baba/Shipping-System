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
            <div class="col-12 text-center">
                <h2 class="mt-4">طلب سفر سفينة</h2>
                <h2>يقدم</h2>
                <p>الى رئاسة مرفأ صيدا</p>
                <p>
                    نحيطكم علما بأن وكالتنا البحرية في صيدا قد أنهت تفريغ / شحن السفينة
                    حاملة الأوصاف التالية:
                </p>
            </div>
        </div>
        <div class="row">
            <div class="col-6">
                <p>الإسم: <span>{{$trip->ship->ship_name}}</span></p>
            </div>
            <div class="col-6">
                <p class="d-inline-block">رقم ال IMO: </p> <span>{{$trip->ship->imo_number}}</span>
            </div>
        </div>
        <div class="row">
            <div class="col-6">
                <p>رافعة العلم: <span>{{$trip->ship->flag}}</span></p>
            </div>
            <div class="col-6">
                <p> وزنها الصافي: <span>{{$trip->shipment_quantity}}</span> <span>طن</span></p>
            </div>
        </div>
        <div class="row">
            <div class="col-6">
                <p>إسم الربّان: <span>{{$trip->captain_name}}</span></p>
            </div>
            <div class="col-6">
                <p>عدد البحارة على متنها <span>{{$trip->crew_number}}</span></p>
            </div>
        </div>
        <div class="row">
            <div class="col-6">
                <p>
                    تاريخ الوصول الى مرفا <span>{{$trip->port->port_arabic_name}}</span> <span>{{$trip->expected_arrival_date}}</span>
                </p>
            </div>
            <div class="col-6"></div>
        </div>
        <div class="row">
            <div class="col-12">
                <p>قادمة من: <span>{{$trip->ship_coming_from}}</span></p>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <p>
                    تاريخ و ساعة السفر المرتقبة خلال أربعة و عشرين ساعة من تاريخه:
                    <span>{{$trip->departure_date}}</span>
                </p>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <p>
                    فعليه نرجو اعطاءنا إذن السفر القانوني الذي يخولنا مغادرة المرفأ
                    علماً بأن وجهة سفرها
                </p>
                <p>هي مرفأ {{$trip->ship_heading_to}}</p>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <p style="float: left">و تفضلوا بقبول فائق الاحترام</p>
            </div>
        </div>
    </div>
@endsection
