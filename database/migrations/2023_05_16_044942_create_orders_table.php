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
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->date('date');
            $table->integer('agent_id');
            $table->integer('method_of_contact');
            $table->integer('company_id');
            $table->string('person_name');
            $table->string('company_notes')->nullable();
            $table->integer('method_of_dispatch')->nullable();
            $table->string('address')->nullable();
            $table->integer('method_of_shipment')->nullable();
            $table->string('memo_no')->nullable();
            $table->string('shipment_detail')->nullable();
            $table->string('document')->nullable();
            $table->date('shipment_date')->nullable();
            $table->date('delivery_date')->nullable();
            $table->integer('type')->nullable();
            $table->integer('created_by');
            $table->timestamps();
            $table->integer('status');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('orders');
    }
};
