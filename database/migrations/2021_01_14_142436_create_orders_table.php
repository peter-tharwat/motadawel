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
            $table->bigIncrements('id');
            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')->references('id')->on("users")->onDelete('cascade'); 

            $table->unsignedBigInteger('course_id')->nullable();
            $table->foreign('course_id')->references('id')->on("courses")->onDelete('cascade'); 

            $table->string('mohallel_user_name')->nullable();
            $table->string('mohallel_email')->nullable();

            $table->string('type')->default("COURSE");
            $table->string('status')->default("PENDING");
            
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
