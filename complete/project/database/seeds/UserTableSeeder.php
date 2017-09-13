<?php

use Illuminate\Database\Seeder;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
         App\User::create([ 
            'email' => 'test@test.com',
            'password' => 'test',
            'attention_location' => 'DAEGU',
            'lat' => 35.896474,
            'lon' => 128.622083,
            'nick_name' => 'ぞ',
            'name' => 'ぞ黒人',
            'phone' => '010-4537-3074',
            'age' => 19,
             's_mileage' => 28000,
             'b_mileage' => 22000
        ]);

        App\User::create([  
            'email' => 'test1@test.com',
            'password' => 'test',
            'attention_location' => 'DAEGU',
            'lat' => 35.896474,
            'lon' => 128.622083,
            'nick_name' => '中村',
            'name' => '中村 金未来',
            'phone' => '010-4537-3074',
            'age' => 21,
             's_mileage' => 28000,
             'b_mileage' => 22000
        ]);

        App\User::create([  
            'email' => 'test2@test.com',
            'password' => 'test2',
            'attention_location' => 'DAEGU',
            'lat' => 35.896474,
            'lon' => 128.622083,
            'nick_name' => '山田',
            'name' => 'ひらがなさん',
            'phone' => '010-4537-3074',
            'age' => 24,
             's_mileage' => 28000,
             'b_mileage' => 22000
        ]);

        App\User::create([  
            'email' => 'test3@test.com',
            'password' => 'test3',
            'attention_location' => 'DAEGU',
            'lat' => 35.896474,
            'lon' => 128.622083,
            'nick_name' => 'じんぎゅ',
            'name' => 'カタカナさん',
            'phone' => '010-4537-3074',
            'age' => 26,
               's_mileage' => 28000,
             'b_mileage' => 22000
        ]);
        
        for($i = 4; $i <= 50; $i++){
            App\User::create([  
                'email' => 'test'.$i.'@test.com',
                'password' => 'test'.$i,
                'attention_location' => '대구',
                'lat' => 35.896474,
                'lon' => 128.622083,
                'nick_name' => '테스터4',
                'name' => '플리'.$i,
                'phone' => '010-4537-3074',
                'age' => 28,
             's_mileage' => 28000,
             'b_mileage' => 22000
            ]);
        }
    }
}
