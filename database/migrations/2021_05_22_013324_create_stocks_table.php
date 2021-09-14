<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStocksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('stocks', function (Blueprint $table) {
            $table->id();
            $table->integer('cantidad');
            $table->date('f_vencimiento');
            $table->date('f_ingreso');
            $table->double('costo',5,2);
            $table->string('lote',5);
            $table->boolean('status');
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
        Schema::dropIfExists('stocks');
    }
}
