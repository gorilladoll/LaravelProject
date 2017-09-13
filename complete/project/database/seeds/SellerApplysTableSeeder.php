<?php

use Illuminate\Database\Seeder;

class SellerApplysTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('seller_applys')->insert([
            'th_id' => '2',
            'user_id' => '1',
            'accept' => false,
            'booth_name' => '黒人ブース',
            'category'   => 'かもにく',
            'start_day' => '2017-06-24',
            'end_day' => '2017-06-24',
        ]);
        DB::table('seller_applys')->insert([
            'th_id' => '2',
            'user_id' => '2',
            'accept' => false,
            'booth_name' => '金未来ブース',
            'category'    => 'チョコレート',
            'start_day' => '2017-06-24',
            'end_day' => '2017-06-24',
        ]);
        DB::table('seller_applys')->insert([
            'th_id' => '2',
            'user_id' => '3',
            'accept' => false,
            'booth_name' => 'ジュオジンギュブース',
            'category' => 'クッキー',
            'start_day' => '2017-06-24',
            'end_day' => '2017-06-24',
        ]);
        DB::table('seller_applys')->insert([
            'th_id' => '2',
            'user_id' => '4',
            'accept' => false,
            'booth_name' => 'ははははブース',
            'category' => 'クッキー',
            'start_day' => '2017-06-24',
            'end_day' => '2017-06-24',
        ]);
        
        
        
        
        
        
        
        
        
        DB::table('seller_applys')->insert([
            'th_id' => '7',
            'user_id' => '1',
            'accept' => false,
            'booth_name' => '흑인부스',
            'category'   => '초콜릿',
            'start_day' => '2017-06-24',
            'end_day' => '2017-06-24',
        ]);
        DB::table('seller_applys')->insert([
            'th_id' => '7',
            'user_id' => '2',
            'accept' => false,
            'booth_name' => '킨미라이부스',
            'category'    => '캔들',
            'start_day' => '2017-06-24',
            'end_day' => '2017-06-24',
        ]);
        DB::table('seller_applys')->insert([
            'th_id' => '7',
            'user_id' => '3',
            'accept' => false,
            'booth_name' => '즈어즈인규부스',
            'category' => '차',
            'start_day' => '2017-06-24',
            'end_day' => '2017-06-24',
        ]);
        DB::table('seller_applys')->insert([
            'th_id' => '7',
            'user_id' => '4',
            'accept' => false,
            'booth_name' => '하하하하부스',
            'category' => '수제빵',
            'start_day' => '2017-06-24',
            'end_day' => '2017-06-24',
        ]);
        
        
        
        
        
        
        
        
        DB::table('seller_applys')->insert([
            'th_id' => '11',
            'user_id' => '1',
            'accept' => false,
            'booth_name' => '흑인부스',
            'category'   => '오리고기',
            'start_day' => '2017-06-24',
            'end_day' => '2017-06-24',
        ]);
        DB::table('seller_applys')->insert([
            'th_id' => '11',
            'user_id' => '2',
            'accept' => false,
            'booth_name' => '킨미라이부스',
            'category'    => '초콜릿',
            'start_day' => '2017-06-24',
            'end_day' => '2017-06-24',
        ]);
        DB::table('seller_applys')->insert([
            'th_id' => '11',
            'user_id' => '3',
            'accept' => false,
            'booth_name' => '즈어즈인규부스',
            'category' => '쿠키',
            'start_day' => '2017-06-24',
            'end_day' => '2017-06-24',
        ]);
        DB::table('seller_applys')->insert([
            'th_id' => '11',
            'user_id' => '4',
            'accept' => false,
            'booth_name' => '하하하하부스',
            'category' => '쿠키',
            'start_day' => '2017-06-24',
            'end_day' => '2017-06-24',
        ]);
    }
}
