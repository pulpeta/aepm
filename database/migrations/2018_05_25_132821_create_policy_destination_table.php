<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePolicyDestinationTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('policy_destination', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('policy_id');
            $table->unsignedInteger('address_list_id');
            $table->unsignedInteger('adgroup_list_id');
        });

        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        Schema::table('action_policy', function (Blueprint $table) {

            $table->foreign('act_policy_id')->references('id')->on('policies');
            $table->foreign('address_list_id')->references('id')->on('address_lists');
            $table->foreign('adgroup_list_id')->references('id')->on('adgroup_lists');

        });
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('policy_destination');
    }
}
