<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateChannelMatchTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('channel_match', function (Blueprint $table) {
            $table->id();
            $table->foreignId('channel_id');
            $table->foreignId('match_id');
            $table->timestamps();
            $table->foreign('channel_id')->references('id')->on('channels')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('match_id')->references('id')->on('matches')->onUpdate('cascade')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('channel_match', function(Blueprint $table) {
            $table->dropForeign('channel_match_channel_id_foreign');
            $table->dropForeign('channel_match_match_id_foreign');
        });

        Schema::dropIfExists('channel_match');
    }
}
