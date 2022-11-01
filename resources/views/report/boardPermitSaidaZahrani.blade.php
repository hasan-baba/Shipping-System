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
                <p>حضرة رئيس مركز أمن عام مرفأ صيدا و الزهراني المحترم،</p>
                <p>تحية و بعد..</p>
                <p>الموضوع: طلب إذن دخول الى المرفأ و الصعود على الباخرة التابعة لوكالتنا</p>
                <p>   نرجو من حضرتكم الموافقة على اعطاء تصريح دخول للأشخاص الأتية اسمائهم ادناه للصعود على متن الباخرة {{$trip->ship->ship_name}}</p>
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
        <div class="row my-2">
            <p>على كامل مسؤوليتنا.</p>
        </div>
        <div class="row">
            <table class="table table-bordered text-center">
                <thead>
                <th>رقم</th>
                <th>الاسم</th>
                <th>الشهرة</th>
                <th>مواليد</th>
                <th>الجنسية</th>
                <th>رقم جواز السفر/ رقم الهوية</th>
                <th>المهنة</th>
                </thead>
                <tbody>
                @php $i = 1 @endphp
                @foreach($crew as $cr)
                    <tr>
                        <td>{{$i}}</td>
                        <td>{{$cr->first_name}}</td>
                        <td>{{$cr->last_name}}</td>
                        <td>
                            @php
                                $date=date_create($cr->date_of_birth);
                                echo date_format($date,"d-m-Y");
                            @endphp
                        </td>
                        <td>{{$cr->nationality}}</td>
                        <td><input type="text" style="border: 0; width: 90%; text-align: center; margin: 2px;"></td>
                        <td></td>
                    </tr>
                    @php $i += 1 @endphp
                @endforeach
                </tbody>
            </table>
        </div>
        <div class="row mt-2">
            <p class="col-12">
            <p style="text-align: left">و تفضلوا بقبول فائق الاحترام</p>
        </div>
    </div>
    </div>
@endsection
