<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFriendUserTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('friend_user', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained();
            $table->unsignedBigInteger('friend_id');
            $table->unsignedBigInteger('request_user_id');
            $table->boolean('isAccepted')->default(false);
            $table->foreign('request_user_id')->references('id')->on('users');
            $table->foreign('friend_id')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('friend_user', function (Blueprint $table) {
            $table->dropForeign(['friend_id']);
            $table->dropForeign(['user_id']);
            $table->dropForeign(['request_user_id']);
        });
        
        Schema::dropIfExists('friend_user');
    }
}
