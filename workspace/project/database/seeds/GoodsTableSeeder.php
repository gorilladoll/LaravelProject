<?php

use Illuminate\Database\Seeder;

class GoodsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
         App\Good::create([ 
            'name' => '다크 초콜릿',
            'myshop_id' => 1,
            'category' => '초콜릿'
        ]);

        App\Good::create([  
            'name' => '화이트 초콜릿',
            'myshop_id' => 1,
            'category' => '초콜릿'
        ]);

        App\Good::create([  
            'name' => '파베 초콜릿',
            'myshop_id' => 1,
            'category' => '초콜릿'
        ]);

        App\Good::create([  
            'name' => '쉘 초콜릿',
            'myshop_id' => 1,
            'category' => '초콜릿'
        ]);

        App\Good::create([  
            'name' => '잔두야 초콜릿',
            'myshop_id' => 1,
            'category' => '초콜릿'
        ]);
    }
}
