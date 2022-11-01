<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDischargingPlansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('discharging_plans', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->unsignedBigInteger('cargo_id');
            $table->foreign('cargo_id')->references('id')->on('cargos')->onDelete('cascade');
            $table->unsignedBigInteger('trip_id');
            $table->foreign('trip_id')->references('id')->on('trips')->onDelete('cascade');
            $table->double('discharging_qty');
            $table->double('discharging_wght');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('discharging_plans');
    }
}
