<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;

class SeedAddressTable extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $sql = 'INSERT INTO address_lists (email, created_at) values (:email, :created_at)';

        for ($i=0; $i <10; ++$i){
            DB::statement($sql, [
                'email' => 'email_address'.$i.'@domain'.$i.'.com',
                'created_at' => Carbon::now()
            ]);
        }
    }
}
