<?php

use Illuminate\Database\Seeder;

class LabAccountTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // 롯데 플리마켓 1회차 더미값

        /*1번째 판매자*/
        App\LabAccount::create([	
	       	'th_id'	=> 2,
            'goods_id' => 1,
            'seller_id' => 1,
            'sell_price' => 5000,
            'sell_count' => 47
	    ]);

        App\LabAccount::create([    
            'th_id' => 2,
            'goods_id' => 2,
            'seller_id' => 1,
            'sell_price' => 7000,
            'sell_count' => 29
        ]);

        App\LabAccount::create([    
            'th_id' => 2,
            'goods_id' => 3,
            'seller_id' => 1,
            'sell_price' => 3000,
            'sell_count' => 51
        ]);

        App\LabAccount::create([    
            'th_id' => 2,
            'goods_id' => 4,
            'seller_id' => 1,
            'sell_price' => 10000,
            'sell_count' => 21
        ]);

        App\LabAccount::create([    
            'th_id' => 2,
            'goods_id' => 5,
            'seller_id' => 1,
            'sell_price' => 2000,
            'sell_count' => 61
        ]);


        /*2번째 판매자*/
        App\LabAccount::create([    
            'th_id' => 2,
            'goods_id' => 6,
            'seller_id' => 2,
            'sell_price' => 22000,
            'sell_count' => 44
        ]);

        App\LabAccount::create([    
            'th_id' => 2,
            'goods_id' => 7,
            'seller_id' => 2,
            'sell_price' => 30000,
            'sell_count' => 58
        ]);

        App\LabAccount::create([    
            'th_id' => 2,
            'goods_id' => 8,
            'seller_id' => 2,
            'sell_price' => 10000,
            'sell_count' => 109
        ]);

        App\LabAccount::create([    
            'th_id' => 2,
            'goods_id' => 9,
            'seller_id' => 2,
            'sell_price' => 28000,
            'sell_count' => 61
        ]);
        App\LabAccount::create([    
            'th_id' => 2,
            'goods_id' => 10,
            'seller_id' => 2,
            'sell_price' => 20000,
            'sell_count' => 59
        ]);


        /*3번째 판매자*/
        App\LabAccount::create([    
            'th_id' => 2,
            'goods_id' => 11,
            'seller_id' => 3,
            'sell_price' => 15000,
            'sell_count' => 21
        ]);

        App\LabAccount::create([    
            'th_id' => 2,
            'goods_id' => 12,
            'seller_id' => 3,
            'sell_price' => 4000,
            'sell_count' => 16
        ]);

        App\LabAccount::create([    
            'th_id' => 2,
            'goods_id' => 13,
            'seller_id' => 3,
            'sell_price' => 30000,
            'sell_count' => 44
        ]);

        App\LabAccount::create([    
            'th_id' => 2,
            'goods_id' => 14,
            'seller_id' => 3,
            'sell_price' => 100000,
            'sell_count' => 11
        ]);

        App\LabAccount::create([    
            'th_id' => 2,
            'goods_id' => 15,
            'seller_id' => 3,
            'sell_price' => 20000,
            'sell_count' => 38
        ]);


        /*4번째 판매자*/
        App\LabAccount::create([    
            'th_id' => 2,
            'goods_id' => 16,
            'seller_id' => 4,
            'sell_price' => 1000,
            'sell_count' => 120
        ]);

        App\LabAccount::create([    
            'th_id' => 2,
            'goods_id' => 17,
            'seller_id' => 4,
            'sell_price' => 2000,
            'sell_count' => 91
        ]);

        App\LabAccount::create([    
            'th_id' => 2,
            'goods_id' => 18,
            'seller_id' => 4,
            'sell_price' => 8000,
            'sell_count' => 77
        ]);

        App\LabAccount::create([    
            'th_id' => 2,
            'goods_id' => 19,
            'seller_id' => 4,
            'sell_price' => 1500,
            'sell_count' => 108
        ]);
        App\LabAccount::create([    
            'th_id' => 2,
            'goods_id' => 20,
            'seller_id' => 4,
            'sell_price' => 4000,
            'sell_count' => 88
        ]);








        //롯데 플리마켓 2회차 더미값

        /*1번째 판매자*/
        App\LabAccount::create([    
            'th_id' => 7,
            'goods_id' => 1,
            'seller_id' => 1,
            'sell_price' => 5000,
            'sell_count' => 38
        ]);

        App\LabAccount::create([    
            'th_id' => 7,
            'goods_id' => 2,
            'seller_id' => 1,
            'sell_price' => 7000,
            'sell_count' => 19
        ]);

        App\LabAccount::create([    
            'th_id' => 7,
            'goods_id' => 3,
            'seller_id' => 1,
            'sell_price' => 3000,
            'sell_count' => 46
        ]);

        App\LabAccount::create([    
            'th_id' => 7,
            'goods_id' => 4,
            'seller_id' => 1,
            'sell_price' => 10000,
            'sell_count' => 22
        ]);

        App\LabAccount::create([    
            'th_id' => 7,
            'goods_id' => 5,
            'seller_id' => 1,
            'sell_price' => 2000,
            'sell_count' => 55
        ]);


        /*2번째 판매자*/
        App\LabAccount::create([    
            'th_id' => 7,
            'goods_id' => 6,
            'seller_id' => 2,
            'sell_price' => 22000,
            'sell_count' => 31
        ]);

        App\LabAccount::create([    
            'th_id' => 7,
            'goods_id' => 7,
            'seller_id' => 2,
            'sell_price' => 30000,
            'sell_count' => 42
        ]);

        App\LabAccount::create([    
            'th_id' => 7,
            'goods_id' => 8,
            'seller_id' => 2,
            'sell_price' => 10000,
            'sell_count' => 88
        ]);

        App\LabAccount::create([    
            'th_id' => 7,
            'goods_id' => 9,
            'seller_id' => 2,
            'sell_price' => 28000,
            'sell_count' => 44
        ]);
        App\LabAccount::create([    
            'th_id' => 7,
            'goods_id' => 10,
            'seller_id' => 2,
            'sell_price' => 20000,
            'sell_count' => 51
        ]);


        /*3번째 판매자*/
        App\LabAccount::create([    
            'th_id' => 7,
            'goods_id' => 11,
            'seller_id' => 3,
            'sell_price' => 15000,
            'sell_count' => 18
        ]);

        App\LabAccount::create([    
            'th_id' => 7,
            'goods_id' => 12,
            'seller_id' => 3,
            'sell_price' => 4000,
            'sell_count' => 11
        ]);

        App\LabAccount::create([    
            'th_id' => 7,
            'goods_id' => 13,
            'seller_id' => 3,
            'sell_price' => 30000,
            'sell_count' => 38
        ]);

        App\LabAccount::create([    
            'th_id' => 7,
            'goods_id' => 14,
            'seller_id' => 3,
            'sell_price' => 100000,
            'sell_count' => 17
        ]);

        App\LabAccount::create([    
            'th_id' => 7,
            'goods_id' => 15,
            'seller_id' => 3,
            'sell_price' => 20000,
            'sell_count' => 22
        ]);


        /*4번째 판매자*/
        App\LabAccount::create([    
            'th_id' => 7,
            'goods_id' => 16,
            'seller_id' => 4,
            'sell_price' => 1000,
            'sell_count' => 99
        ]);

        App\LabAccount::create([    
            'th_id' => 7,
            'goods_id' => 17,
            'seller_id' => 4,
            'sell_price' => 2000,
            'sell_count' => 64
        ]);

        App\LabAccount::create([    
            'th_id' => 7,
            'goods_id' => 18,
            'seller_id' => 4,
            'sell_price' => 8000,
            'sell_count' => 57
        ]);

        App\LabAccount::create([    
            'th_id' => 7,
            'goods_id' => 19,
            'seller_id' => 4,
            'sell_price' => 1500,
            'sell_count' => 96
        ]);
        App\LabAccount::create([    
            'th_id' => 7,
            'goods_id' => 20,
            'seller_id' => 4,
            'sell_price' => 4000,
            'sell_count' => 71
        ]);





        //롯데 플리마켓 3회차 더미값

        /*1번째 판매자*/
        App\LabAccount::create([    
            'th_id' => 11,
            'goods_id' => 1,
            'seller_id' => 1,
            'sell_price' => 5000,
            'sell_count' => 49
        ]);

        App\LabAccount::create([    
            'th_id' => 11,
            'goods_id' => 2,
            'seller_id' => 1,
            'sell_price' => 7000,
            'sell_count' => 28
        ]);

        App\LabAccount::create([    
            'th_id' => 11,
            'goods_id' => 3,
            'seller_id' => 1,
            'sell_price' => 3000,
            'sell_count' => 58
        ]);

        App\LabAccount::create([    
            'th_id' => 11,
            'goods_id' => 4,
            'seller_id' => 1,
            'sell_price' => 10000,
            'sell_count' => 32
        ]);

        App\LabAccount::create([    
            'th_id' => 11,
            'goods_id' => 5,
            'seller_id' => 1,
            'sell_price' => 2000,
            'sell_count' => 83
        ]);



        /*2번째 판매자*/
        App\LabAccount::create([    
            'th_id' => 11,
            'goods_id' => 6,
            'seller_id' => 2,
            'sell_price' => 22000,
            'sell_count' => 57
        ]);

        App\LabAccount::create([    
            'th_id' => 11,
            'goods_id' => 7,
            'seller_id' => 2,
            'sell_price' => 30000,
            'sell_count' => 64
        ]);

        App\LabAccount::create([    
            'th_id' => 11,
            'goods_id' => 8,
            'seller_id' => 2,
            'sell_price' => 10000,
            'sell_count' => 109
        ]);

        App\LabAccount::create([    
            'th_id' => 11,
            'goods_id' => 9,
            'seller_id' => 2,
            'sell_price' => 28000,
            'sell_count' => 77
        ]);

        App\LabAccount::create([    
            'th_id' => 11,
            'goods_id' => 10,
            'seller_id' => 2,
            'sell_price' => 20000,
            'sell_count' => 55
        ]);


        /*3번째 판매자*/
        App\LabAccount::create([    
            'th_id' => 11,
            'goods_id' => 11,
            'seller_id' => 3,
            'sell_price' => 15000,
            'sell_count' => 38
        ]);

        App\LabAccount::create([    
            'th_id' => 11,
            'goods_id' => 12,
            'seller_id' => 3,
            'sell_price' => 4000,
            'sell_count' => 29
        ]);

        App\LabAccount::create([    
            'th_id' => 11,
            'goods_id' => 13,
            'seller_id' => 3,
            'sell_price' => 30000,
            'sell_count' => 63
        ]);

        App\LabAccount::create([    
            'th_id' => 11,
            'goods_id' => 14,
            'seller_id' => 3,
            'sell_price' => 100000,
            'sell_count' => 24
        ]);

        App\LabAccount::create([    
            'th_id' => 11,
            'goods_id' => 15,
            'seller_id' => 3,
            'sell_price' => 20000,
            'sell_count' => 39
        ]);


        /*4번째 판매자*/
        App\LabAccount::create([    
            'th_id' => 11,
            'goods_id' => 16,
            'seller_id' => 4,
            'sell_price' => 1000,
            'sell_count' => 162
        ]);

        App\LabAccount::create([    
            'th_id' => 11,
            'goods_id' => 17,
            'seller_id' => 4,
            'sell_price' => 2000,
            'sell_count' => 128
        ]);

        App\LabAccount::create([    
            'th_id' => 11,
            'goods_id' => 18,
            'seller_id' => 4,
            'sell_price' => 8000,
            'sell_count' => 93
        ]);

        App\LabAccount::create([    
            'th_id' => 11,
            'goods_id' => 19,
            'seller_id' => 4,
            'sell_price' => 1500,
            'sell_count' => 124
        ]);
        App\LabAccount::create([    
            'th_id' => 11,
            'goods_id' => 20,
            'seller_id' => 4,
            'sell_price' => 4000,
            'sell_count' => 87
        ]);

    }
}
