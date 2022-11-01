@extends('layouts.master')
@section('title')
    | Print
@endsection
@section('content')
    @php
    $array = array(
    'saida' => 'صيدا',
    'jieh' => 'الجية',
    'jiehKojiko' => 'كوجيكو الجية',
    'electricityLebanonCorporation' => 'مؤسسة كهرباء لبنان',
    'zahraniMinistryEnergy' => 'الزهراني وزارة الطاقة',
    'zahraniOilInstallations' => 'الزهراني - منشآت النفط',
    'zahraniHaifCompany' => 'الزهراني - شركة الهيف'
    );
    $array_permissions = array(
    'jieh' => 'الجية',
    'zahrani' => 'جيش الزهراني',
    'saidarmy' => 'جيش صيدا',
    'saida' => 'صيدا'
    );
    @endphp
    <p class="h4">Print <small class="text-primary">(Trip Nb. {{$trip->trip_number}})</small> </p>
    <div class="pt-4">
        <div class="row">
            <div class="col-md-6">
                <div class="print">
                    <p class="h4 text-decoration-underline">Ship's Arrival Docs.</p>
                    <div class="row mb-1">
                        <div class="col-md-8" style="border-bottom: 1px solid #e5e5e5">
                            <span>Ships Particular</span>
                        </div>
                        <div class="col-md-4 text-right">
                            <a href="{{url('/admin/print/shipsparticular?trip='.$trip->id)}}" class="btn btn-primary m-0 p-1" target="_blank">Print</a>
                        </div>
                    </div>
                    <div class="row mb-1">
                        <div class="col-md-8" style="border-bottom: 1px solid #e5e5e5">
                            <span>New Customs Statement</span>
                        </div>
                        <div class="col-md-4 text-right">
                            <a href="{{url('/admin/print/customstatement?trip='.$trip->id)}}" class="btn btn-primary m-0 p-1" target="_blank">Print</a>
                        </div>
                    </div>
                    <div class="row mb-1" >
                        <div class="col-md-8" style="border-bottom: 1px solid #e5e5e5">
                            <span>MOTOR BOAT</span>
                        </div>
                        <div class="col-md-4 text-right">
                            <a href="{{url('/admin/print/motor?trip='.$trip->id.'&motor=boat')}}" class="btn btn-primary m-0 p-1" target="_blank">Print</a>
                        </div>
                    </div>
                    <div class="row mb-1">
                        <div class="col-md-8" style="border-bottom: 1px solid #e5e5e5">
                            <span>MOTOR CAR</span>
                        </div>
                        <div class="col-md-4 text-right">
                            <a href="{{url('/admin/print/motor?trip='.$trip->id.'&motor=car')}}" class="btn btn-primary m-0 p-1" target="_blank">Print</a>
                        </div>
                    </div>
                    <div class="row mb-1">
                        <div class="col-md-8" style="border-bottom: 1px solid #e5e5e5">
                            <span>أمن عام صيدا</span>
                        </div>
                        <div class="col-md-4 text-right">
                            <a href="{{url('/admin/print/saidageneralsecurity?trip='.$trip->id)}}" class="btn btn-primary m-0 p-1" target="_blank">Print</a>
                        </div>
                    </div>
                    <div class="row mb-1">
                        <div class="col-md-8" style="border-bottom: 1px solid #e5e5e5">
                            <span>أمن عام الجيه</span>
                        </div>
                        <div class="col-md-4 text-right">
                            <a href="{{url('/admin/print/jiengeneralsecurity?trip='.$trip->id)}}" class="btn btn-primary m-0 p-1" target="_blank">Print</a>
                        </div>
                    </div>
                    <div class="row mb-1">
                        <div class="col-md-8" style="border-bottom: 1px solid #e5e5e5">
                            <span>Customer Satisfaction Survey</span>
                        </div>
                        <div class="col-md-4 text-right">
                            <a href="{{url('/admin/print/customersatisfaction?trip='.$trip->id)}}" class="btn btn-primary m-0 p-1" target="_blank">Print</a>
                        </div>
                    </div>
                    <div class="row mb-1">
                        <div class="col-md-8" style="border-bottom: 1px solid #e5e5e5">
                            <span>Customer Satisfaction Survey - WSS</span>
                        </div>
                        <div class="col-md-4 text-right">
                            <a href="{{url('/admin/print/customersatisfactionwss?trip='.$trip->id)}}" class="btn btn-primary m-0 p-1" target="_blank">Print</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="print" dir="rtl">
                    <p class="h4 text-decoration-underline text-right">علم و خبر</p>
                    @foreach ($array as $key => $value)
                        <div class="row mb-1">
                            <div class="col-md-6 text-right" style="border-bottom: 1px solid #e5e5e5">
                                <span>علم و خبر {{$value}}</span>
                            </div>
                            <div class="col-md-6 text-right">
                                <a href="{{url('/admin/print/knowledge?trip='.$trip->id.'&city='.$key.'&cancel=false')}}" class="btn btn-primary m-0 p-1" target="_blank">Print</a>
                                <a href="{{url('/admin/print/knowledge?trip='.$trip->id.'&city='.$key.'&cancel=true')}}" class="btn btn-danger m-0 p-1" target="_blank">Cancel</a>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6">
                <div class="print">
                    <p class="h4 text-decoration-underline">Cargo Manifest / Recapitulation</p>
                    <div class="row mb-1">
                        <div class="col-md-8" style="border-bottom: 1px solid #e5e5e5">
                            <span>Cargo Recapitulation</span>
                        </div>
                        <div class="col-md-4 text-right">
                            <a href="{{url('/admin/print/cargorecap?trip='.$trip->id)}}" class="btn btn-primary m-0 p-1" target="_blank">Print</a>
                        </div>
                    </div>
                    <div class="row mb-1">
                        <div class="col-md-8" style="border-bottom: 1px solid #e5e5e5">
                            <span>Cargo Recapitulation - Multiple Cargo</span>
                        </div>
                        <div class="col-md-4 text-right">
                            <a href="{{url('/admin/print/cargorecapmultiple?trip='.$trip->id)}}" class="btn btn-primary m-0 p-1" target="_blank">Print</a>
                        </div>
                    </div>
                    <div class="row mb-1" >
                        <div class="col-md-8" style="border-bottom: 1px solid #e5e5e5">
                            <span>Cargo Recapitulation - Lebanese Ports</span>
                        </div>
                        <div class="col-md-4 text-right">
                            <a href="{{url('/admin/print/cargorecaplebport?trip='.$trip->id)}}" class="btn btn-primary m-0 p-1" target="_blank">Print</a>
                        </div>
                    </div>
                    <div class="row mb-1">
                        <div class="col-md-8" style="border-bottom: 1px solid #e5e5e5">
                            <span>Cargo Recapitulation - Next Port</span>
                        </div>
                        <div class="col-md-4 text-right">
                            <a href="{{url('/admin/print/cargorecapnextport?trip='.$trip->id)}}" class="btn btn-primary m-0 p-1" target="_blank">Print</a>
                        </div>
                    </div>
                    <div class="row mb-1">
                        <div class="col-md-8" style="border-bottom: 1px solid #e5e5e5">
                            <span>Cargo Recapitulation (Table Form)</span>
                        </div>
                        <div class="col-md-4 text-right">
                            <a href="{{url('/admin/print/cargorecaptableform?trip='.$trip->id)}}" class="btn btn-primary m-0 p-1" target="_blank">Print</a>
                        </div>
                    </div>
                    <div class="row mb-1">
                        <div class="col-md-8" style="border-bottom: 1px solid #e5e5e5">
                            <span>Red Manifest</span>
                        </div>
                        <div class="col-md-4 text-right">
                            <a href="{{url('/admin/print/redmn?trip='.$trip->id)}}" class="btn btn-primary m-0 p-1" target="_blank">Print</a>
                        </div>
                    </div>
                    <div class="row mb-1">
                        <div class="col-md-8" style="border-bottom: 1px solid #e5e5e5">
                            <span>Red Manifest without Qty</span>
                        </div>
                        <div class="col-md-4 text-right">
                            <a href="{{url('/admin/print/redmnoqty?trip='.$trip->id)}}" class="btn btn-primary m-0 p-1" target="_blank">Print</a>
                        </div>
                    </div>
                    <div class="row mb-1">
                        <div class="col-md-8" style="border-bottom: 1px solid #e5e5e5">
                            <span>Empty Red Manifest</span>
                        </div>
                        <div class="col-md-4 text-right">
                            <a href="{{url('/admin/print/emptyredmn?trip='.$trip->id)}}" class="btn btn-primary m-0 p-1" target="_blank">Print</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="print" dir="rtl">
                    <p class="h4 text-decoration-underline text-right">إذن بالمغادرة</p>
                    @foreach ($array_permissions as $key => $value)
                        <div class="row mb-1">
                            <div class="col-md-6 text-right" style="border-bottom: 1px solid #e5e5e5">
                                <span>إذن بالمغادرة - {{$value}}</span>
                            </div>
                            <div class="col-md-6 text-right">
                                <a href="{{url('/admin/print/permessionleave'.$key.'?trip='.$trip->id)}}" class="btn btn-primary m-0 p-1" target="_blank">Print</a>
                            </div>
                        </div>
                    @endforeach
                    <div class="row mb-1">
                        <div class="col-md-6 text-right" style="border-bottom: 1px solid #e5e5e5">
                            <span>تعهد باستلام جوازات سفر</span>
                        </div>
                        <div class="col-md-6 text-right">
                            <a href="{{url('/admin/print/receivepassport?trip='.$trip->id.'&city='.$key.'&cancel=false')}}" class="btn btn-primary m-0 p-1" target="_blank">Print</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6">
                <div class="print">
                    <p class="h4 text-decoration-underline">Others</p>
                    <div class="row mb-1">
                        <div class="col-md-8" style="border-bottom: 1px solid #e5e5e5">
                            <span>Delivery Bon</span>
                        </div>
                        <div class="col-md-4 text-right">
                            <a href="{{url('/admin/print/deliverybon?trip='.$trip->id)}}" class="btn btn-primary m-0 p-1" target="_blank">Print</a>
                        </div>
                    </div>
                    <div class="row mb-1">
                        <div class="col-md-8" style="border-bottom: 1px solid #e5e5e5">
                            <span>Shipping Order</span>
                        </div>
                        <div class="col-md-4 text-right">
                            <a href="{{url('/admin/print/shippingorder?trip='.$trip->id)}}" class="btn btn-primary m-0 p-1" target="_blank">Print</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="print" dir="rtl">
                    <p class="h4 text-decoration-underline text-right">Crew Change / Boarding Permits</p>
                    <div class="row mb-1">
                        <div class="col-md-7 text-right" style="border-bottom: 1px solid #e5e5e5">
                            <span>طلب تعيين بحارة - الجية</span>
                        </div>
                        <div class="col-md-5 text-right">
                            <a href="{{url('/admin/print/assigncrewjieh?trip='.$trip->id)}}" class="btn btn-primary m-0 p-1" target="_blank">Print</a>
                        </div>
                    </div>
                    <div class="row mb-1">
                        <div class="col-md-7 text-right" style="border-bottom: 1px solid #e5e5e5">
                            <span>طلب تعيين بحارة - صيدا</span>
                        </div>
                        <div class="col-md-5 text-right">
                            <a href="{{url('/admin/print/assigncrewsaida?trip='.$trip->id)}}" class="btn btn-primary m-0 p-1" target="_blank">Print</a>
                        </div>
                    </div>
                    <div class="row mb-1">
                        <div class="col-md-7 text-right" style="border-bottom: 1px solid #e5e5e5">
                            <span>طلب تعيين ركاب - صيدا</span>
                        </div>
                        <div class="col-md-5 text-right">
                            <a href="{{url('/admin/print/assignpassenger?trip='.$trip->id)}}" class="btn btn-primary m-0 p-1" target="_blank">Print</a>
                        </div>
                    </div>
                    <div class="row mb-1">
                        <div class="col-md-7 text-right" style="border-bottom: 1px solid #e5e5e5">
                            <span>طلب VISA للبحارة - مطار</span>
                        </div>
                        <div class="col-md-5 text-right">
                            <a href="{{url('/admin/print/visa?trip='.$trip->id)}}" class="btn btn-primary m-0 p-1" target="_blank">Print</a>
                        </div>
                    </div>
                    <div class="row mb-1">
                        <div class="col-md-7 text-right" style="border-bottom: 1px solid #e5e5e5">
                            <span>طلب تأشيرة دخول للمغادرة - الجية</span>
                        </div>
                        <div class="col-md-5 text-right">
                            <a href="{{url('/admin/print/departurejieh?trip='.$trip->id)}}" class="btn btn-primary m-0 p-1" target="_blank">Print</a>
                        </div>
                    </div>
                    <div class="row mb-1">
                        <div class="col-md-7 text-right" style="border-bottom: 1px solid #e5e5e5">
                            <span>طلب تأشيرة دخول للمغادرة - صيدا</span>
                        </div>
                        <div class="col-md-5 text-right">
                            <a href="{{url('/admin/print/departuresaida?trip='.$trip->id)}}" class="btn btn-primary m-0 p-1" target="_blank">Print</a>
                        </div>
                    </div>
                    <div class="row mb-1">
                        <div class="col-md-7 text-right" style="border-bottom: 1px solid #e5e5e5">
                            <span>طلب تأشيرة دخول للمغادرة الركاب- صيدا</span>
                        </div>
                        <div class="col-md-5 text-right">
                            <a href="{{url('/admin/print/departurepassengersaida?trip='.$trip->id)}}" class="btn btn-primary m-0 p-1" target="_blank">Print</a>
                        </div>
                    </div>
                    <div class="row mb-1">
                        <div class="col-md-7 text-right" style="border-bottom: 1px solid #e5e5e5">
                            <span>طلب تصريح للصعود على الباخرة - صيدا</span>
                        </div>
                        <div class="col-md-5 text-right">
                            <a href="{{url('/admin/print/boardpermitsaidazahrani?trip='.$trip->id)}}" class="btn btn-primary m-0 p-1" target="_blank">Print</a>
                        </div>
                    </div>
                    <div class="row mb-1">
                        <div class="col-md-7 text-right" style="border-bottom: 1px solid #e5e5e5">
                            <span>طلب تصريح للصعود على الباخرة - الجية</span>
                        </div>
                        <div class="col-md-5 text-right">
                            <a href="{{url('/admin/print/boardpermitjieh?trip='.$trip->id)}}" class="btn btn-primary m-0 p-1" target="_blank">Print</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6"></div>
            <div class="col-md-6">
                <div class="print" dir="rtl">
                    <p class="h4 text-decoration-underline text-right">رئاسة مرفأ / أمن عام / جمرك</p>
                    <div class="row mb-1">
                        <div class="col-md-7 text-right" style="border-bottom: 1px solid #e5e5e5">
                            <span>اذن سفر</span>
                        </div>
                        <div class="col-md-5 text-right">
                            <a href="{{url('/admin/print/clearancepermission?trip='.$trip->id)}}" class="btn btn-primary m-0 p-1" target="_blank">Print</a>
                        </div>
                    </div>
                    <div class="row mb-1">
                        <div class="col-md-7 text-right" style="border-bottom: 1px solid #e5e5e5">
                            <span>طلب إفادة</span>
                        </div>
                        <div class="col-md-5 text-right">
                            <a href="{{url('/admin/print/requeststatement?trip='.$trip->id)}}" class="btn btn-primary m-0 p-1" target="_blank">Print</a>
                        </div>
                    </div>
                    <div class="row mb-1">
                        <div class="col-md-7 text-right" style="border-bottom: 1px solid #e5e5e5">
                            <span>إفادة</span>
                        </div>
                        <div class="col-md-5 text-right">
                            <a href="{{url('/admin/print/statement?trip='.$trip->id)}}" class="btn btn-primary m-0 p-1" target="_blank">Print</a>
                        </div>
                    </div>
                    <div class="row mb-1">
                        <div class="col-md-7 text-right" style="border-bottom: 1px solid #e5e5e5">
                            <span>تعهد جمرك زيادة / نقص بالوزن - صيدا</span>
                        </div>
                        <div class="col-md-5 text-right">
                            <a href="{{url('/admin/print/obligationsaida?trip='.$trip->id)}}" class="btn btn-primary m-0 p-1" target="_blank">Print</a>
                        </div>
                    </div>
                    <div class="row mb-1">
                        <div class="col-md-7 text-right" style="border-bottom: 1px solid #e5e5e5">
                            <span>تعهد جمرك زيادة / نقص بالوزن - الجيه</span>
                        </div>
                        <div class="col-md-5 text-right">
                            <a href="{{url('/admin/print/obligationjieh?trip='.$trip->id)}}" class="btn btn-primary m-0 p-1" target="_blank">Print</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
