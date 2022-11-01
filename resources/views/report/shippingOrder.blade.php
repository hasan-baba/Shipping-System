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
        td {
            text-align: center;
        }
    </style>
</head>
@include('layouts.printbtn')
<body>
<div class="container-fluid">
    <div class="row">
        <div class="col-8">

        </div>
        <div class="col-4 d-flex align-items-center justify-content-center">
            <p class="m-0">SAIDA</p>
            <input type="text" style="text-align: left; margin-left: 12px;">
        </div>
    </div>
    <div class="row">
        <div class="col-12">
            <p class="text-center" style="text-decoration: underline">
                Shipping Order No.: <input type="text" class="border-0">
            </p>
        </div>
    </div>

    <div class="row m-0">
        <div class="col-6">
            <div class="row">
                <div class="col-5">
                    <p>Vessel Name:</p>
                </div>
                <div class="col-7">
                    <p style="text-align: left">{{$trip->ship->ship_name}}</p>
                </div>
            </div>
            <div class="row">
                <div class="col-5">
                    <p>Port of Loading:</p>
                </div>
                <div class="col-7">
                    <p style="text-align: left"><input type="text" class="border-0"></p>
                </div>
            </div>
            <div class="row">
                <div class="col-5">
                    <p>Destination:</p>
                </div>
                <div class="col-7">
                    <p style="text-align: left"><input type="text" class="border-0"></p>
                </div>
            </div>
            <div class="row">
                <div class="col-5">
                    <p>SHIPPED BY:</p>
                </div>
                <div class="col-7">
                    <p style="text-align: left"><input type="text" class="border-0"></p>
                </div>
            </div>
            <div class="row">
                <div class="col-5">
                    <p>HIRING AGENT:</p>
                </div>
                <div class="col-7">
                    <p style="text-align: left"><input type="text" class="border-0"></p>
                </div>
            </div>
        </div>
    </div>
    <div class="container-fluid">
        <table class="table table-bordered" style="border: 3px solid black">
            <tr>
                <td class="p-0" style="width: 10%">
                    <p class="text-center m-0">
                        Marques
                    </p>
                </td>
                <td class="p-0" style="width: 10%">
                    <p class="text-center">
                        QUANTITY
                    </p>
                </td>
                <td class="p-0" style="width: 10%">
                    <p class="text-center">
                        PACKAGE
                    </p>
                </td>
                <td class="p-0" style="width: 55%">
                    <p class="text-center">
                        DESRIPTION
                    </p>
                </td>
                <td class="p-0" style="width: 15%">
                    <p class="text-center">
                        WEIGHT (TONS)
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
    </div>
    <div class="row m-0">
        <div class="col-12">
            <p>
                Amount to be paid at <span style="font-weight: bold"><input type="text" class="border-0"></span>
            </p>
        </div>
    </div>
    <div class="row mt-3">
        <div class="col-7">
            <p>ACCEPTANCE IS SUBJECT TO MASTER’S APPROVAL</p>
        </div>
        <div class="col-5">
            <p class="text-center" style="font-weight: bold">TIRIAKY SHIPPING</p>
            <p class="text-center" style="font-weight: bold">(as agents only)</p>
        </div>
    </div>
</div>
</body>
</html>
