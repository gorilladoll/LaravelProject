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
            'attention_location' => '대구',
            'own_flea' => 0,
            'nick_name' => '테스터',
            'name' => '조경현',
            'phone' => '010-4537-3074',
            'age' => 24,
             'mileage' => 0
        ]);

        App\User::create([  
            'email' => 'test1@test.com',
            'password' => 'test',
            'attention_location' => '대구',
            'own_flea' => 0,
            'nick_name' => '테스터1',
            'name' => '플리원',
            'phone' => '010-4537-3074',
            'age' => 24,
            'mileage' => 0
        ]);

        App\User::create([  
            'email' => 'test2@test.com',
            'password' => 'test2',
            'attention_location' => '대구',
            'own_flea' => 0,
            'nick_name' => '테스터2',
            'name' => '플리투',
            'phone' => '010-4537-3074',
            'age' => 24,
            'mileage' => 0
        ]);

        App\User::create([  
            'email' => 'test3@test.com',
            'password' => 'test3',
            'attention_location' => '대구',
            'own_flea' => 0,
            'nick_name' => '테스터3',
            'name' => '플리쓰리',
            'phone' => '010-4537-3074',
            'age' => 24,
            'mileage' => 0
        ]);
    }
}
