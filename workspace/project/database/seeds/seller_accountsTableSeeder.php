<?php

use Illuminate\Database\Seeder;

class seller_accountsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('seller_accounts')->insert([
            'th_id' => '1',
            'user_id' => 1,
            'goods_id' => 1,
            'result' => random_int(10,20),
        ]);
        DB::table('seller_accounts')->insert([
            'th_id' => '1',
            'user_id' => 1,
            'goods_id' => 2,
            'result' => random_int(10,20),
        ]);
        DB::table('seller_accounts')->insert([
            'th_id' => '1',
            'user_id' => 2,
            'goods_id' => 3,
            'result' => random_int(10,20),
        ]);
    }
}
