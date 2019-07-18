<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAcFeeSetsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ac_fee_sets', function (Blueprint $table) {
            $table->bigIncrements('id');

            $table->Date('student_from')->nullable();
            $table->Date('student_to')->nullable();
            $table->float('student_valid_amount')->nullable();
            $table->float('student_invalid_amount')->nullable();
            
            $table->Date('faculty_from')->nullable();
            $table->Date('faculty_to')->nullable();
            $table->float('faculty_valid_amount')->nullable();
            $table->float('faculty_invalid_amount')->nullable();

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
        Schema::dropIfExists('ac_fee_sets');
    }
}
