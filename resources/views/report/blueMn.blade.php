<!DOCTYPE html>
<html lang="ar" style="overflow: hidden; font-size: 12px">
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
            border: 1px solid #00b7ef!important;
        }
        td {
            border-right: 1px solid #00b7ef!important;
            border-left: 1px solid #00b7ef!important;
        }
        p {
            padding: 0;
            margin: 0;
        }
    </style>
</head>
@include('layouts.printbtn')
<body style="color: #00b7ef">
<div class="container-fluid">
    <div class="row">
        <div class="col-4 py-2" style="border: 1px solid #00b7ef">
            <div class="row pb-1" style="border-bottom: 1px solid #00b7ef">
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
                        <div style="border-bottom: 1px solid #00b7ef"></div>
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
                        <div style="border-bottom: 1px solid #00b7ef"></div>
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
                        <div style="border-bottom: 1px solid #00b7ef"></div>
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
                   <input type="text" class="" style="width: 100%; border-bottom: .5px solid #00b7ef; border-top: 0; border-left: 0; border-right: 0">
                   <input type="text" class="" style="width: 100%; border-bottom: .5px solid #00b7ef; border-top: 0; border-left: 0; border-right: 0">
               </div>
               <div class="col-6"><p style="text-align: right">مانيفستو البضاعة المفرغة في ميناء</p></div>
           </div>
            <div class="row">
                <div class="col-12"><p class="m-0">MANIFESTE DES MARCHANDISES DEBARQUEES A</p></div>
                <div class="col-12">
                    <p style="border-bottom: 1px solid #00b7ef; color: black;">{{$manifest->discharging_port}}</p>
                </div>
            </div>
        </div>
        <div class="col-4 py-2" style="border: 1px solid #00b7ef">
            <div class="row pb-1" style="border-bottom: 1px solid #00b7ef">
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
                        <div style="border-bottom: 1px solid #00b7ef"></div>
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
                        <div style="border-bottom: 1px solid #00b7ef"></div>
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
                        <div style="border-bottom: 1px solid #00b7ef"></div>
                    </div>
                </div>
                <div class="col-4" dir="rtl">
                    <p class="m-0">الساعة</p>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <table class="table table-bordered" style="border: 1px solid #00b7ef;">
            <thead style="color: #00b7ef;">
            <th class="p-0">
                <span>NAVIRE ET VOYAGE</span>
                <span style="float: right;">الباخرة / الرحلة</span>
            </th>
            <th class="p-0">
                <span>ARRIVE LE</span>
                <span style="float: right;">الواصلة في</span></th>
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
                <td>{{$manifest->trip->ship->ship_name}}</td>
                <td>{{$manifest->trip->expected_arrival_date}}</td>
                <td>{{$manifest->trip->ship->flag}}</td>
                <td><input type="text" class="border-0" style="width: 100%;"></td>
                <td>{{$manifest->trip->agency_name}}</td>
                <td>{{$manifest->trip->captain_name}}</td>
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
        <table class="table table-bordered" style="border: 1px solid #00b7ef; text-align: center; table-layout: fixed; width: 100%;">
            <thead style="color: #00b7ef;">
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
            <tr class="border-0">
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td style="color: #00b7ef;">WEIGHT MTS</td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
            </tr>
            @php $weight = 0; @endphp
            @foreach($manifest->bills as $bill)
                <tr class="border-0">
                    <td>{{$bill->manifest->loading_port}}</td>
                    <td>
                        <div class="mb-4">
                            <div style="position: relative">
                                <p style="font-weight: bold; text-decoration: underline;">Shipper:</p>
                            </div>
                            <div style="position: absolute">
                                <p>{{$bill->shipper}}</p>
                            </div>
                        </div>
                        <div class="mb-4">
                            <div style="position: relative">
                                <p style="font-weight: bold; text-decoration: underline;">Consignee:</p>
                            </div>
                            <div style="position: absolute">
                                <p>{{$bill->consignee}}</p>
                            </div>
                        </div>
                    </td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td>{{$bill->package->package_name}}</td>
                    <td>{{$bill->cargo->cargo_name}}</td>
                    <td>
                        {{$bill->weight}}
                        @php $weight = $weight + $bill->weight; @endphp
                    </td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                </tr>
            @endforeach
            <tr class="border-0">
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td style="border-top: 2px solid #00b7ef;">{{$weight}} M TONS</td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
            </tr>
            </tbody>
        </table>
    </div>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
