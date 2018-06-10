<?php

use Illuminate\Database\Seeder;

class SeedPolicyTable extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $sql = 'INSERT INTO policies (policy_name, description, is_enabled) values (:policy_name, :description, :is_enabled)';

        for ($i=0; $i <10; ++$i){
            DB::statement($sql, [
                'policy_name' => 'Policy '.$i,
                'description' => 'Policy description '.$i,
                'is_enabled' => 1
            ]);
        }

        $sql2='INSERT INTO action_policy (action_id, policy_id, priority, is_active) values (:action_id, :policy_id, :priority, :is_active)';

        DB::statement($sql2, [
           'action_id' => 1,
           'policy_id' => 1,
           'priority' => 0,
           'is_active' => 1
        ]);

        DB::statement($sql2, [
            'action_id' => 2,
            'policy_id' => 1,
            'priority' => 1,
            'is_active' => 1
        ]);

        DB::statement($sql2, [
            'action_id' => 3,
            'policy_id' => 2,
            'priority' => 0,
            'is_active' => 1
        ]);

        DB::statement($sql2, [
            'action_id' => 4,
            'policy_id' => 4,
            'priority' => 0,
            'is_active' => 1
        ]);

        DB::statement($sql2, [
            'action_id' => 1,
            'policy_id' => 4,
            'priority' => 1,
            'is_active' => 0
        ]);
    }


}
