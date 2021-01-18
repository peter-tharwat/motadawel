<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVideosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('videos', function (Blueprint $table) {
            $table->bigIncrements('id');
            
            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')->references('id')->on("users")->onDelete('cascade'); 
            $table->unsignedBigInteger('course_id');
            $table->foreign('course_id')->references('id')->on("courses")->onDelete('cascade');
            $table->string('title')->nullable();
            $table->text('description')->nullable();
            $table->string('thumbnail')->nullable();
            $table->string('url')->nullable();
            $table->string('period')->nullable();
            $table->string('cost_type')->default("FREE");
            $table->string('type')->default("LIVE");
            $table->string('origin')->default("LIVE");
            $table->timestamp('available_at')->nullable();

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
        Schema::dropIfExists('videos');
    }
}
