<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateExpensesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('expenses', function (Blueprint $table) {
            $table->increments('id');
            $table->string('ex_number')->nullable();
            $table->integer('outlet_id')->unsigned()->index()->nullable();
            $table->foreign('outlet_id')->references('id')->on('outlets');
            $table->integer('excate_id')->unsigned()->index()->nullable();
            $table->foreign('excate_id')->references('id')->on('excategories');
            $table->string('ex_amount')->nullable();
            $table->date('ex_date')->nullable();
            $table->string('ex_note')->nullable();
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
        Schema::dropIfExists('expenses');
    }
}
