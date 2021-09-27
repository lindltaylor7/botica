<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('details', function (Blueprint $table) {
            $table->id();
            $table->integer('quantity');
            $table->tinyInteger('unit_type');
            $table->unsignedBigInteger('detailable_id');
            $table->string('detailable_type');
            $table->unsignedBigInteger('sale_id');
            $table->foreign('sale_id')->references('id')->on('sales')->onDelete('cascade');
            $table->decimal('partial_igv',11,2);
            $table->decimal('partial_utility',11,2);
            $table->decimal('partial_sale',11,2);
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
        Schema::dropIfExists('details');
    }
}
