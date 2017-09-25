<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSinvoicesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sinvoices', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('sale_id')->unsigned()->index()->nullable();
            $table->foreign('sale_id')->references('id')->on('sales');
            $table->integer('product_id')->unsigned()->index();
            $table->foreign('product_id')->references('id')->on('products');
            $table->float('s_quantity')->default('0');
            $table->float('sunit_price')->default('0');
            $table->float('ppdiscount')->default('0')->nullable();
            $table->float('svat')->default('0')->nullable();
            $table->float('sstotal')->default('0')->nullable();
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
        Schema::dropIfExists('sinvoices');
    }
}
