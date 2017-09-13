<?php

use Illuminate\Database\Seeder;

class SurveyAnswerTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	// 회차 아이디 1
    	// user1
        App\SurveyAnswer::create([	
	       	'q_id'	=> 1,
	       	'th_id' => 2,
	       	'user_id' => 1,
            'answer_id' => 2
	    ]);
	    
	    App\SurveyAnswer::create([	
	       	'q_id'	=> 4,
	       	'th_id' => 2,
	       	'user_id' => 1,
            'answer_id' => 6
	    ]);
	    
	    
	    
	    
	    // user2
	    App\SurveyAnswer::create([	
	       	'q_id'	=> 1,
	       	'th_id' => 2,
	       	'user_id' => 2,
            'answer_id' => 3
	    ]);
	    
	    App\SurveyAnswer::create([	
	       	'q_id'	=> 4,
	       	'th_id' => 2,
	       	'user_id' => 2,
            'answer_id' => 7
	    ]);
	    
	    
	    
	    
	    // user3
	    App\SurveyAnswer::create([	
	       	'q_id'	=> 1,
	       	'th_id' => 2,
	       	'user_id' => 3,
            'answer_id' => 3
	    ]);
	    
	    App\SurveyAnswer::create([	
	       	'q_id'	=> 4,
	       	'th_id' => 2,
	       	'user_id' => 3,
            'answer_id' => 8
	    ]);
	    
	    
	    
	    
	    // user4
	    App\SurveyAnswer::create([	
	       	'q_id'	=> 1,
	       	'th_id' => 2,
	       	'user_id' => 4,
            'answer_id' => 2
	    ]);
	    
	    App\SurveyAnswer::create([	
	       	'q_id'	=> 4,
	       	'th_id' => 2,
	       	'user_id' => 4,
            'answer_id' => 6
	    ]);
	    
	    
	    
	    
	    
	    
	    
	    
	    
	    
	    // 회차 아이디 4
	    // user1
        App\SurveyAnswer::create([	
	       	'q_id'	=> 15,
	       	'th_id' => 4,
	       	'user_id' => 1,
            'answer_id' => 16
	    ]);

	    
	    
	    // user2
	    App\SurveyAnswer::create([	
	       	'q_id'	=> 15,
	       	'th_id' => 4,
	       	'user_id' => 2,
            'answer_id' => 17
	    ]);

	    
	    
	    // user3
	    App\SurveyAnswer::create([	
	       	'q_id'	=> 15,
	       	'th_id' => 4,
	       	'user_id' => 3,
            'answer_id' => 17
	    ]);

	    
	    
	    // user4
	    App\SurveyAnswer::create([	
	       	'q_id'	=> 15,
	       	'th_id' => 4,
	       	'user_id' => 4,
            'answer_id' => 16
	    ]);
	    
	   
    }
}
