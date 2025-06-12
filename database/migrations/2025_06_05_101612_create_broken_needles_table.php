<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBrokenNeedlesTable extends Migration
{
    public function up()
    {
        Schema::create('broken_needles', function (Blueprint $table) {
            $table->increments('id');
            $table->date('date');
            $table->string('employee_epf', 20);
            $table->string('job_number', 50);
            $table->string('section', 50);
            $table->string('needle_type', 50);
            $table->string('needle_size', 20);
            $table->string('machine_number', 50);
            $table->boolean('all_parts_traced')->default(false);
            $table->string('new_needle_type', 50)->nullable();
            $table->string('new_needle_size', 20)->nullable();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('broken_needles');
    }
}