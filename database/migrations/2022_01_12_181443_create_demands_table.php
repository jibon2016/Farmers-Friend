<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDemandsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('demands', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('offer_no')->unique();
            $table->foreignId('user_id');
            $table->foreignId('product_id');
            $table->integer('quantity');
            $table->double('amount');
            $table->double('sub_total');
            $table->double('delivery_charge');
            $table->string('product_type');
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
        Schema::dropIfExists('demands');
    }
}
