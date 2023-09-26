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
        Schema::create('response_has_questions', function (Blueprint $table) {
            $table->unsignedBigInteger('idResponse');
            $table->unsignedBigInteger('idQuestion');
            $table->boolean('answer');
            $table->timestamps();
            $table->softDeletes();

            $table->foreign('idResponse')->references('idResponse')->on('response_job_infos');
            $table->foreign('idQuestion')->references('idQuestion')->on('questions');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('response_has_questions');
    }
};
