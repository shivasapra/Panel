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
            $table->string('bank_name')->nullable();
            $table->float('amount')->nullable();
            $table->string('transaction_id')->nullable();
            $table->Date('payment_date')->nullable();
            $table->boolean('approved')->default(0);
            $table->longText('cancellation_remarks')->nullable();
            $table->boolean('cancellation_approved')->default(0);
            $table->string('category');
            $table->integer('accomodation_for');
            $table->float('accomodation_charges');
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
