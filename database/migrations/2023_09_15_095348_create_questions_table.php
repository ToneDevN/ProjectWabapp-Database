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
        Schema::create('questions', function (Blueprint $table) {
            $table->id('idQuestion');
            $table->unsignedBigInteger('idJobInfo');
            $table->string('Question',45);
            $table->string('answer',1);
            $table->timestamps();
            $table->softDeletes();

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
        Schema::dropIfExists('questions');
    }
};
