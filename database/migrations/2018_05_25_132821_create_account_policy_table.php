<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAccountPolicyTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('account_policy', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('policy_id');
            $table->unsignedInteger('address_list_id')->nullable();
            $table->unsignedInteger('adgroup_list_id')->nullable();
        });

        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        Schema::table('account_policy', function (Blueprint $table) {

            $table->foreign('policy_id')->references('id')->on('policies');
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
        Schema::dropIfExists('policy_assignment');
    }

}
