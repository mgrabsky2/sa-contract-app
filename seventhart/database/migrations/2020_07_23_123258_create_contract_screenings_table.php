<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateContractScreeningsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('contract_screenings', function (Blueprint $table) {
            $table->id();
            $table->integer("contractId")->unsigned();            
            $table->date('startDate');
            $table->date('endDate');
            $table->integer('noOfScreenings');
            $table->integer('filmId');
            $table->timestamps();

            //$table->foreign('contractId')->references('id')->on('contracts');
            //$table->foreign('filmId')->references('id')->on('films');
            
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('contract_screenings');
    }
}
