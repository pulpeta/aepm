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

        DB::statement($sql, [
            'action' => 'Action 1',
        ]);

        DB::statement($sql, [
            'action' => 'Action 2',
        ]);

        DB::statement($sql, [
            'action' => 'Action 3',
        ]);

        DB::statement($sql, [
            'action' => 'Action 4',
        ]);
    }
}
