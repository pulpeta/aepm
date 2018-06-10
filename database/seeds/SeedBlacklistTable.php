<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;

class SeedBlacklistTable extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $sql = 'INSERT INTO blacklists (domain, user_id, created_at) values (:domain, :user_id, :created_at)';

        for ($i=0; $i <10; ++$i){
            DB::statement($sql, [
                'domain' => 'Black Domain '.$i,
                'user_id' => 1,
                'created_at' => Carbon::now()
            ]);
        }
    }
}
