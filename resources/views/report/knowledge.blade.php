@include('layouts.printbtn')
@extends('layouts.print')
@section('content')
    @include('reportHeader.'.$city)
    <div class="row border">
        <table class="table table-bordered text-center custom-table">
            <tr>
                <td>
                    <div class="row">
                        <div class="col-6 font-weight-bold">رمز الوكيل:</div>
                        <div class="col-6">{{$tripId->agent_code}}</div>
                    </div>
                </td>
                <td>
                    <div class="row">
                        <div class="col-4">المالك المسجل :</div>
                        <div class="col-4">{{$tripId->ship->owner}}</div>
                        <div class="col-4 font-weight-bold">:Owners</div>
                    </div>
                </td>
            </tr>
            <tr>
                <td>
                    <div class="row">
                        <div class="col-6">إسم الوكيل :</div>
                        <div class="col-6 font-weight-bold">:Agent</div>
                        <div class="col-12">{{$tripId->agency_name}} / {{$tripId->agency->agency_name}}</div>
                    </div>
                </td>
                <td>
                    <div class="row">
                        <div class="col-3">الحمولة القائمة :</div>
                        <div class="col-3">MT</div>
                        <div class="col-3">{{$tripId->ship->gross_tonnage}}</div>
                        <div class="col-3 font-weight-bold">:Gross Tonnage</div>
                    </div>
                </td>
            </tr>
            <tr>
                <td>
                    <div class="row">
                        <div class="col-4">إسم السفينة :</div>
                        <div class="col-4">{{$tripId->ship->ship_name}}</div>
                        <div class="col-4 font-weight-bold">:Vessel Name</div>
                    </div>
                </td>
                <td>
                    <div class="row">
                        <div class="col-3">الحمولة الصافية:</div>
                        <div class="col-3">MT</div>
                        <div class="col-3">{{$tripId->ship->net_tonnage}}</div>
                        <div class="col-3 font-weight-bold">:Net Tonnage</div>
                    </div>
                </td>
            </tr>
            <tr>
                <td>
                    <div class="row">
                        <div class="col-4">رقم المنظمة الدولية:</div>
                        <div class="col-4">{{$tripId->ship->imo_number}}</div>
                        <div class="col-4 font-weight-bold">:IMO Number</div>
                    </div>
                </td>
                <td>
                    <div class="row">
                        <div class="col-3">الحمولة الوزنية:</div>
                        <div class="col-3">MT</div>
                        <div class="col-3">{{$tripId->ship->dead_weight}}</div>
                        <div class="col-3 font-weight-bold">:Dead Weight</div>
                    </div>
                </td>
            </tr>
            <tr>
                <td>
                    <div class="row">
                        <div class="col-6">{{$tripId->ship->mssi}}</div>
                        <div class="col-6 font-weight-bold">:MMSI</div>
                    </div>
                </td>
                <td>
                    <div class="row">
                        <div class="col-3">الغاطس:</div>
                        <div class="col-3">M</div>
                        <div class="col-3">{{$tripId->ship->draft}}</div>
                        <div class="col-3 font-weight-bold">:Draft</div>
                    </div>
                </td>
            </tr>
            <tr>
                <td>
                    <div class="row">
                        <div class="col-4">جنسيتها:</div>
                        <div class="col-4">{{$tripId->ship->flag}}</div>
                        <div class="col-4 font-weight-bold">:Flag</div>
                    </div>
                </td>
                <td>
                    <div class="row">
                        <div class="col-6">مرفأ ما قبل الأخير</div>
                        <div class="col-6">{{$tripId->ship_launching_port}}</div>
                    </div>
                </td>
            </tr>
            <tr>
                <td>
                    <div class="row">
                        <div class="col-4">نوعها :</div>
                        <div class="col-4">{{$tripId->ship->shiptype->ship_type_name}}</div>
                        <div class="col-4 font-weight-bold">:Type</div>
                    </div>
                </td>
                <td>
                    <div class="row">
                        <div class="col-4">قادمة من:</div>
                        <div class="col-4">{{$tripId->ship_coming_from}}</div>
                        <div class="col-4 font-weight-bold">:Coming From</div>
                    </div>
                </td>
            </tr>
            <tr>
                <td>
                    <div class="row">
                        <div class="col-4">تاريخ البناء:</div>
                        <div class="col-4">{{$tripId->ship->date_of_built}}</div>
                        <div class="col-4 font-weight-bold">:Built</div>
                    </div>
                </td>
                <td>
                    <div class="row">
                        <div class="col-4">الى مرفأ :</div>
                        <div class="col-4">{{$tripId->port->port_name}}</div>
                        <div class="col-4 font-weight-bold">:To Port</div>
                    </div>
                </td>
            </tr>
            <tr>
                <td>
                    <div class="row">
                        <div class="col-3">الطول الكلي:</div>
                        <div class="col-3">M</div>
                        <div class="col-3">{{$tripId->ship->overall_length}}</div>
                        <div class="col-3 font-weight-bold">:Length</div>
                    </div>
                </td>
                <td>
                    <div class="row">
                        <div class="col-3">الوصول المتوقع:</div>
                        <div class="col-3">{{$tripId->expected_arrival_date}}</div>
                        <div class="col-3 font-weight-bold">:Arrival Date</div>
                        <div class="col-1">الساعه:</div>
                        <div class="col-2">
                            @if ($tripId->expected_arrival_time == "Morning")
                                صباحاً
                            @elseif($tripId->expected_arrival_time == "Midday")
                                ظهراً
                            @else
                                مساءً
                            @endif
                        </div>
                    </div>
                </td>
            </tr>
            <tr>
                <td>
                    <div class="row">
                        <div class="col-4">حروف النداء:</div>
                        <div class="col-4">{{$tripId->ship->call_sign}}</div>
                        <div class="col-4 font-weight-bold">:Call Sign</div>
                    </div>
                </td>
                <td>
                    <div class="row">
                        <div class="col-4">مغادرة الى</div>
                        <div class="col-4">ORDER</div>
                        <div class="col-4 font-weight-bold">:Destination</div>
                    </div>
                </td>
            </tr>
            <tr>
                <td>
                    <div class="row">
                        <div class="col-4">اسم القبطان:</div>
                        <div class="col-4">{{$tripId->captain_name}}</div>
                        <div class="col-4 font-weight-bold">:Captain</div>
                    </div>
                </td>
                <td>
                    <div class="row">
                        <div class="col-4">تاريخ المغادرة:</div>
                        <div class="col-4">ORDER</div>
                        <div class="col-4 font-weight-bold">:Sailing Date</div>
                    </div>
                </td>
            </tr>
            <tr>
                <td colspan="2">
                    <div class="row">
                        <div class="col-4">ميناء التسجيل:</div>
                        <div class="col-4">{{$tripId->ship->registry_port}}</div>
                        <div class="col-4 font-weight-bold">:Registry Port</div>
                    </div>
                </td>
            </tr>
        </table>
    </div>
    <div class="row border">
        <table class="table table-bordered text-center caption-top">
            <caption class="text-center text-dark">
                البضائع
            </caption>
            <tr>
                <td>
                    <div class="row">
                        <div class="col-4 font-weight-bold">
                            نوع و كمية البضاعة المنوي تفريغها
                        </div>
                        <div class="col-2">{{$tripId->cargo->cargo_name}}</div>
                        <div class="col-1">  حوالي:</div>
                        <div class="col-2">{{$tripId->unload_quantity}}</div>
                        <div class="col-2">طن متري</div>
                    </div>
                    <div class="row">
                        <div class="col-4 font-weight-bold">
                        </div>
                        <div class="col-2">{{$tripId->cargo->cargo_arabic_name}}</div>
                        <div class="col-1"></div>
                        <div class="col-2"></div>
                        <div class="col-2"></div>
                    </div>
                </td>
                <td>
                    <div class="row">
                        <div class="col-12">
                            عدد المستوعبات: ------- لا يوجد---------
                        </div>
                    </div>
                </td>
            </tr>
            <tr>
                <td>
                    <div class="row">
                        <div class="col-4 font-weight-bold">
                            نوع و كمية البضاعة المنوي شحنها
                        </div>
                        <div class="col-2">{{$tripId->loaded_cargo}}</div>
                        <div class="col-1">  حوالي:</div>
                        <div class="col-2">{{$tripId->loading_weight}}</div>
                        <div class="col-2">طن متري</div>
                    </div>
                </td>
                <td>
                    <div class="row">
                        <div class="col-12">عدد المستوعبات :----- "----------</div>
                    </div>
                </td>
            </tr>
            <tr>
                <td>
                    <div class="row">
                        <div class="col-6 font-weight-bold">نوع البضاعة:</div>
                        <div class="col-6">{{$tripId->cargo->cargo_name}}</div>
                    </div>
                </td>
                <td>
                    <div class="row">
                        <div class="col-12">مواد خطرة * :------- " ---------</div>
                    </div>
                </td>
            </tr>
            <tr>
                <td>
                    <div class="row">
                        <div class="col-6 font-weight-bold">
                            عدد أيام التفريغ المتوقعة :
                        </div>
                        <div class="col-6 font-weight-bold">
                            عدد أيام الشحن المتوقعة :
                        </div>
                    </div>
                </td>
                <td></td>
            </tr>
        </table>
    </div>
    <div class="row">
        <div class="col-6">
            <p>
                * الاسم التجاري + ( CORRECT TECHNICAL NAME / PROPER SHIPPING NAME )
            </p>
        </div>
        <div class="col-6">
            <p style="text-align: left">توقيع وختم الوكيل</p>
            <p style="text-align: left">هــانــي الــتـريـــاقـــــي 676883-70</p>
        </div>
    </div>
    <div class="row border">
        <table class="table table-bordered caption-top m-0">
            <caption class="text-dark" style="float: right">
                خاص بالإدارة
            </caption>
            <tr>
                <td>
                    <div class="row">
                        <div class="col-6">سلمت بواسطة:</div>
                        <div class="col-6"></div>
                    </div>
                </td>
                <td>
                    <div class="row">
                        <div class="col-6">اسم المستلم:</div>
                        <div class="col-6"></div>
                    </div>
                </td>
                <td>
                    <div class="row">
                        <div class="col-6">التاريخ:</div>
                        <div class="col-6"></div>
                    </div>
                </td>
            </tr>
            <tr>
                <td>
                    <div class="row">
                        <div class="col-6">اسم الملقن:</div>
                        <div class="col-6"></div>
                    </div>
                </td>
                <td>
                    <div class="row">
                        <div class="col-6">تاريخ التدخيل:</div>
                        <div class="col-6"></div>
                    </div>
                </td>
                <td>
                    <div class="row">
                        <div class="col-12">
                            <p class="text-left" style="text-align: left">(تدخل بواسطة الملقن) :BOOKING NUMBER</p>
                        </div>
                    </div>
                </td>
            </tr>
        </table>
    </div>
@endsection
