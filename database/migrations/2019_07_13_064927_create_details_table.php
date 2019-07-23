<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('details', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('user_id');
            $table->string('registration_id');

            $table->string('gender')->nullable();
            $table->string('institute')->nullable();
            $table->string('department')->nullable();
            $table->longText('address')->nullable();
            $table->string('phone')->nullable();
            $table->string('category');
            $table->float('registration_fee')->nullable();
            $table->float('accompanied_person_fee')->nullable();
            $table->float('total_registration_fee')->nullable();
            $table->integer('accompanied_person');
            
            
            $table->string('bank_name')->nullable();
            $table->float('amount')->nullable();
            $table->string('transaction_id')->nullable();
            $table->Date('payment_date')->nullable();

            
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
        Schema::dropIfExists('details');
    }
}
