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
                <p>حضرة رئيس مركز أمن عام مرفأ صيدا و الزهراني المحترم،</p>
                <p>تحية و بعد..</p>
                <p>الموضوع: طلب دخول ركاب على متن الباخرة للمغادرة</p>
                <p>نرجو الموافقة على الدخول الى الأراضي اللبنانية، للركاب الأتية أسمائهم أدناه و الموجودين على متن الباخرة {{$trip->ship->ship_name}}                 رافعة العلم <span>{{$trip->ship->flag}}</span>  و {{$status}} مرفأ <span>{{$trip->port->port_arabic_name}}  بتاريخ <span>{{$trip->expected_arrival_date}}</p>
            </div>
        </div>
        <div class="row">
            <p>للمغادرة عن طريق
                <select style="border: 0; display: inline">
                    <option>مطار رفيق الحريري</option>
                    <option>المصنع</option>
                    <option>العريضة</option>
                    <option>العدوسية</option>
                </select> و على كامل مسؤوليتنا
            </p>
        </div>
        <div class="row">
            <table class="table table-bordered text-center">
                <thead>
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
                <p>حضرة المقدم رئيس دائرة أمن عام لبنان الجنوبي المحترم،</p>
                <p>يرجى التفضل بالاطلاع و الموافقة على طلب الوكيل  و الموافقة</p>
                <p>على إنزال الركاب المذكورين أعلاه عن متن الباخرة {{$trip->ship->ship_name}}  و {{$status}} مرفأ <span>{{$trip->port->port_arabic_name}}</span></p>
                <p>و منحهم سمة مرور للمغادرة عبر مطار رفيق الحريري الدولي.</p>
            </div>
        </div>
    </div>
    </div>
@endsection
