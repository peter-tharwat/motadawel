<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePartnerLinksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('partner_links', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')->references('id')->on("users")->onDelete('cascade');

            $table->unsignedBigInteger('partner_id');
            $table->foreign('partner_id')->references('id')->on("partners")->onDelete('cascade');
            $table->string('title')->nullable();
            $table->string('type')->nullable();
            $table->string('url')->nullable();
            

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
        Schema::dropIfExists('partner_links');
    }
}
