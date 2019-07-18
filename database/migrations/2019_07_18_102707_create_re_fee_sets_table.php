<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateReFeeSetsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('re_fee_sets', function (Blueprint $table) {
            $table->bigIncrements('id');
            
            $table->string('category');
            $table->Date('from')->nullable();
            $table->Date('to')->nullable();
            $table->float('valid_amount')->nullable();
            $table->float('invalid_amount')->nullable();

            $table->float('accompanied_person_amount')->nullable();

            $table->float('fixed_amount')->nullable();

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
        Schema::dropIfExists('re_fee_sets');
    }
}
