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
        Schema::create('favorites', function (Blueprint $table) {
            $table->unsignedBigInteger('idUser');
            $table->unsignedBigInteger('idJobInfo');
            $table->timestamps();
            $table->softDeletes();

            $table->primary(['idUser', 'idJobInfo']);
            $table->foreign('idUser')->references('idUser')->on('users');
            $table->foreign('idJobInfo')->references('idJobInfo')->on('job_infos');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('favorites');
    }
};
