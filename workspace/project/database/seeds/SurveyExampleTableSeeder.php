<?php

use Illuminate\Database\Seeder;

class SurveyExampleTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        App\SurveyExample::create([	
	       	'table_id'	=> 2,
            'parent_id' => 1
	    ]);
	    
	    App\SurveyExample::create([	
	       	'table_id'	=> 3,
            'parent_id' => 1
	    ]);
	    
	    App\SurveyExample::create([	
	       	'table_id'	=> 5,
            'parent_id' => 4
	    ]);
	    
	    App\SurveyExample::create([	
	       	'table_id'	=> 6,
            'parent_id' => 4
	    ]);
	    
	    App\SurveyExample::create([	
	       	'table_id'	=> 7,
            'parent_id' => 4
	    ]);
	    
	    App\SurveyExample::create([	
	       	'table_id'	=> 8,
            'parent_id' => 4
	    ]);
	    
	    
	    



	    App\SurveyExample::create([	
	       	'table_id'	=> 10,
            'parent_id' => 9
	    ]);
	    
	    App\SurveyExample::create([	
	       	'table_id'	=> 11,
            'parent_id' => 9
	    ]);
	    
	    
	    
	    
	    

	    App\SurveyExample::create([	
	       	'table_id'	=> 13,
            'parent_id' => 12
	    ]);
	    
	    App\SurveyExample::create([	
	       	'table_id'	=> 14,
            'parent_id' => 12
	    ]);
	    
	    
	    
	    
	    
	    App\SurveyExample::create([	
	       	'table_id'	=> 16,
            'parent_id' => 15
	    ]);
	    
	    App\SurveyExample::create([	
	       	'table_id'	=> 17,
            'parent_id' => 15
	    ]);
	    
    }
}
