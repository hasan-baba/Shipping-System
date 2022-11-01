<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCrewsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('crews', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->unsignedBigInteger('trip_id');
            $table->foreign('trip_id')->references('id')->on('trips')->onDelete('cascade');
            $table->text('sign');
            $table->text('first_name');
            $table->text('last_name');
            $table->integer('date_of_birth');
            $table->text('nationality');
            $table->text('passport_number')->nullable();
            $table->text('seaman_book_number')->nullable();
            $table->unsignedBigInteger('company_id')->nullable();
            $table->foreign('company_id')->references('id')->on('companies')->onDelete('cascade');
            $table->integer('is_transfer_completed')->default(0);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('crews');
    }
}
