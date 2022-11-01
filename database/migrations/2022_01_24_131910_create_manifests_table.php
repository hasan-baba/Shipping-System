<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateManifestsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('manifests', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->unsignedBigInteger('trip_number_id');
            $table->foreign('trip_number_id')->references('id')->on('trips')->onDelete('cascade');
            $table->text('loading_port');
            $table->date('sailing_date');
            $table->text('discharging_port');
            $table->text('next_discharging_port')->nullable();
            $table->text('process');
            $table->double('total_qty')->nullable();
            $table->double('total_weight')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('manifests');
    }
}
