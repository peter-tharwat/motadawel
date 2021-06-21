<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddColumnsToSettings extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('settings', function (Blueprint $table) {

            $table->string('whatsapp_phone_mohallel')->nullable();
            $table->integer('package1_price')->default(0);
            $table->integer('package2_price')->default(0);
            $table->integer('package3_price')->default(0);
            $table->text('package1_description')->nullable();
            $table->text('package2_description')->nullable();
            $table->text('package3_description')->nullable();
            
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('settings', function (Blueprint $table) {
            $table->dropColumn('whatsapp_phone_mohallel');
            $table->dropColumn('package1_price');
            $table->dropColumn('package2_price');
            $table->dropColumn('package3_price');
            $table->dropColumn('package1_description');
            $table->dropColumn('package2_description');
            $table->dropColumn('package3_description');
        });
    }
}
