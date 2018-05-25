<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateActionPolicyTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('action_policy', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('action_id');
            $table->unsignedInteger('policy_id');
            $table->boolean('is_active')->default(1);
        });

        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        Schema::table('action_policy', function (Blueprint $table) {

            $table->foreign('policy_id')->references('id')->on('policies');
            $table->foreign('action_id')->references('id')->on('actions');

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
        Schema::dropIfExists('action_policy');
    }
}
