<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('products', function (Blueprint $table) {
            $table->dropColumn(['category_id', 'item', 'harga', 'image', 'quantity']);
        
            $table->string('item');
            $table->integer('purchase')->default(0);
            $table->integer('sale')->default(0);
            $table->integer('stock')->default(0);
            $table->string('stock_alert')->nullable();
        });        
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('products');
    }
}
