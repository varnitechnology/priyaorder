<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('order_details', function (Blueprint $table) {
            $table->id();
            $table->foreignId('order_id');
            $table->string('name');
            $table->foreignId('shape_id');
            $table->foreignId('color_id');
            $table->foreignId('clarity_id');
            $table->string('size');
            $table->integer('qty');
            $table->string('price');
            $table->string('item_notes');
            $table->timestamps();
            $table->enum('status', ['pending', 'active', 'delete']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('order_details');
    }
};
