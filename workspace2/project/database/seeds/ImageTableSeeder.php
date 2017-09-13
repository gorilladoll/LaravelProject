<?php

use Illuminate\Database\Seeder;

class ImageTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        App\Image::create([  
                'image_category' => 'goods',
                'filename' => 'goods1.jpg',
                'board_id' => NULL,
                'goods_id' => 1
        ]);
        App\Image::create([  
                'image_category' => 'goods',
                'filename' => 'goods2.jpg',
                'board_id' => NULL,
                'goods_id' => 2
        ]);
        App\Image::create([  
                'image_category' => 'goods',
                'filename' => 'goods3.jpg',
                'board_id' => NULL,
                'goods_id' => 3
        ]);
        App\Image::create([  
                'image_category' => 'goods',
                'filename' => 'goods4.jpg',
                'board_id' => NULL,
                'goods_id' => 4
        ]);
        App\Image::create([  
                'image_category' => 'goods',
                'filename' => 'goods5.jpg',
                'board_id' => NULL,
                'goods_id' => 5
        ]);
    }
}
