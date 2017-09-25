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
        Schema::create('products', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name')->nullable();
            $table->string('code')->unique()->nullable();
            $table->string('bar_code')->nullable();
            $table->integer('procategory_id')->unsigned()->index()->nullable();
            $table->foreign('procategory_id')->references('id')->on('procategories');
            $table->integer('brand_id')->unsigned()->index()->nullable();
            $table->foreign('brand_id')->references('id')->on('brands');
            $table->float('pur_price')->nullable();
            $table->float('cost')->nullable();
            $table->float('tax')->nullable();
            $table->float('discount')->nullable();
            $table->integer('quantity')->nullable();
            $table->float('sale_price')->nullable();
            $table->string('image')->nullable();
            $table->boolean('status')->nullable();
            $table->boolean('actinact')->nullable();
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
        Schema::dropIfExists('products');
    }
}
