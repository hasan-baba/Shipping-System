<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Document</title>
    <link
        href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css"
        rel="stylesheet"
    />
    <!--     Fonts and icons     -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
    <style>
        @media print {
            table {
                width: 100%;
                table-layout: fixed;
                margin: 0 auto;
                border-collapse: collapse;
            }
            table input {
                width: 50%;
                margin: 3%;
                box-sizing: border-box;
                text-align: center;
            }
            textarea {
                resize: none;
            }
            footer {
                position: fixed;
            }
        }
        input{
            width: 100%;
            box-sizing: border-box;
            outline: none;
            border: 0;
            margin: 2px 0;
            text-align: center;
        }
        footer {
            bottom: 0;
            left: 0;
            width: 100%;
        }
    </style>
</head>
@include('layouts.printbtn')
<body>
<div class="container-fluid">
    <div class="row">
        <div class="col-6 py-2" style="border: 2px solid black">
            <div class="row">
                <div class="col-2">
                    <p class="m-0">S/S</p>
                </div>
                <div class="col-7">
                    <div class="d-abolute">
                        <p class="text-center m-0">{{$trip->ship->ship_name}}</p>
                        <div style="border-bottom: 1px dotted black"></div>
                    </div>
                </div>
                <div class="col-3" dir="rtl">
                    <p class="m-0">الباخرة</p>
                </div>
            </div>
            <div class="row">
                <div class="col-4">
                    <p class="m-0">Arrive le</p>
                </div>
                <div class="col-4">
                    <div class="d-abolute">
                        <p class="text-center m-0"><input type="text" class="border-0"></p>
                        <div style="border-bottom: 1px dotted black"></div>
                    </div>
                </div>
                <div class="col-4" dir="rtl">
                    <p class="m-0">الواصلة في</p>
                </div>
            </div>
            <div class="row">
                <div class="col-4">
                    <p class="m-0">BL. No</p>
                </div>
                <div class="col-4">
                    <div class="d-abolute">
                        <p class="text-center m-0"><input type="text" class="border-0"></p>
                        <div style="border-bottom: 1px dotted black"></div>
                    </div>
                </div>
                <div class="col-4" dir="rtl">
                    <p class="m-0">رقم البوليصة</p>
                </div>
            </div>
            <div class="row">
                <div class="col-3">
                    <p class="m-0">Provenance</p>
                </div>
                <div class="col-6">
                    <div class="d-abolute">
                        <p class="text-center m-0"><input type="text" class="border-0"></p>
                        <div style="border-bottom: 1px dotted black"></div>
                    </div>
                </div>
                <div class="col-3" dir="rtl">
                    <p class="m-0">من ميناء</p>
                </div>
            </div>
            <div class="row">
                <div class="col-3">
                    <p class="m-0">Voy No.</p>
                </div>
                <div class="col-5">
                    <div class="d-abolute">
                        <p class="text-center m-0">{{$trip->trip_number}}</p>
                        <div style="border-bottom: 1px dotted black"></div>
                    </div>
                </div>
                <div class="col-4" dir="rtl">
                    <p class="m-0">رقم السفرة</p>
                </div>
            </div>
        </div>
        <div class="col-3">
            <div class="row">
                <div class="col-12">
                    <p class="text-center">إذن تسليم</p>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <p class="text-center" style="text-decoration: underline">
                        BON DE LIVRAISON
                    </p>
                </div>
            </div>
            <div class="row">
                <div class="col-5">
                    <p style="text-align: right; text-decoration: underline">No</p>
                </div>
                <div class="col-7">
                    <p style="text-align: left">{{$trip->trip_number}}</p>
                </div>
            </div>
        </div>
        <div class="col-3" style="text-align: right">
            <h3>
                <img src="/assets/img/logo.jpg" width="180" class="rounded" alt="..."/>
            </h3>
            <p class="m-0">TS-DB-1 </p>
            <p class="m-0">ID: 12-01-2021</p>
        </div>
    </div>
    <div class="row my-2">
        <div class="col-6">
            <p>Monsieur Le Receveur des Douanes de Saida</p>
        </div>
        <div class="col-6" dir="rtl">
            <p>حضرة أمين جمرك مرفأ صيدا المحترم</p>
        </div>
    </div>
    <div class="row">
        <div class="col-5">
            <p>Nous vous prions de livrer a MM.</p>
        </div>
        <div class="col-4">
            <div class="d-abolute">
                <p class="text-center m-0"><input type="text" class="border-0"></p>
                <div style="border-bottom: 1px dotted black"></div>
            </div>
        </div>
        <div class="col-3" dir="rtl">
            <p>الرجاء تسليم</p>
        </div>
    </div>
    <div class="container-fluid p-0">
        <table class="table table-bordered" style="border: 3px solid black">
            <tr>
                <td class="p-0" style="width: 10%">
                    <p class="text-center m-0">
                        الماركات <br />
                        Marques
                    </p>
                </td>
                <td class="p-0" style="width: 10%">
                    <p class="text-center">
                        الأرقام <br />
                        Nomeros
                    </p>
                </td>
                <td class="p-0" style="width: 10%">
                    <p class="text-center">
                        العدد <br />
                        Nombres
                    </p>
                </td>
                <td class="p-0" style="width: 55%">
                    <p class="text-center">
                        نوع الطرود و المحتويات المصرحة
                        <br />
                        Nature des colis et contenus declares
                    </p>
                </td>
                <td class="p-0" style="width: 15%">
                    <p class="text-center">
                        طن <br />
                        Tons(Metric)
                    </p>
                </td>
            </tr>
            <tbody>
            @for($i = 0; $i < 9; $i++)
            <tr style="border-bottom: 2px dashed black">
                <td class="p-0" style="width: 10%">
                    <input type="number" class="border-0" min="0" step="0.01">
                </td>
                <td class="p-0" style="width: 10%">
                    <input type="number" class="border-0" min="0" step="0.01">
                </td>
                <td class="p-0" style="width: 10%">
                    <input type="number" class="border-0" min="0" step="0.01">
                </td>
                <td class="p-0" style="width: 55%">
                    <textarea style="width: 80%; border: 0"></textarea>
                </td>
                <td class="p-0" style="width: 15%">
                    <input type="number" class="border-0" min="0" step="0.01">
                </td>
            </tr>
            @endfor
            </tbody>
        </table>
        <div>
            <div class="row">
                <div class="col-1">
                    <p>Soit</p>
                </div>
                <div class="col-10">
                    <div class="d-abolute">
                        <p class="text-center m-0"><input type="text"/></p>
                        <div style="border-bottom: 1px dotted black"></div>
                    </div>
                    <div class="d-abolute">
                        <p class="text-center m-0"><input type="text"/></p>
                        <div style="border-bottom: 1px dotted black"></div>
                    </div>
                </div>
                <div class="col-1">
                    <p style="text-align: right">فقط</p>
                </div>
            </div>
            <div class="row mt-2">
               <div class="col-6">
                   <div class="d-flex justify-content-between align-items-center">
                       <p class="text-center m-0">Fret paye d’avance</p>
                       <div class="d-abolute">
                           <p class="text-center m-0"><input type="text"/></p>
                           <div style="border-bottom: 1px dotted black"></div>
                       </div>
                       <p class="text-center m-0">الناولون المدفوع مسبقاً</p>
                   </div>
               </div>
                <div class="col-6">
                    <div class="d-flex justify-content-between align-items-center">
                        <p class="text-center m-0">Debarquement: </p>
                        <div class="d-abolute">
                            <p class="text-center m-0"><span>p.I.</span><input type="text" style="width: 85%"/></p>
                            <div style="border-bottom: 1px dotted black"></div>
                        </div>
                        <p class="text-center m-0"> :رسوم التجريم</p>
                    </div>
                </div>
            </div>
            <div class="row mt-1">
                <div class="col-6">
                    <div class="d-flex justify-content-between align-items-center">
                        <p class="text-center m-0">(Ou bien) fret assigne:</p>
                        <div class="d-abolute">
                            <p class="text-center m-0"><input type="text"/></p>
                            <div style="border-bottom: 1px dotted black"></div>
                        </div>
                        <p class="text-center m-0"> :الناولون المحول</p>
                    </div>
                </div>
                <div class="col-6">
                    <div class="d-flex justify-content-between align-items-center">
                        <p class="text-center m-0">Saida le: </p>
                        <div class="d-abolute">
                            <p class="text-center m-0"><input type="text" style="width: 85%"/></p>
                            <div style="border-bottom: 1px dotted black"></div>
                        </div>
                        <p class="text-center m-0"> :صيدا في </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<footer dir="ltr" class="mt-5">
    <div class="row">
        <div class="col-3"><i class="fas fa-phone-volume"></i> +961 70 676 883</div>
        <div class="col-3"><i class="fas fa-phone-volume"></i> +961 07 720 715</div>
        <div class="col-3"><i class="fas fa-envelope-open-text"></i> hani@tiriakyshipping.com</div>
        <div class="col-3"><i class="fas fa-tv"></i> tiriakyshipping.com</div>
    </div>
    <div class="row text-center">
        <div class="col-12"><i class="fas fa-location-arrow"></i> Courniche El Baher - Farah 1 Bldg. 4<sup>th</sup> Flr. - Saida, Lebanon</div>
    </div>
</footer>
</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
</html>
