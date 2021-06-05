<?php

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAvatarObjectsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('avatar_objects', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('image_url');
            $table->unsignedBigInteger('avatar_object_category_id');
            $table->foreign('avatar_object_category_id')->on('id')->references('avatar_object_categories');
            $table->foreignId('badge_id')->nullable()->constrained();
            $table->foreignId('city_id')->nullable()->constrained();
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
            Schema::table('avatar_objects', function (Blueprint $table) {
                $table->dropForeign(['avatar_object_category_id']);
                $table->dropForeign(['badge_id']);
                $table->dropForeign(['city_id']);
            });
        }
        Schema::dropIfExists('avatar_objects');
    }
}
