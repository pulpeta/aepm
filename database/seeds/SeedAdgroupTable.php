<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;

class SeedAdgroupTable extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $sql = 'INSERT INTO adgroup_lists (adgroup_name, description, created_at) values (:adgroup_name, :description, :created_at)';

        for ($i=0; $i <10; ++$i){
            DB::statement($sql, [
                'adgroup_name' => 'Group '.$i,
                'description' => 'Group '.$i,
                'created_at' => Carbon::now()
            ]);
        }
    }
}
