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
        Schema::create('response_job_infos', function (Blueprint $table) {
            $table->unsignedBigInteger('idResponse');
            $table->unsignedBigInteger('idUser');
            $table->unsignedBigInteger('idQuestion');
            $table->unsignedBigInteger('idJobInfo');
            $table->string('answer',1);
            $table->string('resume')->comment('pathResume');
            $table->timestamps();
            $table->softDeletes();

            $table->primary('idResponse');
            $table->foreign('idUser')->references('idUser')->on('users');
            $table->foreign('idQuestion')->references('idQuestion')->on('question_has_job_infos');
            $table->foreign('idJobInfo')->references('idJobInfo')->on('question_has_job_infos');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('response_job_infos');
    }
};
