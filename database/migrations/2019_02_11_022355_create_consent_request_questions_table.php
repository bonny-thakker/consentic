<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateConsentRequestQuestionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('consent_request_questions', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('consent_request_id')->index()->unsigned();
            $table->integer('consent_request_questionable_id')->nullable();
            $table->string('consent_request_questionable_type')->nullable();
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
        Schema::dropIfExists('consent_request_questions');
    }
}
