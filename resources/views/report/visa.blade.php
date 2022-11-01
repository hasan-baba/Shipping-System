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
                <p>حضرة رئيس دائرة أمن عام مطار رفيق الحريري الدولي المحترم،</p>
                <p>تحية و بعد..</p>
                <p>المستدعي: Tiriaky Shipping S.A.R.L</p>
                <p>الموضوع: طلب تـأشيرة دخول مرور</p>
                <p>بما أنه ورد الى وكالتنا بتاريخ {{$date}} من الباخرة {{$trip->ship->ship_name}}</p>
            </div>
        </div>
        <div class="row my-2">
            @php
                $current_date = date("Y-m-d H:i:s");
                $date = $trip->expected_arrival_date;
                $status = "";
                if($current_date > $date) {
                    $status = "الراسية في";
                } else {
                    $status = "الاتية الى";
                }
            @endphp
            <div class="col-12">
                رافعة العلم <span>{{$trip->ship->flag}}</span>  و {{$status}} مرفأ <span>{{$trip->port->port_arabic_name}}  بتاريخ <span>{{$trip->expected_arrival_date}}
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <p>أن البحارة المذكورة أسمائهم أدناه بحاجة الى تأشيرة مرور للدخول عن طريق مطار رفيق الحريري الدولي الى</p>
                <p>مرفأ {{$trip->port->port_arabic_name}}  للالتحاق بالباخرة المذكور أعلاه على أن نتعهد باستلامهم من المطار و نقلهم فوراً الى الباخرة المذكورة اعلاه</p>
                <p>بعد اتمام الاجراءات اللازمة و على كامل مسؤوليتنا</p>
            </div>
        </div>
        <div class="row">
            <table class="table table-bordered text-center">
                <thead>
                <th>رقم الجواز البحري</th>
                <th>رقم جواز السفر</th>
                <th>الجنسية</th>
                <th>مواليد</th>
                <th>الشهرة</th>
                <th>الاسم</th>
                <th>رقم</th>
                </thead>
                <tbody>
                @php $i = 1 @endphp
                @foreach($crew as $cr)
                    <tr>
                        <td>{{$cr->seaman_book_number}}</td>
                        <td>{{$cr->passport_number}}</td>
                        <td>{{$cr->nationality}}</td>
                        <td>
                            @php
                                $date=date_create($cr->date_of_birth);
                                echo date_format($date,"d-m-Y");
                            @endphp
                        </td>
                        <td>{{$cr->last_name}}</td>
                        <td>{{$cr->first_name}}</td>
                        <td>{{$i}}</td>
                    </tr>
                    @php $i += 1 @endphp
                @endforeach
                </tbody>
            </table>
        </div>
        <div class="row mt-2">
            <div class="col-12">
                <p style="text-align: left">و تفضلوا بقبول فائق الاحترام</p>
            </div>
        </div>
    </div>
@endsection
