<?php

use Illuminate\Database\Seeder;

class FleamarketTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        App\Fleamarket::create([	
	       	'host_id'	=> 1,
		   	'explain' => "롯데 플리마켓 입니다!!!",
		   	'flea_name' => "롯데 플리마켓",
            'image_name' => "test.jpg",
            'location' => "부산",
            'address' => '부산 모라동',
            'coordinate1' => '35.1841406',
            'coordinate2' => '128.99950330000001'
	    ]);
	    
	    
	    App\Fleamarket::create([	
	       	'host_id'	=> 3,
		   	'explain' => "영진 플리마켓 입니다!!!",
		   	'flea_name' => "영진 플리마켓",
            'image_name' => "test2.jpg",
            'location' => "대구",
            'address' => '영진전문대학',
            'coordinate1' => '35.8963091',
            'coordinate2' => '128.62205110000002'
	    ]);
    }
}
