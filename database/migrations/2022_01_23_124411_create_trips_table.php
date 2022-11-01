<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTripsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('trips', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->double('trip_number');
            $table->date('trip_date')->nullable();
            $table->unsignedBigInteger('ship_name_id');
            $table->foreign('ship_name_id')->references('id')->on('ships')->onDelete('cascade');
            $table->text('agent_code');
            $table->text('agency_name')->nullable();
            $table->unsignedBigInteger('agency_name_id')->nullable();
            $table->foreign('agency_name_id')->references('id')->on('agencies')->onDelete('cascade');
            $table->text('ship_launching_port');
            $table->text('ship_coming_from')->nullable();
            $table->unsignedBigInteger('port_name_id');
            $table->foreign('port_name_id')->references('id')->on('ports')->onDelete('cascade');
            $table->text('captain_name');
            $table->date('expected_arrival_date')->nullable();
            $table->text('expected_arrival_time');
            $table->text('company_recieving');
            $table->unsignedBigInteger('package_name_id');
            $table->foreign('package_name_id')->references('id')->on('packages')->onDelete('cascade');
            $table->unsignedBigInteger('cargo_name_id');
            $table->foreign('cargo_name_id')->references('id')->on('cargos')->onDelete('cascade');
            $table->double('shipment_quantity');
            $table->double('unload_quantity')->nullable();
            $table->text('loaded_cargo');
            $table->text('loading_weight');
            $table->integer('crew_number');
            $table->integer('passengers')->nullable();
            $table->integer('passengers_transit')->nullable();
            $table->text('ship_heading_to');
            $table->date('departure_date');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('trips');
    }
}
