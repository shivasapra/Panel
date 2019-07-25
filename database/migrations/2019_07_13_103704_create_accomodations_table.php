<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAccomodationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('accomodations', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('user_id');
            
            $table->string('category')->nullable();
            $table->integer('accomodation_for')->nullable();
            $table->float('accomodation_charges')->nullable();
            
            $table->string('Room_no')->nullable();
            $table->string('Address')->nullable();

            $table->longText('cancellation_remarks')->nullable();
            $table->boolean('cancellation_approved')->default(0);

            $table->boolean('approved')->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('accomodations');
    }
}
