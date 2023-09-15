<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('posers', function (Blueprint $table) {
            $table->unsignedBigInteger('idUser');
            $table->string('userOfficeName',45);
            $table->string('userOfficeAddress');
            $table->string('valifiyStatus',1)->default('0');
            $table->timestamps();
            $table->softDeletes();

            $table->primary('idUser');
            $table->foreign('idUser')->references('idUser')->on('users');

           
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('posers');
    }
};
