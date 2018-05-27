<?php

use Illuminate\Database\Seeder;
//use App\User;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //DB::statement('SET FOREIGN_KEY_CHECKS=0');
        //User::truncate();

        $this->call(SeedUserTable::class);
        $this->call(SeedDashboardTable::class);
        $this->call(SeedWhitelistTable::class);
        $this->call(SeedBlacklistTable::class);
        $this->call(SeedActionsTable::class);

    }
}
