<?php

use Illuminate\Database\Seeder;

class RecommendInfoTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        App\RecommendInfo::create([	
	       	'buyer_id'	=> 5,
            'main_use_buy_category' => '캔들',
            'main_use_fleamarket_category' => '음식',
            'main_use_seller_category' => '음식'
	    ]);
	    
	    App\RecommendInfo::create([	
	       	'buyer_id'	=> 6,
            'main_use_buy_category' => '차',
            'main_use_fleamarket_category' => '음식',
            'main_use_seller_category' => '음식'
	    ]);
    }
}
