<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSettingTable extends Migration
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
            $table->timestamps();
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->string('idea_color')->default('#F6B9B9');
            $table->string('quote_color')->default('#B8BFFA');
            $table->string('thought_color')->default('#B9F7D2');
            $table->string('uncategorized_color')->default('#FEFAAF');
            $table->string('low_color')->default('#AFF0CF');
            $table->string('medium_color')->default('#FAF8C7');
            $table->string('high_color')->default('#EBB2B6');
            $table->string('appearance')->default('light');
            
            

           
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
