<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Document</title>
    <!--     Fonts and icons     -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
    <!-- CSS only -->
    <link
        href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css"
        rel="stylesheet"
    />
    <style>
        td {
            padding: 0!important;
        }
        footer {
            font-size: 15px;
            position: absolute;
            bottom: 0;
            width: 100%;
            height: 2.5rem;
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
        <div class="row">
            <div class="col-4">
                <p>TS-SAN-1</p>
                <p>ID 12-01-2021</p>
            </div>
            <div class="col-4">
                <div class="text-center">
                    <img src="/assets/img/logo.jpg" class="rounded" alt="..."/>
                </div>
            </div>
            <div class="col-4"></div>
        </div>

        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <p style="text-align: left">صيدا في _ _ _ _ _ _ _ _ _ _ _</p>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <p
                        style="
              text-align: center;
              text-decoration: underline;
              font-weight: bold;
            "
                    >
                        تعهد
                    </p>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <p>كتاب مرجع:</p>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <p>الموضوع: تعهد باستلام جوازات بحرية من مركز أمن العام</p>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <p>
                        نحن وكالة Tiriaky Shipping نتعهد لكم باستلام {{$trip->crew_number}} جواز بحري من
                        مركز أمن عام صيدا و الزهراني
                    </p>
                    <p>
                        بغية تسليمهم لربان الباخرة {{$trip->ship->ship_name}} رافعة العلم {{$trip->ship->flag}} الراسية في
                        {{$trip->port->port_arabic_name}}
                    </p>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <p style="text-align: left">و تفضلوا بقبول فائق الاحترام</p>
                </div>
            </div>
        </div>

        <footer dir="ltr" class="pb-5 border-top">
            <div class="row pb-3">
                <div class="col-3"><i class="fas fa-phone-volume"></i> +961 70 676 883</div>
                <div class="col-3"><i class="fas fa-phone-volume"></i> +961 07 720 715</div>
                <div class="col-3"><i class="fas fa-envelope-open-text"></i> hani@tiriakyshipping.com</div>
                <div class="col-3"><i class="fas fa-tv"></i> tiriakyshipping.com</div>
            </div>
            <div class="row text-center">
                <div class="col-12"><i class="fas fa-location-arrow"></i> Courniche El Baher - Farah 1 Bldg. 4<sup>th</sup> Flr. - Saida, Lebanon</div>
            </div>
        </footer>
    </div>
</body>
<!-- JavaScript Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
</html>

