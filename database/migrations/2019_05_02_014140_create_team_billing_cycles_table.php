<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTeamBillingCyclesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('team_billing_cycles', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('team_id')->index()->unsigned();
            $table->string('plan')->nullable();
            $table->smallInteger('credit')->default(0);
            $table->timestamp('billing_date')->nullable();
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
        Schema::dropIfExists('team_billing_cycles');
    }
}
