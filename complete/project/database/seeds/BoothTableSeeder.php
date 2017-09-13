<?php

use Illuminate\Database\Seeder;

class BoothTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        App\Booth::create([	
	       	'booth_name' => 'lotte',
		   	'user_name' => 'test@test.com',
		   	'top' => 10,
		   	'left' => 10,
		   	'width' => 100,
		   	'height' => 100,
		   	'user_id' => 1,
		   	'type' => 'null',
		   	'value' => null,
	    ]);

        App\Booth::create([	
	       	'booth_name' => 'lotte',
		   	'user_name' => 'test@test.com',
		   	'top' => 150,
		   	'left' => 10,
		   	'width' => 200,
		   	'height' => 100,
		   	'user_id' => 2,
		   	'type' => 'null',
		   	'value' => null
	    ]);

	    App\Booth::create([	
	       	'booth_name' => 'lotte',
		   	'user_name' => 'test@test.com',
		   	'top' => 10,
		   	'left' => 300,
		   	'width' => 100,
		   	'height' => 100,
		   	'user_id' => 3,
		   	'type' => 'null',
		   	'value' => null
	    ]);


		App\Booth::create([	
	       	'booth_name' => 'lotte',
		   	'user_name' => 'test@test.com',
		   	'top' => 150,
		   	'left' => 300,
		   	'width' => 200,
		   	'height' => 150,
		   	'user_id' => 4,
		   	'type' => 'null',
		   	'value' => null
	    ]);
	    
	    
	    
	    
	    
	    
	    App\Booth::create([	
	       	'booth_name' => '영진',
		   	'user_name' => 'test2@test.com',
		   	'top' => 50,
		   	'left' => 30,
		   	'width' => 100,
		   	'height' => 100,
		   	'user_id' => 1,
		   	'type' => 'booth',
		   	'value' => null,
	    ]);

        App\Booth::create([	
	       	'booth_name' => '영진',
		   	'user_name' => 'test2@test.com',
		   	'top' => 200,
		   	'left' => 30,
		   	'width' => 100,
		   	'height' => 100,
		   	'user_id' => 2,
		   	'type' => 'booth',
		   	'value' => null
	    ]);

	    App\Booth::create([	
	       	'booth_name' => '영진',
		   	'user_name' => 'test2@test.com',
		   	'top' => 50,
		   	'left' => 300,
		   	'width' => 100,
		   	'height' => 100,
		   	'user_id' => 3,
		   	'type' => 'booth',
		   	'value' => null
	    ]);


		App\Booth::create([	
	       	'booth_name' => '영진',
		   	'user_name' => 'test2@test.com',
		   	'top' => 200,
		   	'left' => 300,
		   	'width' => 200,
		   	'height' => 200,
		   	'user_id' => 4,
		   	'type' => 'booth',
		   	'value' => null
	    ]);
    }
}
