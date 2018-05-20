<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;

class SeedDashboardTable extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $sql = 'INSERT INTO dashboards (encrypted_in, encrypted_out, standard_in, standard_out, created_at) values (:encrypted_in, :encrypted_out, :standard_in, :standard_out, :created_at)';

        DB::statement($sql, [
            'encrypted_in' => 0,
            'encrypted_out' => 0,
            'standard_in' => 0,
            'standard_out' => 0,
            'created_at' => Carbon::now()
        ]);
    }
}
