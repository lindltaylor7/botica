<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePreciosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('precios', function (Blueprint $table) {
            $table->id();
            $table->double('p_unitario',5,2);
            $table->double('p_costo',5,2);
            $table->double('p_caja',5,2);
            $table->integer('utilidad');
            $table->double('p_venta_caja',5,2);
            $table->unsignedBigInteger('medicamento_id')->nullable();
            $table->foreign('medicamento_id')->references('id')->on('medicamentos')->onDelete('set null')->onUpdate('cascade');
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
        Schema::dropIfExists('precios');
    }
}
