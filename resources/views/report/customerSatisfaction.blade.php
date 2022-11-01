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
</head>
@include('layouts.printbtn')
<body>
    <div class="container-fluid p-0">
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
        @php
        function numbers() {
            for($i=1; $i<6; $i++) {
                echo '<span style="border: 1px solid #000000; margin: 0 7% 0 0; padding: 8px 15px;">'.$i.'</span>';
            }
        }
        @endphp
        <div class="container-fluid" style="font-size: 13px" dir="ltr">
            <div class="row">
                <table class="table table-bordered">
                    <tbody>
                    <tr>
                        <td>
                            <div class="row">
                                <div class="col-12">Office: Saida</div>
                            </div>
                        </td>
                        <td>
                            <div class="row">
                                <div class="col-12">Port: {{$trip->port->port_name}}</div>
                            </div>
                        </td>
                        <td>
                            <div class="row">
                                <div class="col-12">Vessel: {{$trip->ship->ship_name}}</div>
                            </div>
                        </td>
                        <td>
                            <div class="row">
                                <div class="col-12">Date: {{$trip->expected_arrival_date}}</div>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td colspan="4">VOSS Job ID:</td>
                    </tr>
                    <tr>
                        <td colspan="4" style="background-color: #f5f5f5">
                            <div class="row">
                                <div class="col-12">
                                    <h4 style="text-align: center" class="m-0">
                                        Customer Satisfaction Survey
                                    </h4>
                                </div>
                            </div>
                        </td>
                    </tr>
                    </tbody>
                </table>
            </div>
            <div class="row">
                <div class="col-12">
                    <p class="m-0">Dear Captain,</p>
                    <p class="m-0">
                        Tiriaky Shipping S.A.R.L. is committed to improve its service
                        performance on a continuous basis to ensure customer satisfaction.
                        Feedback is important to help us fulfill customer's expectations,
                        and it would be greatly appreciated if you would complete this
                        survery and return it to your agent during this visit. Thank you.
                    </p>
                    <div class="row">
                        <div class="col-12">
                            <span class="pr-3" style="font-weight: bold">Score:</span>
                            <span class="px-3" style="font-weight: bold">5. Excellent</span>
                            <span class="px-3" style="font-weight: bold">4. Good</span>
                            <span class="px-3" style="font-weight: bold">3. Satisfactory</span>
                            <span class="px-3" style="font-weight: bold">2. Average</span>
                            <span class="px-3" style="font-weight: bold">1. Must Improve</span>
                            <span class="px-3" style="font-weight: bold">N/A. Not Applicable</span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <p>
                        1. How would you rate the pre arrival information (prospects)
                        provided by your agent?
                    </p>
                </div>
                <div class="col-12" style="padding-left: 2rem; margin-bottom: 12px;">
                    {{numbers()}}
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <p>
                        2. Was your boarding agent prepared and updated regarding
                        requirements related to the port call?
                    </p>
                </div>
                <div class="col-12" style="padding-left: 2rem; margin-bottom: 12px;">
                    {{numbers()}}
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <p>3. Did the arrival / clearance proceeded without delays ?</p>
                </div>
                <div class="col-12" style="padding-left: 2rem; margin-bottom: 12px;">
                    {{numbers()}}
                </div>        </div>
            <div class="row">
                <div class="col-12">
                    <p>
                        4. Was information such as status and expected progress timely and
                        accurate provided for ?
                    </p>
                </div>
                <div class="col-12" style="padding-left: 2rem; margin-bottom: 12px;">
                    {{numbers()}}
                </div>        </div>
            <div class="row">
                <div class="col-12">
                    <p>
                        5. How would you rate the availability of Tiriaky Shipping staff ?
                    </p>
                </div>
                <div class="col-12" style="padding-left: 2rem; margin-bottom: 12px;">
                    {{numbers()}}
                </div>        </div>
            <div class="row">
                <div class="col-12">
                    <p>
                        6. Did any Husbandry service(s) take place? (crew / transfers /
                        spares /stores / cash to master etc) How would you rate our
                        services?
                    </p>
                </div>
                <div class="col-12" style="padding-left: 2rem; margin-bottom: 12px;">
                    {{numbers()}}
                    <span style="border: 1px solid #000000; margin: 0 7% 0 0; padding: 8px 15px;">N/A</span>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <p>
                        7. How would you rate the safety aspects (right personal protective
                        equipment, clothing and correct identification) of your Agent on
                        board the vessel?
                    </p>
                </div>
                <div class="col-12" style="padding-left: 2rem; margin-bottom: 12px;">
                    {{numbers()}}
                </div>        </div>
            <div class="row">
                <div class="col-12">
                    <p>8. Did the departure / clearance proceed without delay ?</p>
                </div>
                <div class="col-12" style="padding-left: 2rem; margin-bottom: 12px;">
                    {{numbers()}}
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <p>
                        9. Overal. How would you rate the services provided by your agent?
                    </p>
                </div>
                <div class="col-12" style="padding-left: 2rem; margin-bottom: 12px;">
                    {{numbers()}}
                </div>
            </div>
            <div class="row mt-2">
                <div class="col-12">
                  <span style="margin-right: 0.5rem">10. Would you recommend Tiriaky Shipping to others?</span>
                    <span style="border: 1px solid #000000; padding: 0.5rem; margin-right: 0.5rem;">YES</span>
                    <span style="border: 1px solid #000000; padding: 0.5rem; margin-right: 0.5rem;">NO</span>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <p style="text-align: right; padding-right: 5rem">
                        Grade: _______
                    </p>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <p>
                        We appreciate the time taken to complete this valuable feedback that
                        will be used to improve our service to you. Comments:
                    </p>
                </div>
                <div class="col-12 mt-3">
                    <p class="border-bottom border-dark"></p>
                </div>
                <div class="col-12 mt-3">
                    <p class="border-bottom border-dark"></p>
                </div>
            </div>
            <div class="row" dir="ltr">
                <div class="col-6">
                    <div class="border-top border-dark w-25 mt-4">
                        <p class="text-center">DATE</p>
                    </div>
                </div>
                <div class="col-6">
                    <div class="border-top border-dark w-50 mt-4" style="float: right">
                        <p class="text-center">MASTER/CHEIF OFFICER</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
