<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMissingNeedlesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('missing_needles', function (Blueprint $table) {
            $table->increments('id');
            $table->date('date');
            $table->string('employee_epf');
            $table->string('section');
            $table->string('broke_time');
            $table->string('release_time');
            $table->string('request_letter')->nullable(); // For file upload
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
        Schema::dropIfExists('missing_needles');
    }
}
