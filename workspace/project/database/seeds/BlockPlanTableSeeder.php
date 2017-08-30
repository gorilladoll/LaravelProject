<?php

use Illuminate\Database\Seeder;

class BlockPlanTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        App\BlockPlan::create([	
	       	'user_id'	=> 1,
		   	'plan_name' => 'lotte'
	    ]);
	    
	    App\BlockPlan::create([	
	       	'user_id'	=> 3,
		   	'plan_name' => '영진'
	    ]);
    }
}
