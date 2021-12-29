<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrdersTable extends Migration
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
            $table->bigInteger('order_no')->unique();
            $table->foreignId('product_id');
            $table->foreignId('user_id');
            $table->integer('quantity');
            $table->double('amount')->nullable();
            $table->string('product_type');
            $table->string('currency');
            $table->string('transaction_id');
            $table->string('status');
            $table->tinyInteger('admin_approve')->default('0');
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
        Schema::dropIfExists('orders');
    }
}
