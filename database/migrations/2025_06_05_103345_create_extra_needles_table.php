<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateExtraNeedlesTable extends Migration
{
    public function up()
    {
        Schema::create('extra_needles', function (Blueprint $table) {
            $table->increments('id');
            $table->date('retrieved_date');
            $table->string('needle_type', 50);
            $table->string('needle_size', 20);
            $table->string('machine_number', 50);
            $table->string('submitted_epf', 20);
            $table->string('section_submitted', 50);
            $table->date('delivery_date');
            $table->string('retrieved_epf', 20);
            $table->string('section_retrieved', 50);
            $table->string('new_machine_number', 50)->nullable();
            $table->string('unique_identifier')->virtualAs("CONCAT(needle_type, '/', needle_size, '/', machine_number)");
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('extra_needles');
    }
}