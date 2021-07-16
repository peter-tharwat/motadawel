<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTickerchartsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tickercharts', function (Blueprint $table) {
            $table->id();
            $table->text('logo')->nullable();
            $table->text('title')->nullable();
            $table->text('open_account_title')->nullable();
            $table->text('open_account_link')->nullable();
            $table->text('image')->nullable();
            $table->text('telegram_link')->nullable();
            $table->text('visual_guide_link')->nullable();
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
        Schema::dropIfExists('tickercharts');
    }
}
