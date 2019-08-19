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
        Schema::create('PRODUTO', function (Blueprint $table) {
            $table->bigIncrements('COD_PRODUTO');
            $table->longText('DESCRICAO');
            $table->unsignedBigInteger('COD_CATEGORIA');
            $table->foreign('COD_CATEGORIA')->references('COD_CATEGORIA')->on('CATEGORIA');
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
        Schema::dropIfExists('PRODUTO');
    }
}
