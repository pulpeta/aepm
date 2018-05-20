<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;

class SeedWhitelistTable extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $sql = 'INSERT INTO whitelists (domain, user_id, created_at) values (:domain, :user_id, :created_at)';

        DB::statement($sql, [
            'domain' => 'White Domain 1',
            'user_id' => 1,
            'created_at' => Carbon::now()
        ]);

        DB::statement($sql, [
            'domain' => 'White Domain 2',
            'user_id' => 1,
            'created_at' => Carbon::now()
        ]);

        DB::statement($sql, [
            'domain' => 'White Domain 3',
            'user_id' => 1,
            'created_at' => Carbon::now()
        ]);

        DB::statement($sql, [
            'domain' => 'White Domain 4',
            'user_id' => 1,
            'created_at' => Carbon::now()
        ]);
    }
}
