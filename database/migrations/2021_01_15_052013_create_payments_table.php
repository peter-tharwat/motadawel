<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePaymentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('payments', function (Blueprint $table) {
          
            $table->bigIncrements('id');
            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')->references('id')->on("users")->onDelete('cascade');  
            $table->unsignedBigInteger('order_id');
            $table->foreign('order_id')->references('id')->on("orders")->onDelete('cascade'); 
            $table->string('type');
            $table->string('status');
            $table->float('amount')->default(0); 
            $table->string('source')->nullable();
            //$table->string('source')->nullable();
            $table->string('payment_id')->nullable(); 
            $table->json('process_data')->nullable();
            $table->text('description')->nullable();


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
        Schema::dropIfExists('payments');
    }
}
