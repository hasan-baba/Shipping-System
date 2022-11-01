<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBillofLadingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('billof_ladings', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->unsignedBigInteger('manifest_id');
            $table->foreign('manifest_id')->references('id')->on('manifests')->onDelete('cascade');
            $table->text('billnb');
            $table->text('shipper');
            $table->text('consignee');
            $table->text('notify')->nullable();
            $table->unsignedBigInteger('cargo_id');
            $table->foreign('cargo_id')->references('id')->on('cargos')->onDelete('cascade');
            $table->unsignedBigInteger('package_id');
            $table->foreign('package_id')->references('id')->on('packages')->onDelete('cascade');
            $table->double('quantity');
            $table->double('weight');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('billof_ladings');
    }
}
