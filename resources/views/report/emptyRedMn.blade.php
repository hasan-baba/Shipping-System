<!DOCTYPE html>
<html lang="ar" style="font-size: 12px">
<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Document</title>
    <link
        href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css"
        rel="stylesheet"
    />
    <style>
        table, tr, tbody {
            border: 1px solid #ff0000!important;
        }
        td {
            border-right: 1px solid #ff0000!important;
            border-left: 1px solid #ff0000!important;
        }
        p {
            margin: 0;
            padding: 0;
        }
        * {
            font-size: 15px;
        }
    </style>
</head>
@include('layouts.printbtn')
<body style="color: #ff0000">
<div class="container-fluid">
    <div class="row">
        <div class="col-4 py-2" style="border: 1px solid #ff0000">
            <div class="row pb-1" style="border-bottom: 1px solid #ff0000">
                <div class="col-4">
                    <p class="m-0">CIE DU PORT</p>
                </div>
                <div class="col-4">
                    <div class="d-abolute">
                        <p class="text-center m-0"><input type="text" class="border-0"></p>
                        <div></div>
                    </div>
                </div>
                <div class="col-4" dir="rtl">
                    <p class="m-0">شركة المرفأ</p>
                </div>
            </div>
            <div class="row pb-1">
                <div class="col-4">
                    <p class="m-0">No. D'ORDRE</p>
                </div>
                <div class="col-4">
                    <div class="d-abolute">
                        <p class="text-center m-0"><input type="text" class="border-0"></p>
                        <div style="border-bottom: 1px solid #ff0000"></div>
                    </div>
                </div>
                <div class="col-4" dir="rtl">
                    <p class="m-0">رقم التسجيل</p>
                </div>
            </div>
            <div class="row pb-1">
                <div class="col-4">
                    <p class="m-0">DEPOSE LE</p>
                </div>
                <div class="col-4">
                    <div class="d-abolute">
                        <p class="text-center m-0"><input type="text" class="border-0"></p>
                        <div style="border-bottom: 1px solid #ff0000"></div>
                    </div>
                </div>
                <div class="col-4" dir="rtl">
                    <p class="m-0">تسلم في</p>
                </div>
            </div>
            <div class="row pb-1">
                <div class="col-4">
                    <p class="m-0">HEURE DE DEPOT</p>
                </div>
                <div class="col-4">
                    <div class="d-abolute">
                        <p class="text-center m-0"><input type="text" class="border-0"></p>
                        <div style="border-bottom: 1px solid #ff0000"></div>
                    </div>
                </div>
                <div class="col-4" dir="rtl">
                    <p class="m-0">الساعة</p>
                </div>
            </div>
        </div>
        <div class="col-4 py-2">
            <div class="row">
                <div class="col-6" style="">
                    <input type="text" class="" style="width: 100%; border-bottom: .5px solid #ff0000; border-top: 0; border-left: 0; border-right: 0">
                    <input type="text" class="" style="width: 100%; border-bottom: .5px solid #ff0000; border-top: 0; border-left: 0; border-right: 0">
                </div>
                <div class="col-6"><p style="text-align: right">مانيفستو البضاعة المفرغة في ميناء</p></div>
            </div>
            <div class="row">
                <div class="col-12"><p class="m-0">MANIFESTE DES MARCHANDISES DEBARQUEES A</p></div>
                <div class="col-12">
                    <p style="border-bottom: 1px solid #ff0000; color: black;"></p>
                </div>
            </div>
        </div>
        <div class="col-4 py-2" style="border: 1px solid #ff0000">
            <div class="row pb-1" style="border-bottom: 1px solid #ff0000">
                <div class="col-4">
                    <p class="m-0">CIE DU PORT</p>
                </div>
                <div class="col-4">
                    <div class="d-abolute">
                        <p class="text-center m-0"><input type="text" class="border-0"></p>
                        <div></div>
                    </div>
                </div>
                <div class="col-4" dir="rtl">
                    <p class="m-0">شركة المرفأ</p>
                </div>
            </div>
            <div class="row pb-1">
                <div class="col-4">
                    <p class="m-0">No. D'ORDRE</p>
                </div>
                <div class="col-4">
                    <div class="d-abolute">
                        <p class="text-center m-0"><input type="text" class="border-0"></p>
                        <div style="border-bottom: 1px solid #ff0000"></div>
                    </div>
                </div>
                <div class="col-4" dir="rtl">
                    <p class="m-0">رقم التسجيل</p>
                </div>
            </div>
            <div class="row pb-1">
                <div class="col-4">
                    <p class="m-0">DEPOSE LE</p>
                </div>
                <div class="col-4">
                    <div class="d-abolute">
                        <p class="text-center m-0"><input type="text" class="border-0"></p>
                        <div style="border-bottom: 1px solid #ff0000"></div>
                    </div>
                </div>
                <div class="col-4" dir="rtl">
                    <p class="m-0">تسلم في</p>
                </div>
            </div>
            <div class="row pb-1">
                <div class="col-4">
                    <p class="m-0">HEURE DE DEPOT</p>
                </div>
                <div class="col-4">
                    <div class="d-abolute">
                        <p class="text-center m-0"><input type="text" class="border-0"></p>
                        <div style="border-bottom: 1px solid #ff0000"></div>
                    </div>
                </div>
                <div class="col-4" dir="rtl">
                    <p class="m-0">الساعة</p>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <table class="table table-bordered" style="border: 1px solid #ff0000;">
            <thead style="color: #ff0000;">
            <th class="p-0">
                <span>NAVIRE ET VOYAGE</span>
                <span style="float: right;">الباخرة / الرحلة</span>
            </th>
            <th class="p-0">
                <span>DEPART LE</span>
                <span style="float: right;">الراحلة  في</span></th>
            <th class="p-0">
                <span>PAVILLON</span>
                <span style="float: right;">العلم</span></th>
            <th class="p-0">
                <span>COMPAGNIE</span>
                <span style="float: right;">الشركة</span>
            </th>
            <th class="p-0">
                <span>AGENT</span>
                <span style="float: right;">الوكيل البحري</span>
            </th>
            <th class="p-0">
                <span>CAPITAINE</span>
                <span style="float: right;">الربان</span>
            </th>
            </thead>
            <tbody>
            <tr>
                <td>{{$trip->ship->ship_name}}</td>
                <td>{{$trip->departure_date}}</td>
                <td>{{$trip->ship->flag}}</td>
                <td><input type="text" class="border-0" style="width: 100%;"></td>
                <td>{{$trip->agency_name}}</td>
                <td>{{$trip->captain_name}}</td>
            </tr>
            </tbody>
        </table>
    </div>
    <div class="row">
        <div class="col-7">
            <p>LA DESCRIPTION DES COLIS EST CELLE DECLAREE PAR L'EXPEDITEUR</p>
        </div>
        <div class="col-5" dir="rt">
            <p style="text-align: right">
                ان اوصاف الطرود هي كما صرح عنها الشاحن
            </p>
        </div>
    </div>
    <div class="row">
        <table class="table table-bordered" style="border: 1px solid #ff0000; text-align: center; table-layout: fixed; width: 99.9%;">
            <thead style="color: #ff0000;">
            <tr>
                <td>
                    <p>PORT EMB</p>
                    <p>ميناء الشحن</p>
                </td>
                <td rowspan="2">
                    1. EXPEDITEUR الشاحن
                    <br />2. DESTINATAIRE المشحون اليه
                </td>
                <td colspan="6">
                    <span style="float: left">DESCIPTION DES COLIS</span>
                    <span style="float: right">اوصاف الطرود</span>
                </td>

                <td rowspan="2">
                    <p>OBSERVATIONS</p>
                    <p>الملاحظات</p>
                </td>
                <td colspan="4">
                    <span style="float: left">APUREMENT</span>
                    <span style="float: right">التسديد</span>
                </td>
            </tr>
            <tr>
                <td>
                    <p>No. B/L</p>
                    <p>ارقام بوليصة الشحن</p>
                </td>
                <td>
                    <p>MARQUE</p>
                    <p>الماركات</p>
                </td>
                <td>
                    <p>NUMERO</p>
                    <p>الأرقام </p>
                </td>
                <td>
                    <p>NOMBRE</p>
                    <p>العدد</p>
                </td>
                <td>
                    <p>EMBALLAGE</p>
                    <p>نوع الغلاف</p>
                </td>
                <td>
                    <p>CONTENU DES COLIS</p>
                    <p>محتويات الطرود</p>
                </td>
                <td>
                    <p>Poids & mesures</p>
                    <p>اوزان و المقاييس </p>
                </td>
                <td>
                    <p>BULLETIN</p>
                    <p>تذكرة التسليم</p>
                </td>
                <td>
                    <p>DATE</p>
                    <p>التاريخ</p>
                </td>
                <td>
                    <p>DECLARATION</p>
                    <p>البيان</p>
                </td>
                <td>
                    <p>NOMBRE</p>
                    <p>العدد</p>
                </td>
            </tr>
            </thead>
            <tbody>
            @for($i=0; $i < 30; $i++)
            <tr class="border-0">
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
            </tr>
            @endfor
            </tbody>
        </table>
    </div>
    <p style="color: black; position: relative; bottom: 20rem; left: 36%; font-size: 25px;">EMPTY FROM {{$trip->port->port_name}} TO {{$trip->ship_heading_to}}</p>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
