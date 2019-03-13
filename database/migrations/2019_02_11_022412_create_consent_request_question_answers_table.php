<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateConsentRequestQuestionAnswersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('consent_request_question_answers', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('consent_request_question_id')->index('crqa_crq_id')->unsigned();
            $table->integer('answer_id')->index('crqa_a_id')->unsigned()->nullable();
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
        Schema::dropIfExists('consent_request_question_answers');
    }
}
