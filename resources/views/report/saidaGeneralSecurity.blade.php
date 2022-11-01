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
<body style="font-size: 14px">
<div class="container-fluid">
    <div class="row text-center border">
        <div class="col-4 border">
            <p>الجمهورية اللبنانية</p>
            <p>المديرية العامة للأمن العام</p>
            <p>دائرة أمن عام جبل لبنان</p>
        </div>
        <div class="col-4 border">
            <h4>حركة الباخرة</h4>
            <h6>MOVEMENT DU BATEAU</h6>
            <h6>DETAILS OF THE SHIP</h6>
        </div>
        <div class="col-4 border">
            <p>REPUBLIQUE LIBANAISE</p>
            <p>D.G. DE LA SURETE GENERALE</p>
            <p>SERVICE DU Mont Liban</p>
        </div>
    </div>
    <div class="row text-center">
        <div class="col-2">اسم الباخرة:</div>
        <div class="col-8 border-bottom border-dark d-flex justify-content-between">
            <div class="m-0">{{$trip->ship->ship_name}}</div>
            <div class="m-0">
                <span>IMO.</span>
                {{$trip->ship->imo_number}}
            </div>
        </div>
        <div class="col-2">.S.S</div>
    </div>
    <div class="row text-center">
        <div class="col-2">علمها:</div>
        <div class="col-8 border-bottom border-dark">
            <p class="m-0">{{$trip->ship->flag}}</p>
        </div>
        <div class="col-2">:Pavillion Flag</div>
    </div>
    <div class="row text-center">
        <div class="col-6">
            <div class="row">
                <div class="col-4">اسم السابق:</div>
                <div class="col-7 border-bottom border-dark">
                    <p class="m-0">{{$trip->ship->ex_name}}</p>
                </div>
            </div>
        </div>
        <div class="col-6">
            <div class="row">
                <div class="col-4">اسم المالك:</div>
                <div class="col-7 border-bottom border-dark">
                    <p class="m-0" style="direction: ltr">{{$trip->ship->owner}}</p>
                </div>
            </div>
        </div>
    </div>
    <div class="row text-center align-items-center">
        <div class="col-3">
            <p class="m-0 pt-4" style="text-align: right">اسم الوكالة في صيدا:</p>
        </div>
        <div class="col-6 pt-1">
            <p class="pt-2 border-bottom border-dark" style="direction: ltr">
                {{$trip->agency_name}}
            </p>
        </div>
        <div class="col-3" style="text-align: left">
            <p class="m-0">Agence a Saida</p>
            <p>Agency in Saida</p>
        </div>
    </div>
    <div class="row text-center align-items-center">
        <div class="col-3">
            <p class="m-0 pt-4" style="text-align: right">تاريخ و ساعة الوصول:</p>
        </div>
        <div class="col-6 pt-1">
            <p class="pt-2 border-bottom border-dark">
                @php
                    $date=date_create($trip->expected_arrival_date);
                    echo date_format($date,"d-m-Y");
                @endphp
            </p>
        </div>
        <div class="col-3" style="text-align: left">
            <p class="m-0">Date d'arrivee</p>
            <p>Date of arrival</p>
        </div>
    </div>
    <div class="row text-center align-items-center">
        <div class="col-3">
            <p class="m-0 pt-4" style="text-align: right">المرافئ التي مرت فيها:</p>
        </div>
        <div class="col-6 pt-1">
            <p class="pt-2 border-bottom border-dark">
                {{$trip->ship_coming_from}}
            </p>
        </div>
        <div class="col-3" style="text-align: left">
            <p class="m-0">Ports touches</p>
            <p>Ports of call</p>
        </div>
    </div>
    <div class="row text-center align-items-center">
        <div class="col-3">
            <p class="m-0 pt-4" style="text-align: right">مجمل محمولها:</p>
        </div>
        <div class="col-6 pt-1">
            <p class="pt-2 border-bottom border-dark">{{$trip->ship->gross_tonnage}}</p>
        </div>
        <div class="col-3" style="text-align: left">
            <p class="m-0">Tonnage brut</p>
            <p>Gross tonnage</p>
        </div>
    </div>
    <div class="row text-center align-items-center">
        <div class="col-3">
            <p class="m-0 pt-4" style="text-align: right">محمولها الصافي:</p>
        </div>
        <div class="col-6 pt-1">
            <p class="pt-2 border-bottom border-dark">{{$trip->ship->net_tonnage}}</p>
        </div>
        <div class="col-3" style="text-align: left">
            <p class="m-0">Tonnage net</p>
            <p>Net tonnage</p>
        </div>
    </div>
    <div class="row text-center align-items-center">
        <div class="col-3" style="text-align: right">البضاعة المشحونة عليها:</div>
        <div class="col-6 border-bottom border-dark d-flex justify-content-between" dir="ltr">
            <div class="m-0" style="padding: 0 1rem">{{$trip->cargo->cargo_name}}</div>
            <div class="m-0">{{$trip->shipment_quantity}}</div>
            <div class="m-0">Tons</div>
        </div>
        <div class="col-3" style="text-align: left">
            <p class="m-0">Marchandises generales</p>
            <p class="m-0">General cargo</p>
        </div>
    </div>
    <div class="row text-center align-items-center">
        <div class="col-3">
            <p class="m-0 pt-4" style="text-align: right">البضاعة المشحونة الى بيروت:</p>
        </div>
        <div class="col-6 pt-1">
            <p class="pt-2 border-bottom border-dark"></p>
        </div>
        <div class="col-3" style="text-align: left">
            <p class="m-0">Marchandises pour Beyrouth</p>
            <p>Cargo for Beirut</p>
        </div>
    </div>
    <div class="row text-center align-items-center">
        <div class="col-3" style="text-align: right">
            <p class="m-0">المعدات الحربية و البضائع العسكرية:</p>
            <p>(لدى الايجاب يقدم البيان الجمركي)</p>
        </div>
        <div class="col-6 pt-1">
            <p class="pt-2 border-bottom border-dark"></p>
        </div>
        <div class="col-3" style="text-align: left">
            <p class="m-0">Materiels et effets militaires</p>
            <p>War materials & militaty effects</p>
        </div>
    </div>
    <div class="row text-center align-items-center">
        <div class="col-3">
            <p class="m-0 pt-4" style="text-align: right">عدد بحارة الباخرة:</p>
        </div>
        <div class="col-6 pt-1">
            <p class="pt-2 border-bottom border-dark"> {{$trip->crew_number}} بما فيهم القبطان </p>
        </div>
        <div class="col-3" style="text-align: left">
            <p class="m-0">Nombre de l'equipage</p>
            <p>Number of crew</p>
        </div>
    </div>
    <div class="row text-center align-items-center">
        <div class="col-3">
            <p class="m-0" style="text-align: right">عدد المسافرين الى بيروت:</p>
        </div>
        <div class="col-6 pt-1">
            <p class="pt-2 border-bottom border-dark"></p>
        </div>
        <div class="col-3" style="text-align: left">
            <p class="m-0">Passengers pour Beyrouth</p>
            <p>Passengers for Beirut</p>
        </div>
    </div>
    <div class="row text-center align-items-center">
        <div class="col-3">
            <p class="m-0" style="text-align: right">عدد المسافرين ترازيت:</p>
        </div>
        <div class="col-6 pt-1">
            <p class="pt-2 border-bottom border-dark"></p>
        </div>
        <div class="col-3" style="text-align: left">
            <p class="m-0">Passengers en transi</p>
            <p>Passengers in transit</p>
        </div>
    </div>
    <div class="row text-center align-items-center">
        <div class="col-3">
            <p class="m-0" style="text-align: right">تاريخ و ساعة سفرها:</p>
        </div>
        <div class="col-6 pt-1">
            <p class="pt-2 border-bottom border-dark">{{$trip->departure_date}}</p>
        </div>
        <div class="col-3" style="text-align: left">
            <p class="m-0">Date du depart</p>
            <p>Date of sailing</p>
        </div>
    </div>
    <div class="row text-center align-items-center">
        <div class="col-3">
            <p class="m-0" style="text-align: right">وجهة سفرها:</p>
        </div>
        <div class="col-6 pt-1">
            <p class="pt-2 border-bottom border-dark">{{$trip->ship_heading_to}}</p>
        </div>
        <div class="col-3" style="text-align: left">
            <p class="m-0">Destination</p>
            <p>Destination</p>
        </div>
    </div>
    <div class="row text-center">
        <div class="col-10">
            <div class="row text-center">
                <div class="col-3">
                    <p class="m-0" style="text-align: right">اسم المسافر خلسة:</p>
                </div>
                <div class="col-6 pt-1">
                    <p class="pt-2 border-bottom border-dark"></p>
                </div>
                <div class="col-3" style="text-align: left">
                    <p class="m-0">Nom</p>
                    <p>Name</p>
                </div>
            </div>
            <div class="row text-center">
                <div class="col-3">
                    <p class="m-0" style="text-align: right">جنسيته:</p>
                </div>
                <div class="col-6 pt-1">
                    <p class="pt-2 border-bottom border-dark"></p>
                </div>
                <div class="col-3" style="text-align: left">
                    <p class="m-0">Nationalite</p>
                    <p>Nationality</p>
                </div>
            </div>
            <div class="row text-center">
                <div class="col-3">
                    <p class="m-0" style="text-align: right">المرفأ الذي صعد منه:</p>
                </div>
                <div class="col-6 pt-1">
                    <p class="pt-2 border-bottom border-dark"></p>
                </div>
                <div class="col-3" style="text-align: left">
                    <p class="m-0">Port d'embarquement</p>
                    <p>Port of embarkation</p>
                </div>
            </div>
            <div class="row text-center">
                <div class="col-3">
                    <p class="m-0" style="text-align: right">الجية في:</p>
                </div>
                <div class="col-6 pt-1">
                    <p class="pt-2 border-bottom border-dark"></p>
                </div>
                <div class="col-3" style="text-align: left">
                    <p class="m-0">Jieh le</p>
                </div>
            </div>
            <div class="row">
                <div class="col-6">
                    <p>قبطان الباخرة</p>
                </div>
                <div class="col-6" style="text-align: center">
                    <p class="m-0">Commandant du Bateau</p>
                    <p class="m-0">Master of the ship</p>
                </div>
            </div>
        </div>
        <div class="col-2" style="text-align: left; padding-top: 5%">
            <p class="m-0">Passenger clandestin</p>
            <p>Any stow away</p>
        </div>
    </div>
</div>
</body>
<!-- JavaScript Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
</html>
