<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateQuestionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('questions', function (Blueprint $table) {
            $table->id()->from(1);
            $table->string('text');
            $table->string('image_url');
            $table->text('did_you_know');
            $table->string('image_dyk_url');
            $table->foreignId('question_category_id')->constrained();
            $table->foreignId('city_id')->constrained();
             
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('questions', function (Blueprint $table) {
            $table->dropForeign(['question_category_id']);
            $table->dropForeign(['city_id']);
        });
        Schema::dropIfExists('questions');
    }
}
