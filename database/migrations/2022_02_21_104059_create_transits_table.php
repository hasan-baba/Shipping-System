<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTransitsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('transits', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->unsignedBigInteger('manifest_id');
            $table->foreign('manifest_id')->references('id')->on('manifests')->onDelete('cascade');
            $table->double('transitQty')->nullable();
            $table->double('transitWeight')->nullable();
            $table->text('transitPack')->nullable();
            $table->text('transitCargo')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('transits');
    }
}
