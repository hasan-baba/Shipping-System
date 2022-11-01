<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateShipsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ships', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->text('ship_name');
            $table->text('ex_name');
            $table->unsignedBigInteger('ship_type');
            $table->foreign('ship_type')->references('id')->on('ship_types')->onDelete('cascade');
            $table->text('color')->nullable();
            $table->text('flag');
            $table->double('mssi');
            $table->double('imo_number')->unique();
            $table->text('issc')->nullable();
            $table->text('call_sign');
            $table->text('registry_port')->nullable();
            $table->date('registration_date')->nullable();
            $table->text('registration_number')->nullable();
            $table->text('owner')->nullable();
            $table->text('charterers')->nullable();
            $table->double('date_of_built');
            $table->text('net_tonnage');
            $table->text('gross_tonnage');
            $table->text('dead_weight');
            $table->text('speed')->nullable();
            $table->text('overall_length');
            $table->text('draft');
            $table->text('breadth');
            $table->text('depth')->nullable();
            $table->date('annuel_survey_of_machinery')->nullable();
            $table->date('pollition_certificate')->nullable();
            $table->date('load_line_certificate')->nullable();
            $table->date('safety_equipment_certificate')->nullable();
            $table->date('safety_construction_certificate')->nullable();
            $table->date('classification_certificate')->nullable();
            $table->date('radio_telegraphy_certificate')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('ships');
    }
}
