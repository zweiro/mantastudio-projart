<?php

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAvatarObjectUser extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('avatar_object_user', function (Blueprint $table) {
            $table->id();
            $table->foreignId('avatar_object_id')->constrained();
            $table->foreignId('user_id')->constrained();
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
        if (DB::getDriverName() !== 'sqlite') {
            Schema::table('badge_user', function (Blueprint $table) {
                $table->dropForeign(['avatar_object_id']);
                $table->dropForeign(['user_id']);
            });
        }
        Schema::dropIfExists('avatar_object_user');
    }
}
