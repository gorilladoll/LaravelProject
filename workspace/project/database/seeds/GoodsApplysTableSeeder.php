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
        for($i=0;$i<5;$i++){
            DB::table('goods_applys')->insert([
                'th_id' => 1,
                'goods_id' => ($i+1),
                'user_id' => 1,
                'sales' => random_int(1,5),
                'price' => random_int(1,5),
                'quantity' => random_int(1,5)
            ]);
        }
        for($i=0;$i<5;$i++){
            DB::table('goods_applys')->insert([
                'th_id' => 1,
                'goods_id' => ($i+6),
                'user_id' => 2,
                'sales' => random_int(1,5),
                'price' => random_int(1,5),
                'quantity' => random_int(1,5)
            ]);
        }
        for($i=0;$i<5;$i++){
            DB::table('goods_applys')->insert([
                'th_id' => 1,
                'goods_id' => ($i+11),
                'user_id' => 3,
                'sales' => random_int(1,5),
                'price' => random_int(1,5),
                'quantity' => random_int(1,5)
            ]);
        }
    }
}
