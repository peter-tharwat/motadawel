<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSettingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('settings', function (Blueprint $table) {
            $table->id();
            $table->text('email')->nullable();
            $table->text('phone')->nullable();

            $table->text('whatsapp_phone')->nullable();


            $table->text('twitter_link')->nullable();
            $table->text('snap_link')->nullable();
            $table->text('instagram_link')->nullable();
            $table->text('youtube_link')->nullable();

            $table->text('youtube_video_link')->nullable();



            $table->text('bio')->nullable();

            $table->text('why_chart')->nullable();
            

            $table->text('target')->nullable();
            $table->text('message')->nullable();
            $table->text('vision')->nullable();

            $table->text('terms')->nullable();
            $table->text('privacy')->nullable();

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
        Schema::dropIfExists('settings');
    }
}
