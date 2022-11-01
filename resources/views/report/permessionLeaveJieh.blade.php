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
    <style>
        @media print {
            * {
                -webkit-print-color-adjust: exact !important;
                color-adjust: exact !important;
            }
        }
    </style>
</head>
@include('layouts.printbtn')
<body style="font-size: 18px;">
<div class="container-fluid">
    <div class="row">
        <div class="col-6">
            <p style="font-weight: bold">
                حضرة رئيس مركز أمن عام مرفأ الجية المحترم
            </p>
            <p style="font-weight: bold">مرفأ الجية</p>
            <hr class="w-25" />
            <p style="font-weight: bold">تحية و بعد،</p>
            <p style="font-weight: bold">أنا الموقع أدناه الربان:</p>
        </div>
        <div class="col-6" dir="ltr">
            <p style="font-weight: bold" >THE CHIEF OF JIEH PORT IMMIGRATION</p>
            <p style="font-weight: bold">JIEH PORT</p>
            <hr class="w-25" />
            <p style="font-weight: bold">DEAR SIRS,</p>
            <p style="font-weight: bold">I' THE UNDERSIGNED CAPT:</p>
        </div>
    </div>
    <div class="row">
        <div class="col-12" dir="ltr"><p>{{$trip->captain_name}}</p></div>
    </div>
    <div class="row">
        <div class="col-6">
            <p>ربان الباخرة</p>
        </div>
        <div class="col-6" dir="ltr">
            <p>{{$trip->ship->shiptype->ship_type_ab}} {{$trip->ship->shiptype->ship_type_name}}</p>
        </div>
    </div>
    <div class="row">
        <div class="col-6">
            <p>أصرح بالآتي:</p>
            <p>
                قبل المغادرة قمت مع الطاقم بتفتيش كافة الغرف و العنابر و لم يوجد أي
                شخص غريب على الباخرة ما عدا الطاقم المصرح به حسب لائحة البحارة
                المقدّمة منا.
            </p>
            <p class="font-weight-bold">لما تقدّم أعلاه نطلب الإذن بالمغادرة.</p>
        </div>
        <div class="col-6" dir="ltr">
            <p>Declare that,</p>
            <p>
                Before sailing, I and crew controlled all the rooms and holds and
                found no foreign person on board except the crew declared by us on
                the arrival as per crew presented to you.
            </p>
            <p>
                Therefore, we are asking you permission to allow our Vessel sail.
            </p>
        </div>
    </div>
    <div class="row text-center">
        <div class="col-6"><p style="font-weight: bold">ربّان الباخرة</p></div>
        <div class="col-6">
            <p style="font-weight: bold">MASTER</p>
        </div>
    </div>
</div>
</body>
<!-- JavaScript Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
</html>
