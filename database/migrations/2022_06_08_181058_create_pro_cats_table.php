<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProCatsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pro_cats', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->unsignedBigInteger('producto_id');
            $table->unsignedBigInteger('categoria_id');
           

            $table->foreign('producto_id')->references('id')->on('productos')
            ->onUpdate('cascade')->onDelete('cascade');

            $table->foreign('categoria_id')->references('id')->on('categorias')
            ->onUpdate('cascade')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pro_cats');
    }
}
