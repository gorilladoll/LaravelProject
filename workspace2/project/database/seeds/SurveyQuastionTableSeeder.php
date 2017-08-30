<?php

use Illuminate\Database\Seeder;

class SurveyQuastionTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        App\SurveyQuastion::create([	
	       	'th_id'	=> 1,
            'text' => '당신의 성별은 무엇입니까?'
	    ]);
	    
	    App\SurveyQuastion::create([	
	       	'th_id'	=> 1,
            'text' => '남자'
	    ]);
	    
	    App\SurveyQuastion::create([	
	       	'th_id'	=> 1,
            'text' => '여자'
	    ]);
	    
	    App\SurveyQuastion::create([	
	       	'th_id'	=> 1,
            'text' => '당신의 플리마켓 참가 횟수는 몇회인가요?'
	    ]);
	    
	    App\SurveyQuastion::create([	
	       	'th_id'	=> 1,
            'text' => '1~5회'
	    ]);
	    
	    App\SurveyQuastion::create([	
	       	'th_id'	=> 1,
            'text' => '6~10회'
	    ]);
	    
	    App\SurveyQuastion::create([	
	       	'th_id'	=> 1,
            'text' => '11~15회'
	    ]);
	    
	    App\SurveyQuastion::create([	
	       	'th_id'	=> 1,
            'text' => '16회이상'
	    ]);
	    
	    
	    
	    
	    
	    
	    
	    App\SurveyQuastion::create([	
	       	'th_id'	=> 2,
            'text' => '당신의 성별은 무엇입니까?'
	    ]);
	    
	    App\SurveyQuastion::create([	
	       	'th_id'	=> 2,
            'text' => '남자'
	    ]);
	    
	    App\SurveyQuastion::create([	
	       	'th_id'	=> 2,
            'text' => '여자'
	    ]);
	    
	    
	    
	    
	    
	    
	    App\SurveyQuastion::create([	
	       	'th_id'	=> 3,
            'text' => '당신의 성별은 무엇입니까?'
	    ]);
	    
	    App\SurveyQuastion::create([	
	       	'th_id'	=> 3,
            'text' => '남자'
	    ]);
	    
	    App\SurveyQuastion::create([	
	       	'th_id'	=> 3,
            'text' => '여자'
	    ]);
	    
	    
	    App\SurveyQuastion::create([	
	       	'th_id'	=> 4,
            'text' => '당신의 성별은 무엇입니까?'
	    ]);
	    
	    App\SurveyQuastion::create([	
	       	'th_id'	=> 4,
            'text' => '남자'
	    ]);
	    
	    App\SurveyQuastion::create([	
	       	'th_id'	=> 4,
            'text' => '여자'
	    ]);
    }
    
}
