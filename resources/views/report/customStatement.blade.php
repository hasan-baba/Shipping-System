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
        p {
            margin-bottom: 6px!important;
            margin-top: 6px!important;
        }
        @media print {
            * {
                -webkit-print-color-adjust: exact !important;
                color-adjust: exact !important;
            }
        }
    </style>
</head>
@include('layouts.printbtn')
<body>
<div class="container-fluid">
    <div class="row text-center">
        <div class="col-4">
            <p class="m-0" style="font-weight: bold">الجمـــارك اللبنـــانـيـة</p>
            <p class="m-0" style="font-weight: bold">إقليــم بيــروت</p>
            <p class="m-0" style="font-weight: bold">ضــابطة صيدا</p>
            <p class="m-0" style="font-weight: bold">شــعبـة المكافحة البحــريـة صيدا</p>
            <p class="m-0" style="font-weight: bold">مفــرزة صيدا البحـــرية</p>
        </div>
        <div class="col-4">
            <img src="/assets/img/aljamarek.jpeg" class="rounded" style="max-width: 35%" />
        </div>
        <div class="col-4">
            <p class="m-0" style="font-weight: bold">LEBANESE CUSTOMS</p>
            <p class="m-0" style="font-weight: bold">BEIRUT SECTION</p>
            <p class="m-0" style="font-weight: bold">SAIDA DEPARTMENT</p>
            <p class="m-0" style="font-weight: bold">NAVAL DIVISION SAIDA</p>
            <p class="m-0" style="font-weight: bold">SAIDA NAVAL DETACHMENT</p>
        </div>
    </div>
    <hr />
    <div class="row text-center">
        <div class="col-12">
            <p style="font-weight: bold">معلــومــات البـــاخـــرة</p>
        </div>
    </div>
    <div class="row text-center">
        <div class="col-12">
            <p style="font-weight: bold; text-decoration: underline">
                VESSEL'S INFORMATION
            </p>
        </div>
    </div>
    <div class="row border-bottom">
        <div class="col-4">
            <p style="font-weight: bold">إســم الوكــالة :</p>
        </div>
        <div class="col-4">
            <p style="text-align: center" dir="ltr">{{$trip->agency_name}}</p>
        </div>
        <div class="col-4">
            <p style="font-weight: bold; text-align: left">:Agency</p>
        </div>
    </div>
    <div class="row border-bottom">
        <div class="col-4">
            <p style="font-weight: bold">إســم البــاخــرة:</p>
        </div>
        <div class="col-4">
            <p style="text-align: center">{{$trip->ship->ship_name}}</p>
        </div>
        <div class="col-4">
            <p style="font-weight: bold; text-align: left">:Vessel's name</p>
        </div>
    </div>
    <div class="row border-bottom">
        <div class="col-4">
            <p style="font-weight: bold">العـلــم :</p>
        </div>
        <div class="col-4">
            <p style="text-align: center">{{$trip->ship->flag}}</p>
        </div>
        <div class="col-4">
            <p style="font-weight: bold; text-align: left">:Flag</p>
        </div>
    </div>
    <div class="row border-bottom">
        <div class="col-4">
            <p style="font-weight: bold">إســم الـقبطـــان :</p>
        </div>
        <div class="col-4">
            <p style="text-align: center">{{$trip->captain_name}}</p>
        </div>
        <div class="col-4">
            <p style="font-weight: bold; text-align: left">:Master's Name</p>
        </div>
    </div>
    <div class="row border-bottom">
        <div class="col-4">
            <p style="font-weight: bold">رقــم الـتسجيــل :</p>
        </div>
        <div class="col-4">
            <p style="text-align: center">{{$trip->ship->registration_number}}</p>
        </div>
        <div class="col-4">
            <p style="font-weight: bold; text-align: left">: Registry no</p>
        </div>
    </div>
    <div class="row border-bottom">
        <div class="col-4">
            <p style="font-weight: bold">تــاريــخ الـتسجيــل :</p>
        </div>
        <div class="col-4">
            <p style="text-align: center">{{$trip->ship->registration_date}}</p>
        </div>
        <div class="col-4">
            <p style="font-weight: bold; text-align: left">:Date of registry</p>
        </div>
    </div>
    <div class="row border-bottom">
        <div class="col-4">
            <p style="font-weight: bold">مكــان الـتسجيــل :</p>
        </div>
        <div class="col-4">
            <p style="text-align: center">{{$trip->ship->registry_port}}</p>
        </div>
        <div class="col-4">
            <p style="font-weight: bold; text-align: left">:Place of registry</p>
        </div>
    </div>
    <div class="row border-bottom">
        <div class="col-4">
            <p style="font-weight: bold">رقــم الإيـــمو :</p>
        </div>
        <div class="col-4">
            <p style="text-align: center">{{$trip->ship->imo_number}}</p>
        </div>
        <div class="col-4">
            <p style="font-weight: bold; text-align: left">:I M O no</p>
        </div>
    </div>
    <div class="row border-bottom">
        <div class="col-4">
            <p style="font-weight: bold">إســم الســابـق للبـاخـرة :</p>
        </div>
        <div class="col-4">
            <p style="text-align: center">{{$trip->ship->ex_name}}</p>
        </div>
        <div class="col-4">
            <p style="font-weight: bold; text-align: left">:Vessel's ex name</p>
        </div>
    </div>
    <div class="row border-bottom">
        <div class="col-4">
            <p style="font-weight: bold">اللـــون :</p>
        </div>
        <div class="col-4">
            <p style="text-align: center">{{$trip->ship->color}}</p>
        </div>
        <div class="col-4">
            <p style="font-weight: bold; text-align: left">:Color</p>
        </div>
    </div>
    <div class="row border-bottom">
        <div class="col-4">
            <p style="font-weight: bold">الطــول :</p>
        </div>
        <div class="col-4">
            <p style="text-align: center">{{$trip->ship->overall_length}}</p>
        </div>
        <div class="col-4">
            <p style="font-weight: bold; text-align: left">:L.O.A</p>
        </div>
    </div>
    <div class="row border-bottom">
        <div class="col-4">
            <p style="font-weight: bold">الــوزن القـــائم :</p>
        </div>
        <div class="col-4">
            <p style="text-align: center">{{$trip->ship->gross_tonnage}}</p>
        </div>
        <div class="col-4">
            <p style="font-weight: bold; text-align: left">:G.R.T</p>
        </div>
    </div>
    <div class="row border-bottom">
        <div class="col-4">
            <p style="font-weight: bold">الــوزن الصـــافي :</p>
        </div>
        <div class="col-4">
            <p style="text-align: center">{{$trip->ship->net_tonnage}}</p>
        </div>
        <div class="col-4">
            <p style="font-weight: bold; text-align: left">:N.R.T</p>
        </div>
    </div>
    <div class="row border-bottom">
        <div class="col-4">
            <p style="font-weight: bold">رقم الشهادة الدولية لأمن الباخرة :</p>
        </div>
        <div class="col-4">
            <p style="text-align: center">{{$trip->ship->issc}}</p>
        </div>
        <div class="col-4">
            <p style="font-weight: bold; text-align: left">:I.S.S.C No</p>
        </div>
    </div>
    <div class="row border-bottom">
        <div class="col-3">
            <p style="font-weight: bold">نــوع الحمــولة و عـددها :</p>
        </div>
        <div class="col-3">
            <p style="text-align: center; direction: ltr">{{$trip->shipment_quantity}} M Tons</p>
        </div>
        <div class="col-2">
            <p style="text-align: center">{{$trip->cargo->cargo_name}}</p>
        </div>
        <div class="col-4">
            <p style="font-weight: bold; text-align: left; direction: ltr">
                Kind of cargo (pkgs & weight):
            </p>
        </div>
    </div>
    <div class="row border-bottom">
        <div class="col-4">
            <p style="font-weight: bold">مــالك الـبــاخــرة :</p>
        </div>
        <div class="col-4">
            <p style="text-align: center">{{$trip->ship->owner}}</p>
        </div>
        <div class="col-4">
            <p style="font-weight: bold; text-align: left">
                :Owner of the vessel
            </p>
        </div>
    </div>
    <div class="row border-bottom">
        <div class="col-4">
            <p style="font-weight: bold">قــادمـة مـن :</p>
        </div>
        <div class="col-4">
            <p style="text-align: center">{{$trip->ship_coming_from}}</p>
        </div>
        <div class="col-4">
            <p style="font-weight: bold; text-align: left">:Coming from</p>
        </div>
    </div>
    <div class="row">
        <div class="col-4">
            <p style="font-weight: bold">آخــر رحلــة الـى مرفـأ صيـدا :</p>
        </div>
        <div class="col-4">
            <p style="text-align: center">{{$trip->ship_launching_port}}</p>
        </div>
        <div class="col-4">
            <p style="font-weight: bold; text-align: left">
                :Last Voyage to SAIDA PORT
            </p>
        </div>
    </div>
    <div style="height: 3px;  background-color: black"></div>
    <div class="row border-bottom">
        <div class="col-4">
            <p style="font-weight: bold">ســـاعة الدخــول:</p>
        </div>
        <div class="col-4">
            <p style="text-align: center"></p>
        </div>
        <div class="col-4">
            <p style="font-weight: bold; text-align: left">:Time of entrance</p>
        </div>
    </div>
    <div class="row border-bottom">
        <div class="col-4">
            <p style="font-weight: bold">رقــم الرصيــف :</p>
        </div>
        <div class="col-4">
            <p style="text-align: center"></p>
        </div>
        <div class="col-4">
            <p style="font-weight: bold; text-align: left">:Quay no</p>
        </div>
    </div>
    <div class="row border-bottom">
        <div class="col-4">
            <p style="font-weight: bold">رقــم المعــاينــة :</p>
        </div>
        <div class="col-4">
            <p style="text-align: center"></p>
        </div>
        <div class="col-4">
            <p style="font-weight: bold; text-align: left">:Inspection no</p>
        </div>
    </div>
    <div class="row border-bottom">
        <div class="col-4">
            <p style="font-weight: bold">إســم و رتبــة المعــاين :</p>
        </div>
        <div class="col-4">
            <p style="text-align: center"></p>
        </div>
        <div class="col-4">
            <p style="font-weight: bold; text-align: left">
                :Name & rank of the controller
            </p>
        </div>
    </div>
    <div class="row border-bottom">
        <div class="col-4">
            <p style="font-weight: bold">تــــاريـخ :</p>
        </div>
        <div class="col-4">
            <p style="text-align: center"></p>
        </div>
        <div class="col-4">
            <p style="font-weight: bold; text-align: left">:Date</p>
        </div>
    </div>
    <div style="height: 3px;  background-color: black"></div>
    <div class="row">
        <div class="col-6">
            <p style="text-decoration: underline">ختم وتوقيع الوكيل</p>
        </div>
        <div class="col-6">
            <p style="text-decoration: underline; text-align: left">Master’s stamp signature</p>
        </div>
    </div>
</div>
</body>
<!-- JavaScript Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
</html>
