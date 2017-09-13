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
	       	'th_id'	=> 2,
            'text' => 'あなたの性別は何ですか?'
	    ]);
	    
	    App\SurveyQuastion::create([	
	       	'th_id'	=> 2,
            'text' => '男'
	    ]);
	    
	    App\SurveyQuastion::create([	
	       	'th_id'	=> 2,
            'text' => '女'
	    ]);
	    
	    App\SurveyQuastion::create([	
	       	'th_id'	=> 2,
            'text' => 'あなたはフリーマーケットに何回参加しましたか?'
	    ]);
	    
	    App\SurveyQuastion::create([	
	       	'th_id'	=> 2,
            'text' => '1~5回'
	    ]);
	    
	    App\SurveyQuastion::create([	
	       	'th_id'	=> 2,
            'text' => '6~10回'
	    ]);
	    
	    App\SurveyQuastion::create([	
	       	'th_id'	=> 2,
            'text' => '11~15回'
	    ]);
	    
	    App\SurveyQuastion::create([	
	       	'th_id'	=> 2,
            'text' => '16回以上'
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
