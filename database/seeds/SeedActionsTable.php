<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;

class SeedActionsTable extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $sql = 'INSERT INTO actions (action) values (:action)';

        for ($i=0; $i <10; ++$i){
            DB::statement($sql, [
                'action' => 'Action '.$i,
            ]);
        }
    }
}
