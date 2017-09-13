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
		   	'plan_name' => 'フリマ'
	    ]);
	    
	    App\BlockPlan::create([	
	       	'user_id'	=> 1,
		   	'plan_name' => 'ダブル'
	    ]);
	    
	    App\BlockPlan::create([	
	       	'user_id'	=> 1,
		   	'plan_name' => 'アート'
	    ]);
	    
	    App\BlockPlan::create([	
	       	'user_id'	=> 2,
		   	'plan_name' => 'test2'
	    ]);
	    
	    App\BlockPlan::create([	
	       	'user_id'	=> 3,
		   	'plan_name' => '영진'
	    ]);

	    App\BlockPlan::create([	
	       	'user_id'	=> 4,
		   	'plan_name' => 'test4'
	    ]);
	    
	    App\BlockPlan::create([	
	       	'user_id'	=> 5,
		   	'plan_name' => 'test5'
	    ]);
	    
	    App\BlockPlan::create([	
	       	'user_id'	=> 6,
		   	'plan_name' => 'test6'
	    ]);
	    
	    App\BlockPlan::create([	
	       	'user_id'	=> 7,
		   	'plan_name' => 'test7'
	    ]);
	    
	    App\BlockPlan::create([	
	       	'user_id'	=> 8,
		   	'plan_name' => 'test8'
	    ]);
	    
	    App\BlockPlan::create([	
	       	'user_id'	=> 9,
		   	'plan_name' => 'test9'
	    ]);
	    
	    App\BlockPlan::create([	
	       	'user_id'	=> 10,
		   	'plan_name' => 'test10'
	    ]);
	    
	    App\BlockPlan::create([	
	       	'user_id'	=> 11,
		   	'plan_name' => 'test11'
	    ]);
	    
	    App\BlockPlan::create([	
	       	'user_id'	=> 12,
		   	'plan_name' => 'test12'
	    ]);
	    
	    App\BlockPlan::create([	
	       	'user_id'	=> 13,
		   	'plan_name' => 'test13'
	    ]);
	    
	    App\BlockPlan::create([	
	       	'user_id'	=> 14,
		   	'plan_name' => 'test14'
	    ]);
	    
	    App\BlockPlan::create([	
	       	'user_id'	=> 15,
		   	'plan_name' => 'test15'
	    ]);
	    
	    App\BlockPlan::create([	
	       	'user_id'	=> 16,
		   	'plan_name' => 'test16'
	    ]);
    }
}
