<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRewardsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rewards', function (Blueprint $table) {
            $table->id();
            $table->dateTime('date_start');
            $table->dateTime('date_end');
            $table->integer('good_answer_step');
            $table->string('title');
            $table->string('text');
            $table->string('image_url');
            $table->string('file_url');  
            $table->timestamp('validity_date');
            $table->unsignedBigInteger('question_category_id');
            $table->foreignId('city_id')->nullable()->constrained();
            $table->foreign('question_category_id')->nullable()->on('id')->references('question_categories'); 
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('rewards', function (Blueprint $table) {
            $table->dropForeign(['city_id']);
            $table->dropForeign(['question_category_id']);
        });
        Schema::dropIfExists('rewards');
    }
}
