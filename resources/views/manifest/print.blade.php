@extends('layouts.master')
@section('title')
    | Print
@endsection
@section('content')
    <p class="h4">Print <small class="text-primary">(Manifest Nb. {{$manifest->id}})</small> </p>
    <div class="pt-4">
        <div class="row">
            <div class="col-md-6">
                <div class="print">
                    <p class="h4 text-decoration-underline">Cargo Manifest</p>
                    <div class="row mb-1">
                        <div class="col-md-8" style="border-bottom: 1px solid #e5e5e5">
                            <span>BULK Cargo Manifest</span>
                        </div>
                        <div class="col-md-4 text-right">
                            <a href="{{url('/admin/print/bulkcargomn?mn='.$manifest->id)}}" class="btn btn-primary m-0 p-1" target="_blank">Print</a>
                        </div>
                    </div>
                    <div class="row mb-1">
                        <div class="col-md-8" style="border-bottom: 1px solid #e5e5e5">
                            <span>Cargo Manifest</span>
                        </div>
                        <div class="col-md-4 text-right">
                            <a href="{{url('/admin/print/cargomn?mn='.$manifest->id)}}" class="btn btn-primary m-0 p-1" target="_blank">Print</a>
                        </div>
                    </div>
                    <div class="row mb-1">
                        <div class="col-md-8" style="border-bottom: 1px solid #e5e5e5">
                            <span>Blue Manifest</span>
                        </div>
                        <div class="col-md-4 text-right">
                            <a href="{{url('/admin/print/bluemn?mn='.$manifest->id)}}" class="btn btn-primary m-0 p-1" target="_blank">Print</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
