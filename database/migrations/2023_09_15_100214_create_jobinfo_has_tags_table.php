<?php

use App\Models\tag;
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
        Schema::create('jobinfo_has_tags', function (Blueprint $table) {
            $table->unsignedBigInteger('idJobInfo');
            $table->unsignedBigInteger('idTag');
            $table->timestamps();
            $table->softDeletes();

            $table->primary(['idJobInfo', 'idTag']);
            $table->foreign('idJobInfo')->references('idJobInfo')->on('job_infos');
            $table->foreign('idTag')->references('idTag')->on('tags');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('jobinfo_has_tags');
    }
};
