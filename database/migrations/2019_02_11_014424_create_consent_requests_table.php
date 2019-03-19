<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateConsentRequestsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('consent_requests', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('team_id')->index()->unsigned();
            $table->smallInteger('consent_id')->index()->unsigned();
            $table->integer('user_id')->index()->unsigned();
            $table->timestamp('user_signed_ts')->nullable();
            $table->text('user_signature')->nullable();
            $table->boolean('revoked')->default(false);
            $table->boolean('moderation')->default(false);
            $table->integer('patient_id')->index()->unsigned();
            $table->timestamp('patient_signed_ts')->nullable();
            $table->text('patient_signature')->nullable();
            $table->boolean('reminder')->default(false);
            $table->boolean('in_office')->default(false);
            $table->boolean('video_watched')->default(false);
            $table->text('pdf')->nullable();
            $table->softDeletes();
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
        Schema::dropIfExists('consent_requests');
    }
}
