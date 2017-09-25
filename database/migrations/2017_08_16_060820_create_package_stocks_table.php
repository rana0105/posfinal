<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePackageStocksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('package_stocks', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('propac_id')->unsigned()->index()->nullable();
            $table->foreign('propac_id')->references('id')->on('products')->onDelete('cascade');
            $table->integer('package_id')->unsigned()->index()->nullable();
            $table->foreign('package_id')->references('id')->on('packages');
            $table->integer('product_id')->unsigned()->index()->nullable();
            $table->foreign('product_id')->references('id')->on('products')->onDelete('cascade');
            $table->string('pquantity')->nullable();
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
        Schema::dropIfExists('package_stocks');
    }
}
