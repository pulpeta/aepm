<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;

class SeedUserTable extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $sql = 'INSERT INTO users (name, email, password, is_admin, is_enabled, created_at) values (:name, :email, :password, :is_admin, :is_enabled, :created_at)';

        DB::statement($sql, [
            'name' => 'Administrator',
            'email' => 'administrator@localhost.com',
            'password' => bcrypt('123456'),
            'is_admin' => '1',
            'is_enabled' => '1',
            'created_at' => Carbon::now()
            ]);

        DB::statement($sql, [
            'name' => 'Administrator2',
            'email' => 'administrator2@localhost.com',
            'password' => bcrypt('123456'),
            'is_admin' => '1',
            'is_enabled' => '1',
            'created_at' => Carbon::now()
        ]);

        DB::statement($sql, [
            'name' => 'Administrator3',
            'email' => 'administrator3@localhost.com',
            'password' => bcrypt('123456'),
            'is_admin' => '1',
            'is_enabled' => '0',
            'created_at' => Carbon::now()
        ]);

        DB::statement($sql, [
            'name' => 'Operator',
            'email' => 'Operator@localhost.com',
            'password' => bcrypt('123456'),
            'is_admin' => '0',
            'is_enabled' => '1',
            'created_at' => Carbon::now()
        ]);

        DB::statement($sql, [
            'name' => 'Operator2',
            'email' => 'Operator2@localhost.com',
            'password' => bcrypt('123456'),
            'is_admin' => '0',
            'is_enabled' => '1',
            'created_at' => Carbon::now()
        ]);

        DB::statement($sql, [
            'name' => 'Operator3',
            'email' => 'Operator3@localhost.com',
            'password' => bcrypt('123456'),
            'is_admin' => '0',
            'is_enabled' => '0',
            'created_at' => Carbon::now()
        ]);

    }
}
