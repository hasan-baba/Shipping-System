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
<body style="font-size: 19px">
<div class="container-fluid">
    <h2>الجمهورية اللبنانية</h2>
    <h2>وزارة النقل</h2>
    <h5>المديرية العامة للنقل البري و البحري</h5>
    <h5>رئاسة مرفأ صيدا</h5>
    <hr class="w-25" />
    @php $date = date('Y/m/d') @endphp
    <p>صيدا في {{$date}}</p>
    <div class="row" style="padding-right: 30px;">
        <p class="text-decoration-underline text-center" style="font-weight: bold; font-size: 25px">إفادة</p>
        <p> الناقلة: <span>{{$trip->ship->ship_name}}</span> </p>
        <p> العلم: <span>{{$trip->ship->flag}}</span> </p>
        <p> المرجع:  كتابكم <span>{{$date}}</span> </p>
        <p>الوكيل : Tiriaky Shipping S.A.R.L </p>
        <p> الحمولة: <span>{{$trip->cargo->cargo_name}}</span>  الحوالي: <span> {{$trip->shipment_quantity}} </span>طنا </p>
        <p> المكان :  مرفأ <span>{{$trip->port->port_arabic_name}}</span> </p>
    </div>
    <div class="row">
        <p>يفيد رئيس مرفأ صيدا بأن جميع الشروط المطلوبة من ناقلة النفط {{$trip->ship->ship_name}}</p>
        <p>فيما بتعلق بشهادتها و مستنداتها مكتملة و ما زالت سارية المفعول، بموجب المذكرة رقم 5
            بتاريخ 7 نيسان 1993 الصادرة عن المديرية العامة للنقل اللبري و البحري.</p>
        <p>لذلك لا مانع لدينا من إعطاء الإذن للناقلة المذكورة بتفريغ حمولتها بعد موافقة وزارة الصناعة و النفط
            وقد أعطيت هذه الإفادة بناء لطلب الوكيل البحري.</p>
    </div>
</div>
</body>
<!-- JavaScript Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
</html>
