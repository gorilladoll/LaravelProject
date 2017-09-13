<?php

use Illuminate\Database\Seeder;

class FleaThTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        App\FleaTh::create([	
        	'flea_id'	=> 1,
	    	'booth_quantity' => 5,
	    	'start_year_month' => date('Y-m',strtotime("-2 month -15 day")),
	    	'start_day' => date('d',strtotime("-2 month -15 day")),
	    	'end_year_month' => date('Y-m',strtotime("-2 month -10 day")),
	    	'end_day' => date('d',strtotime("-2 month -10 day")),
	    	'start_time' => '12:00',
	    	'end_time' => '18:00',
	    	'entry_fee' => 5000,
	    	'booth_fee' => 10000,
	    	'commission' => 20,
	    	'text' => '안녕하세요 1번째 테스트 플리마켓입니다.',
	    	'topic' => '음식',
	    	'th' => 1,
	    	'recruit_start_time' => date('Y-m-d 12:00', strtotime("-2 month -25 day")),
	    	'recruit_end_time' => date('Y-m-d 20:00', strtotime("-2 month -20 day")),
	    	'block_plan' => 1
    	]);

    	App\FleaTh::create([	
        	'flea_id'	=> 1,
	    	'booth_quantity' => 15,
	    	'start_year_month' => date('Y-m',strtotime("-1 month -15 day")),
	    	'start_day' => date('d',strtotime("-1 month -15 day")),
	    	'end_year_month' => date('Y-m',strtotime("-1 month -10 day")),
	    	'end_day' => date('d',strtotime("-1 month -10 day")),
	    	'start_time' => '12:00',
	    	'end_time' => '18:00',
	    	'entry_fee' => 5000,
	    	'booth_fee' => 10000,
	    	'commission' => 20,
	    	'text' => '안녕하세요 2번째 테스트 플리마켓입니다.',
	    	'topic' => '음식',
	    	'th' => 2,
	    	'recruit_start_time' => date('Y-m-d 12:00', strtotime("-1 month -25 day")),
	    	'recruit_end_time' => date('Y-m-d 20:00', strtotime("-1 month -20 day")),
	    	'block_plan' => 1
    	]);

    	App\FleaTh::create([	
        	'flea_id'	=> 1,
	    	'booth_quantity' => 11,
	    	'start_year_month' => date('Y-m',strtotime("-15 day")),
	    	'start_day' => date('d',strtotime("-15 day")),
	    	'end_year_month' =>  date('Y-m',strtotime("-10 day")),
	    	'end_day' => date('d',strtotime("-10 day")),
	    	'start_time' => '12:00',
	    	'end_time' => '18:00',
	    	'entry_fee' => 5000,
	    	'booth_fee' => 10000,
	    	'commission' => 20,
	    	'text' => '안녕하세요 3번째 테스트 플리마켓입니다.',
	    	'topic' => '음식',
	    	'th' => 3,
	    	'recruit_start_time' => date('Y-m-d 12:00', strtotime("-25 day")),
	    	'recruit_end_time' => date('Y-m-d 20:00', strtotime("-20 day")),
	    	'block_plan' => 1
    	]);
    	
    	
    	App\FleaTh::create([	
        	'flea_id'	=> 2,
	    	'booth_quantity' => 4,
	    	'start_year_month' => date('Y-m',strtotime("-15 day")),
	    	'start_day' => date('d',strtotime("-15 day")),
	    	'end_year_month' =>  date('Y-m',strtotime("-10 day")),
	    	'end_day' => date('d',strtotime("-10 day")),
	    	'start_time' => '12:00',
	    	'end_time' => '18:00',
	    	'entry_fee' => 5000,
	    	'booth_fee' => 10000,
	    	'commission' => 20,
	    	'text' => '안녕하세요 1번째 영진 플리마켓입니다.',
	    	'topic' => '음식',
	    	'th' => 1,
	    	'recruit_start_time' => date('Y-m-d 12:00', strtotime("-25 day")),
	    	'recruit_end_time' => date('Y-m-d 20:00', strtotime("-20 day")),
	    	'block_plan' => 2
    	]);
    }
}
