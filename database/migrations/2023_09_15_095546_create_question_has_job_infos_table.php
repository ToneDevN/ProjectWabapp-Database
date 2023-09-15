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
        Schema::create('question_has_job_infos', function (Blueprint $table) {
            $table->unsignedBigInteger('idQuestion');
            $table->unsignedBigInteger('idJobInfo');
            $table->timestamps();
            $table->softDeletes();
            
            $table->primary(['idQuestion', 'idJobInfo']);
            $table->foreign('idQuestion')->references('idQuestion')->on('questions');
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
        Schema::dropIfExists('question_has_job_infos');
    }
};
