<!DOCTYPE html>
<html lang="ar" dir="rtl">
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

<div class="container-fluid">
    <div class="row" dir="ltr">
        <p>Port of SAIDA</p>
        @php $year = date('Y') @endphp
        <p>Date:<span class="px-3"></span> / <span class="px-3"></span> / <span>{{$year}}</span></p>
        <h3 class="text-center" style="text-decoration: underline">The Chief Of  Saida Army</h3>
        <p>Dear Sirs,</p>
        <p>I, The undersigned Capt. {{$trip->captain_name}}</p>
        <p>Master of {{$trip->ship->shiptype->ship_type_ab}} {{$trip->ship->ship_name}}</p>
        <p>Declare that,</p>
        <p>Before Sailing, I and crew controlled all the rooms and holds and found no foreign person on board except the crew declared by us on the arrival as per crew presented to you.
            Therefore, we are asking you permission to allow our Vessel sail.</p>
        <h5 style="text-decoration: underline">Master</h5>
    </div>
    <div class="row mt-5 pt-5" dir="rtl" style="font-size: 17px">
        @php $year = date('Y') @endphp
        <p>مرفأ  صيدا  في<span class="px-3"></span> / <span class="px-3"></span> / <span>{{$year}}</span> </p>
        <h3>حضرة رئيس مركز أمن مرفأ صيدا المحترم</h3>
        <p>أنا الموقع أدناه {{$trip->captain_name}}</p>
        <p>ربان الباخرة {{$trip->ship->shiptype->ship_type_ab}} {{$trip->ship->ship_name}}</p>
        <p>أصرح بالآتي:</p>
        <p>قبل مغادرة الباخرة قمت مع الطاقم بتفتيش كافة الغرف و العنابر و لم يوجد أي شخص غريب على الباخرة ما عدا الطاقم المصرح به حسب لائحة البحارة المقدّمة منا.</p>
        <p>لما تقدّم أعلاه نطلب الإذن بالمغادرة.</p>
        <h5 style="text-decoration: underline">ربّان الباخرة</h5>
    </div>
</div>

</body>
<!-- JavaScript Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
</html>
