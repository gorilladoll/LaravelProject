<?php

use Illuminate\Database\Seeder;

class GoodsApplysTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('goods_applys')->insert([
             'th_id' => 2,
              'goods_id' => 1,
              'user_id' => 1,
              'sales' => random_int(1,5),
              'price' => random_int(1,5),
              'quantity' => random_int(1,5)
        ]);
        
        DB::table('goods_applys')->insert([
             'th_id' => 2,
              'goods_id' => 2,
              'user_id' => 1,
              'sales' => random_int(1,5),
              'price' => random_int(1,5),
              'quantity' => random_int(1,5)
        ]);
        
        DB::table('goods_applys')->insert([
             'th_id' => 2,
              'goods_id' => 3,
              'user_id' => 1,
              'sales' => random_int(1,5),
              'price' => random_int(1,5),
              'quantity' => random_int(1,5)
        ]);
        
        DB::table('goods_applys')->insert([
             'th_id' => 2,
              'goods_id' => 6,
              'user_id' => 2,
              'sales' => random_int(1,5),
              'price' => random_int(1,5),
              'quantity' => random_int(1,5)
        ]);
        
        DB::table('goods_applys')->insert([
             'th_id' => 2,
              'goods_id' => 7,
              'user_id' => 2,
              'sales' => random_int(1,5),
              'price' => random_int(1,5),
              'quantity' => random_int(1,5)
        ]);
        
        DB::table('goods_applys')->insert([
             'th_id' => 2,
              'goods_id' => 8,
              'user_id' => 2,
              'sales' => random_int(1,5),
              'price' => random_int(1,5),
              'quantity' => random_int(1,5)
        ]);
        
        DB::table('goods_applys')->insert([
             'th_id' => 2,
              'goods_id' => 14,
              'user_id' => 3,
              'sales' => random_int(1,5),
              'price' => random_int(1,5),
              'quantity' => random_int(1,5)
        ]);
        
        DB::table('goods_applys')->insert([
             'th_id' => 2,
              'goods_id' => 15,
              'user_id' => 3,
              'sales' => random_int(1,5),
              'price' => random_int(1,5),
              'quantity' => random_int(1,5)
        ]);
        
        DB::table('goods_applys')->insert([
             'th_id' => 2,
              'goods_id' => 16,
              'user_id' => 3,
              'sales' => random_int(1,5),
              'price' => random_int(1,5),
              'quantity' => random_int(1,5)
        ]);
        
        DB::table('goods_applys')->insert([
             'th_id' => 2,
              'goods_id' => 21,
              'user_id' => 4,
              'sales' => random_int(1,5),
              'price' => random_int(1,5),
              'quantity' => random_int(1,5)
        ]);
        
        DB::table('goods_applys')->insert([
             'th_id' => 2,
              'goods_id' => 22,
              'user_id' => 4,
              'sales' => random_int(1,5),
              'price' => random_int(1,5),
              'quantity' => random_int(1,5)
        ]);
        
        DB::table('goods_applys')->insert([
             'th_id' => 2,
              'goods_id' => 23,
              'user_id' => 4,
              'sales' => random_int(1,5),
              'price' => random_int(1,5),
              'quantity' => random_int(1,5)
        ]);
        
        
        
        
        
        
        DB::table('goods_applys')->insert([
             'th_id' => 7,
             'goods_id' => 4,
             'user_id' => 1,
             'sales' => random_int(1,5),
             'price' => random_int(1,5),
             'quantity' => random_int(1,5)
        ]);
        
        DB::table('goods_applys')->insert([
             'th_id' => 7,
             'goods_id' => 5,
             'user_id' => 1,
             'sales' => random_int(1,5),
             'price' => random_int(1,5),
             'quantity' => random_int(1,5)
        ]);
        
        DB::table('goods_applys')->insert([
             'th_id' => 7,
             'goods_id' => 9,
             'user_id' => 2,
             'sales' => random_int(1,5),
             'price' => random_int(1,5),
             'quantity' => random_int(1,5)
        ]);
        
        DB::table('goods_applys')->insert([
             'th_id' => 7,
             'goods_id' => 10,
             'user_id' => 2,
             'sales' => random_int(1,5),
             'price' => random_int(1,5),
             'quantity' => random_int(1,5)
        ]);
        
        DB::table('goods_applys')->insert([
             'th_id' => 7,
             'goods_id' => 11,
             'user_id' => 2,
             'sales' => random_int(1,5),
             'price' => random_int(1,5),
             'quantity' => random_int(1,5)
        ]);
        
        DB::table('goods_applys')->insert([
             'th_id' => 7,
             'goods_id' => 17,
             'user_id' => 3,
             'sales' => random_int(1,5),
             'price' => random_int(1,5),
             'quantity' => random_int(1,5)
        ]);
        
        DB::table('goods_applys')->insert([
             'th_id' => 7,
             'goods_id' => 18,
             'user_id' => 3,
             'sales' => random_int(1,5),
             'price' => random_int(1,5),
             'quantity' => random_int(1,5)
        ]);
        
        DB::table('goods_applys')->insert([
             'th_id' => 7,
             'goods_id' => 19,
             'user_id' => 3,
             'sales' => random_int(1,5),
             'price' => random_int(1,5),
             'quantity' => random_int(1,5)
        ]);
        
        DB::table('goods_applys')->insert([
             'th_id' => 7,
             'goods_id' => 24,
             'user_id' => 4,
             'sales' => random_int(1,5),
             'price' => random_int(1,5),
             'quantity' => random_int(1,5)
        ]);
        
        DB::table('goods_applys')->insert([
             'th_id' => 7,
             'goods_id' => 25,
             'user_id' => 4,
             'sales' => random_int(1,5),
             'price' => random_int(1,5),
             'quantity' => random_int(1,5)
        ]);
        
        DB::table('goods_applys')->insert([
             'th_id' => 7,
             'goods_id' => 26,
             'user_id' => 4,
             'sales' => random_int(1,5),
             'price' => random_int(1,5),
             'quantity' => random_int(1,5)
        ]);
        
         
        
        
        DB::table('goods_applys')->insert([
             'th_id' => 11,
             'goods_id' => 1,
             'user_id' => 1,   
             'sales' => random_int(1,5),
             'price' => random_int(1,5),
             'quantity' => random_int(1,5)
        ]);
        
         DB::table('goods_applys')->insert([
             'th_id' => 11,
             'goods_id' => 2,
             'user_id' => 1,
             'sales' => random_int(1,5),
             'price' => random_int(1,5),
             'quantity' => random_int(1,5)
        ]);
        
         DB::table('goods_applys')->insert([
             'th_id' => 11,
             'goods_id' => 3,
             'user_id' => 1,
             'sales' => random_int(1,5),
             'price' => random_int(1,5),
             'quantity' => random_int(1,5)
        ]);
        
         DB::table('goods_applys')->insert([
             'th_id' => 11,
             'goods_id' => 12,
             'user_id' => 2,
             'sales' => random_int(1,5),
             'price' => random_int(1,5),
             'quantity' => random_int(1,5)
        ]);
        
         DB::table('goods_applys')->insert([
             'th_id' => 11,
             'goods_id' => 13,
             'user_id' => 2,
             'sales' => random_int(1,5),
             'price' => random_int(1,5),
             'quantity' => random_int(1,5)
        ]);
        
        DB::table('goods_applys')->insert([
             'th_id' => 11,
             'goods_id' => 20,
             'user_id' => 3,
             'sales' => random_int(1,5),
             'price' => random_int(1,5),
             'quantity' => random_int(1,5)
        ]);
        
        
        DB::table('goods_applys')->insert([
             'th_id' => 11,
             'goods_id' => 21,
             'user_id' => 4,
             'sales' => random_int(1,5),
             'price' => random_int(1,5),
             'quantity' => random_int(1,5)
        ]);
        
        DB::table('goods_applys')->insert([
             'th_id' => 11,
             'goods_id' => 22,
             'user_id' => 4,
             'sales' => random_int(1,5),
             'price' => random_int(1,5),
             'quantity' => random_int(1,5)
        ]);
        
        DB::table('goods_applys')->insert([
             'th_id' => 11,
             'goods_id' => 23,
             'user_id' => 4,
             'sales' => random_int(1,5),
             'price' => random_int(1,5),
             'quantity' => random_int(1,5)
        ]);
        
        // for($i=0;$i<5;$i++){
        //     DB::table('goods_applys')->insert([
        //         'th_id' => 1,
        //         'goods_id' => ($i+1),
        //         'user_id' => 1,
        //         'sales' => random_int(1,5),
        //         'price' => random_int(1,5),
        //         'quantity' => random_int(1,5)
        //     ]);
        // }
        // for($i=0;$i<5;$i++){
        //     DB::table('goods_applys')->insert([
        //         'th_id' => 1,
        //         'goods_id' => ($i+6),
        //         'user_id' => 2,
        //         'sales' => random_int(1,5),
        //         'price' => random_int(1,5),
        //         'quantity' => random_int(1,5)
        //     ]);
        // }
        // for($i=0;$i<5;$i++){
        //     DB::table('goods_applys')->insert([
        //         'th_id' => 1,
        //         'goods_id' => ($i+11),
        //         'user_id' => 3,
        //         'sales' => random_int(1,5),
        //         'price' => random_int(1,5),
        //         'quantity' => random_int(1,5)
        //     ]);
        // }
    }
}
