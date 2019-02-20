<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateConsentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('consents', function (Blueprint $table) {
            $table->smallIncrements('id');
            $table->string('name');
            $table->string('info_link')->nullable();
            $table->string('video_url')->nullable();
            $table->boolean('patient_questions')->default(true);
            $table->smallInteger('consent_type_id')->index()->unsigned();
            $table->smallInteger('consent_speciality_id')->index()->unsigned();
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
        Schema::dropIfExists('consents');
    }
}
