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
            bottom: 0;
            left: 0;
            width: 100%;
        }
        @media print {
            * {
                -webkit-print-color-adjust: exact !important;
                color-adjust: exact !important;
            }
            footer {
                position: fixed;
            }
            select {
                appearance: none;
            }
        }
    </style>
</head>
<body>
    <div class="container-fluid">
        <div class="row">
            <div class="col-4">
                <p>TS-SAN-1</p>
                <p>ID 12-01-2021</p>
            </div>
            <div class="col-4">
                <div class="text-center">
                    <img
                        src="/assets/img/logo.jpg"
                        class="rounded"
                        alt="..."
                    />
                </div>
            </div>
            <div class="col-4"></div>
        </div>
        @yield('content')
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
    </div>
</body>
<!-- JavaScript Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
</html>
