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
            'name' => 'Admin',
            'email' => 'admin@localhost.com',
            'password' => bcrypt('123456'),
            'is_admin' => '1',
            'is_enabled' => '1',
            'created_at' => Carbon::now()
            ]);
    }
}
