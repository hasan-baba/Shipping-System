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
<body style="font-size: 16px">
<div class="container-fluid">
    <div class="row">
        <div class="col-4 text-right">
            <p style="font-weight: bold" class="m-0">الجمهورية اللبنانية</p>
            <p style="font-weight: bold" class="m-0">وزارة الاشغال العامة والنقل</p>
            <p style="font-weight: bold" class="m-0">مصلحة النقل االبحري</p>
            <p style="font-weight: bold" class="m-0">رئاسة مرفأ صيدا</p>
        </div>
        <div class="col-4 text-center">
            <div class="text-right mt-4">
                <p class="m-0">حركـة ســفينة</p>
                <p class="m-0">STATEMENT</p>
                <p class="m-0">
                    IMO . <span class="text-decoration-underline">{{$trip->ship->imo_number}}</span>
                </p>
            </div>
        </div>
        <div class="col-4">
            <p style="font-weight: bold; text-align: left" class="m-0">REPUBLIC OF LEBANON</p>
            <p style="font-weight: bold; text-align: left" class="m-0">
                Ministry of Public Works and Transport
            </p>
            <p style="font-weight: bold; text-align: left" class="m-0">Service of Maritime Affairs</p>
            <p style="font-weight: bold; text-align: left" class="m-0">Harbour Master of SAIDA</p>
        </div>
    </div>
    <div class="row">
        <div class="col-6">
            <p style="font-weight: bold">مقدم إلى رئاسة مرفأ صيدا</p>
        </div>
        <div class="col-6">
            <p style="font-weight: bold; text-align: left">Presented to the Harbour Master of Saida</p>
        </div>
    </div>
    <div class="row">
        <div class="col-2 text-right">انا الموقع ادناه</div>
        <div class="col-8 border-bottom border-dark">
            <p class="m-0 text-center">{{$trip->captain_name}}</p>
        </div>
        <div class="col-2" style="text-align: left">I the undersigned</div>
    </div>
    <div class="row">
        <div class="col-2 text-right">ربان الباخرة</div>
        <div class="col-8 border-bottom border-dark">
            <p class="m-0 text-center">{{$trip->ship->ship_name}}</p>
        </div>
        <div class="col-2" style="text-align: left">/Master of the M</div>
    </div>
    <div class="row">
        <div class="col-4">
            <p class="m-0">اصرح على مسؤوليتي الخاصة بأن مواصفات باخرتي هي :</p>
        </div>
        <div class="col-8">
            <p class="m-0" style="text-align: left">
                :Declare on my own responsibility that the charactertatics of my
                Ship are as follows
            </p>
        </div>
    </div>
    <div class="row">
        <div class="col-2 text-right">العلـــــــم :</div>
        <div class="col-8 border-bottom border-dark">
            <p class="m-0 text-center">{{$trip->ship->flag}}</p>
        </div>
        <div class="col-2" style="text-align: left">:Flag</div>
    </div>
    <div class="row">
        <div class="col-2 text-right">مرفأ التسـجيل :</div>
        <div class="col-8 border-bottom border-dark">
            <p class="m-0 text-center">{{$trip->ship->registry_port}}</p>
        </div>
        <div class="col-2" style="text-align: left">:Port of registry</div>
    </div>
    <div class="row">
        <div class="col-2 text-right">المحمول الصافي:</div>
        <div class="col-7 border-bottom border-dark text-center">
            <span>Tons</span>
            <p class="m-0 d-inline-block">{{$trip->ship->net_tonnage}}</p>
        </div>
        <div class="col-3" style="text-align: left">:Net Register Tonnage</div>
    </div>
    <div class="row">
        <div class="col-2 text-right">المحمول القائم: </div>
        <div class="col-8 border-bottom border-dark text-center">
            <span>Tons</span>
            <p class="m-0 d-inline-block">{{$trip->ship->gross_tonnage}}</p>
        </div>
        <div class="col-2" style="text-align: left">:Gross Tonnage</div>
    </div>
    <div class="row text-right">
        <div class="col-2">الاستيعاب:</div>
        <div class="col-7 border-bottom border-dark text-center">
            <span>Tons</span>
            <p class="m-0 d-inline-block">{{$trip->ship->dead_weight}}</p>
        </div>
        <div class="col-3" style="text-align: left">:Dead Weight Tonnage</div>
    </div>
    <div class="row text-right">
        <div class="col-2">تاريخ الانشاء:</div>
        <div class="col-8 border-bottom border-dark">
            <p class="m-0 text-center">{{$trip->ship->date_of_built}}</p>
        </div>
        <div class="col-2" style="text-align: left">:Date of Built</div>
    </div>
    <div class="row text-right">
        <div class="col-2">السرعة:</div>
        <div class="col-8 border-bottom border-dark">
            <p class="m-0 text-center">{{$trip->ship->speed}}</p>
        </div>
        <div class="col-2" style="text-align: left">:Speed</div>
    </div>
    <div class="row text-right">
        <div class="col-2">الطول الاكبر:</div>
        <div class="col-8 border-bottom border-dark text-center">
            <span>M</span>
            <p class="m-0 d-inline-block">{{$trip->ship->overall_length}}</p>
        </div>
        <div class="col-2" style="text-align: left">:Overall length</div>
    </div>
    <div class="row text-right">
        <div class="col-3">الغاطس في الماء بحمولة كاملة :صيفا"</div>
        <div class="col-4 border-bottom border-dark text-center">
            <span>M</span>
            <p class="m-0 d-inline-block">{{$trip->ship->draft}}</p>
        </div>
        <div class="col-5" style="text-align: left">:Loaded Draft with full Cargo : Summer</div>
    </div>
    <div class="row text-right">
        <div class="col-3">الغاطس في الماء بحمولة كاملة : شتاء"</div>
        <div class="col-5 border-bottom border-dark text-center">
            <span>M</span>
            <p class="m-0 text-center d-inline-block">{{$trip->ship->draft}}</p>
        </div>
        <div class="col-4" style="text-align: left">:Loaded Draft with full Cargo : Winter</div>
    </div>
    <div class="row text-right">
        <div class="col-2">العرض:</div>
        <div class="col-8 border-bottom border-dark text-center">
            <span>M</span>
            <p class="m-0 d-inline-block">{{$trip->ship->breadth}}</p>
        </div>
        <div class="col-2" style="text-align: left">:Breadth</div>
    </div>
    <div class="row text-right">
        <div class="col-3">العمق من السطح الرئيسي حتى القعر:</div>
        <div class="col-4 border-bottom border-dark text-center">
            <span>M</span>
            <p class="m-0 d-inline-block">{{$trip->ship->depth}}</p>
        </div>
        <div class="col-5" style="text-align: left">:Depth from the main deep to the bottom</div>
    </div>
    <div class="row text-right">
        <div class="col-3">شهادة التلوث : صالحة لغاية:</div>
        <div class="col-5 border-bottom border-dark">
            <p class="m-0 text-center">{{$trip->ship->pollition_certificate}}</p>
        </div>
        <div class="col-4" style="text-align: left">:Pollution Certificate : Valid untill</div>
    </div>
    <div class="row text-right">
        <div class="col-3">شهادة سلامة التجهيزات : صالحة لغاية:</div>
        <div class="col-4 border-bottom border-dark">
            <p class="m-0 text-center">{{$trip->ship->safety_equipment_certificate}}</p>
        </div>
        <div class="col-5" style="text-align: left">:Safety Equipment Certificate : Valid untill</div>
    </div>
    <div class="row text-right">
        <div class="col-3">شهادة سلامة الراديو: صالحة لغاية:</div>
        <div class="col-4 border-bottom border-dark">
            <p class="m-0 text-center">{{$trip->ship->radio_telegraphy_certificate}}</p>
        </div>
        <div class="col-5" style="text-align: left">:Radio Telegraphy Certificate : Valid untill</div>
    </div>
    <div class="row text-right">
        <div class="col-3">شهادة سلامة الانشاء : صالحة لغاية:</div>
        <div class="col-4 border-bottom border-dark">
            <p class="m-0 text-center">{{$trip->ship->safety_construction_certificate}}</p>
        </div>
        <div class="col-5" style="text-align: left">:Safety Construction Certificate : Valid untill</div>
    </div>
    <div class="row text-right">
        <div class="col-3">شهادة التصنيف : صالحة لغاية:</div>
        <div class="col-5 border-bottom border-dark">
            <p class="m-0 text-center">{{$trip->ship->classification_certificate}}</p>
        </div>
        <div class="col-4" style="text-align: left">:Classification Certificate : Valid untill</div>
    </div>
    <div class="row text-right">
        <div class="col-4">الكشف السنوي على المحركات : صالح لغلية:</div>
        <div class="col-3 border-bottom border-dark">
            <p class="m-0 text-center">{{$trip->ship->annuel_survey_of_machinery}}</p>
        </div>
        <div class="col-5" style="text-align: left">:Annuel Survey of Machinery : Valid untill</div>
    </div>
    <div class="row text-right">
        <div class="col-4">شهادة خط العوم : تاريخ الكشف السنوي:</div>
        <div class="col-3 border-bottom border-dark">
            <p class="m-0 text-center">{{$trip->ship->load_line_certificate}}</p>
        </div>
        <div class="col-5" style="text-align: left">:Load Line Certificate : Date of annuel survey</div>
    </div>
    <div class="row text-right">
        <div class="col-2">المالكون:</div>
        <div class="col-8 border-bottom border-dark">
            <p class="m-0 text-center">{{$trip->ship->owner}}</p>
        </div>
        <div class="col-2" style="text-align: left">:Owners</div>
    </div>
    <div class="row text-right">
        <div class="col-2">المستأجرون:</div>
        <div class="col-8 border-bottom border-dark">
            <p class="m-0 text-center">{{$trip->ship->charterers}}</p>
        </div>
        <div class="col-2" style="text-align: left">:Charterers</div>
    </div>
    <div class="row text-right">
        <div class="col-2">الوكيل البحري:</div>
        <div class="col-8 border-bottom border-dark">
            <p class="m-0 text-center" dir="ltr">{{$trip->agency_name}}</p>
        </div>
        <div class="col-2" style="text-align: left">:Agents</div>
    </div>
    <div class="row text-right">
        <div class="col-4">المرافىء التي مرت بها مع تواريخ الابحار:</div>
        <div class="col-4 border-bottom border-dark">
            <p class="m-0 text-center">{{$trip->ship_coming_from}}</p>
        </div>
        <div class="col-4" style="text-align: left">
            :Ports already called at with dates of departure
        </div>
    </div>
    <div class="row text-right">
        <div class="col-2">
            <p class="m-0">البضائع المنقولة</p>
        </div>
        <div class="col-1 border-bottom border-dark">
            <p class="m-0">MT</p>
        </div>
        <div class="col-2 border-bottom border-dark">
            <p class="m-0">{{$trip->shipment_quantity}}</p>
        </div>
        <div class="col-2 border-bottom border-dark">
            <p class="m-0">{{$trip->package->package_name}}</p>
        </div>
        <div class="col-3 border-bottom border-dark">
            <p class="m-0">{{$trip->cargo->cargo_name}}</p>
        </div>
        <div class="col-2">
            <p class="m-0" style="text-align: left">:Inward Cargo</p>
        </div>
    </div>
    <div class="row text-right">
        <div class="col-2">عدد المسافرين:</div>
        <div class="col-6 border-bottom border-dark">
            <p class="m-0 text-center">{{$trip->passengers}}</p>
        </div>
        <div class="col-4" style="text-align: left">:Number of Passengers</div>
    </div>
    <div class="row text-right">
        <div class="col-4">عدد المسافرين (ترانزيت):</div>
        <div class="col-4 border-bottom border-dark">
            <p class="m-0 text-center">{{$trip->passengers_transit}}</p>
        </div>
        <div class="col-4" style="text-align: left">:Number of Passengers in Transit</div>
    </div>
    <div class="row text-right">
        <div class="col-2">عدد افراد الطاقم:</div>
        <div class="col-8 border-bottom border-dark">
            <p class="m-0 text-center">{{$trip->crew_number}}</p>
        </div>
        <div class="col-2" style="text-align: left">:Number of Crew</div>
    </div>
    <div class="row text-right">
        <div class="col-2">وجهة السفر:</div>
        <div class="col-8 border-bottom border-dark">
            <p class="m-0 text-center">{{$trip->ship_heading_to}}</p>
        </div>
        <div class="col-2" style="text-align: left">:Destination</div>
    </div>
    <div class="row">
        <div class="col-12">
            @php $today = date('m - Y'); @endphp
            <span style="float: left">:Date and Time of Anchoring</span>
            <span style="float: left; margin-left: 3rem !important" dir="ltr" class="m-0 border-bottom border-dark">
                {{$today}} AT         HRS
            </span>
        </div>
    </div>
    <div class="row">
        <div class="col-12">
            <span style="float: left">:Date and Time of Berthing</span>
            <span style="float: left; margin-left: 3rem !important" dir="ltr" class="m-0 border-bottom border-dark">
                {{$today}} AT          HRS
            </span>
        </div>
    </div>
    <div class="row" style="margin: 0 2rem 0 5rem !important">
        <div class="col-12">
            <span style="float: left">:Saida the</span>
            <span style="float: left; margin-left: 2rem !important" dir="ltr" class="m-0 border-bottom border-dark">
                {{$today}}
            </span>
        </div>
    </div>
    <div class="row mt-4 text-center">
        <div class="col-6">
            <p>ختم و توقيع القبطان</p>
        </div>
        <div class="col-6">
            <p>Master's Seal and Signature</p>
        </div>
    </div>
</div>
</body>
<!-- JavaScript Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
</html>
