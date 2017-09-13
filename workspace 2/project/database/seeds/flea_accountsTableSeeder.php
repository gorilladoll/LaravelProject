<?php

use Illuminate\Database\Seeder;

class flea_accountsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
       App\FleaAccount::create([    
            'th_id' => 2,
            'seller_id' => 1,
            'account' => 2800000
        ]);
        App\FleaAccount::create([   
            'th_id' => 7,
            'seller_id' => 1,
            'account' => 2650000
        ]);
        App\FleaAccount::create([   
            'th_id' => 11,
            'seller_id' => 1,
            'account' => 3370000
        ]);
    }
}
