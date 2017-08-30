<?php

use Illuminate\Database\Seeder;

class RecommendBuyTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        
        /*1회차 id=5인 사용자의 구매내역*/
        DB::table('recommend_buys')->insert([
	       	'goods_id' => 1,
	       	'th_id' => 1,
	       	'flea_id' => 1,
	       	'seller_id' => 1,
	       	'buyer_id' => 5,
	       	'price' => random_int(1,5),
	       	'count' => random_int(1,5)
	    ]);

	    DB::table('recommend_buys')->insert([
	       	'goods_id' => 2,
	       	'th_id' => 1,
	       	'flea_id' => 1,
	       	'seller_id' => 1,
	  	    'buyer_id' => 5,
	       	'price' => random_int(1,5),
	       	'count' => random_int(1,5)
	    ]);
	    
	    DB::table('recommend_buys')->insert([
	       	'goods_id' => 6,
	       	'th_id' => 1,
	       	'flea_id' => 1,
	       	'seller_id' => 1,
	       	'buyer_id' => 5,
	       	'price' => random_int(1,5),
	       	'count' => random_int(1,5)
	    ]);
	    
	    DB::table('recommend_buys')->insert([
	       	'goods_id' => 7,
	       	'th_id' => 1,
	       	'flea_id' => 1,
	       	'seller_id' => 1,
	       	'buyer_id' => 5,
	       	'price' => random_int(1,5),
	       	'count' => random_int(1,5)
	    ]);
	    
	    DB::table('recommend_buys')->insert([
	       	'goods_id' => 14,
	       	'th_id' => 1,
	       	'flea_id' => 1,
	       	'seller_id' => 1,
	       	'buyer_id' => 5,
	       	'price' => random_int(1,5),
	       	'count' => random_int(1,5)
	    ]);
	    
	    DB::table('recommend_buys')->insert([
	       	'goods_id' => 15,
	       	'th_id' => 1,
	       	'flea_id' => 1,
	       	'seller_id' => 1,
	       	'buyer_id' => 5,
	       	'price' => random_int(1,5),
	       	'count' => random_int(1,5)
	    ]);
	    
	    DB::table('recommend_buys')->insert([
	       	'goods_id' => 21,
	       	'th_id' => 1,
	       	'flea_id' => 1,
	       	'seller_id' => 1,
	       	'buyer_id' => 5,
	       	'price' => random_int(1,5),
	       	'count' => random_int(1,5)
	    ]);
	    
	    DB::table('recommend_buys')->insert([
	       	'goods_id' => 22,
	       	'th_id' => 1,
	       	'flea_id' => 1,
	       	'seller_id' => 1,
	       	'buyer_id' => 5,
	       	'price' => random_int(1,5),
	       	'count' => random_int(1,5)
	    ]);
	   // ===================================================================
	   // =================================================================== 
	    
	    
	    
	    
	    
	    
	    
	    /*2회차 id=5인 사용자의 구매내역*/
	    DB::table('recommend_buys')->insert([
	       	'goods_id' => 10,
	       	'th_id' => 2,
	       	'flea_id' => 1,
	       	'seller_id' => 1,
	       	'buyer_id' => 5,
	       	'price' => random_int(1,5),
	       	'count' => random_int(1,5)
	    ]);
	    
	    DB::table('recommend_buys')->insert([
	       	'goods_id' => 11,
	       	'th_id' => 2,
	       	'flea_id' => 1,
	       	'seller_id' => 1,
	       	'buyer_id' => 5,
	       	'price' => random_int(1,5),
	       	'count' => random_int(1,5)
	    ]);
        // ===================================================================
	    // =================================================================== 
	    
	    
	    
	    
	    
	    
	    /*3회차 id=5인 사용자의 구매내역*/
	    DB::table('recommend_buys')->insert([
	       	'goods_id' => 12,
	       	'th_id' => 3,
	       	'flea_id' => 1,
	       	'seller_id' => 1,
	       	'buyer_id' => 5,
	       	'price' => random_int(1,5),
	       	'count' => random_int(1,5)
	    ]);
	    
	    DB::table('recommend_buys')->insert([
	       	'goods_id' => 13,
	       	'th_id' => 3,
	       	'flea_id' => 1,
	       	'seller_id' => 1,
	       	'buyer_id' => 5,
	       	'price' => random_int(1,5),
	       	'count' => random_int(1,5)
	    ]);
	    // ===================================================================
	    // =================================================================== 
    }
}
