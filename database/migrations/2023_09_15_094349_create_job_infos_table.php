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
        Schema::create('job_infos', function (Blueprint $table) {
            $table->id('idJobInfo');
            $table->unsignedBigInteger('idUser');
            $table->string('nameJob');
            $table->string('workType',45);
            $table->string('jobType', 45);
            $table->string('discription');
            $table->string('Quallification',1);
            $table->timestamps();
            $table->softDeletes();

            $table->foreign('idUser')->references('idUser')->on('posers');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('job_infos');
    }
};
