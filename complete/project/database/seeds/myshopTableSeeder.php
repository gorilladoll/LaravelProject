<?php

use Illuminate\Database\Seeder;

class myshopTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
//        DB::table('myshops')->insert([
//            'user_id' => 1,
//            'title' => '조경현마이샵',
//            'introduce' => '하이염',
//            'filename' => 'default',
//            'max_result' => 500000,
//            'min_result' => 10000,
//            'join_count' => 3
//        ]);
//        DB::table('myshops')->insert([
//            'user_id' => 2,
//            'title' => '킨미라이샵',
//            'introduce' => '킄킄',
//            'filename' => 'default',
//            'max_result' => 250000,
//            'min_result' => 100000,
//            'join_count' => 5
//        ]);
//        DB::table('myshops')->insert([
//            'user_id' => 3,
//            'title' => '즈어진규샵',
//            'introduce' => '케케',
//            'filename' => 'default',
//            'max_result' => 350,
//            'min_result' => 120,
//            'join_count' => 720
//        ]);


        DB::table('myshops')->insert([
            'user_id' => 1,
            'lab_name' => '테스트의 공방',
            'background_img' => 'background_1.jpg',
            'left_img'=>'left_1.png',
            'center_img'=>'center_1.png',
            'right_img'=>'rigth_1.png',
            'font_style'=>'normal',
            'font_size'=>'30',
            'font_color'=>'gray',
            'font_weight'=>'0',
            'max_sellpoint' => NULL,
            'min_sellpoint' => NULL,
            'join_count' => NULL,
            'ticket' => NULL,
        ]);
        
        DB::table('myshops')->insert([
            'user_id' => 2,
            'lab_name' => '테스트1의 공방',
            'background_img' => 'background_1.jpg',
            'left_img'=>'left_1.png',
            'center_img'=>'center_1.png',
            'right_img'=>'rigth_1.png',
            'font_style'=>'normal',
            'font_size'=>'30',
            'font_color'=>'gray',
            'font_weight'=>'0',
            'max_sellpoint' => NULL,
            'min_sellpoint' => NULL,
            'join_count' => NULL,
            'ticket' => NULL,
        ]);
        
        DB::table('myshops')->insert([
            'user_id' => 3,
            'lab_name' => '테스트2의 공방',
            'background_img' => 'background_1.jpg',
            'left_img'=>'left_1.png',
            'center_img'=>'center_1.png',
            'right_img'=>'rigth_1.png',
            'font_style'=>'normal',
            'font_size'=>'30',
            'font_color'=>'gray',
            'font_weight'=>'0',
            'max_sellpoint' => NULL,
            'min_sellpoint' => NULL,
            'join_count' => NULL,
            'ticket' => NULL,
        ]);
        
        DB::table('myshops')->insert([
            'user_id' => 4,
            'lab_name' => '테스트3의 공방',
            'background_img' => 'background_1.jpg',
            'left_img'=>'left_1.png',
            'center_img'=>'center_1.png',
            'right_img'=>'rigth_1.png',
            'font_style'=>'normal',
            'font_size'=>'30',
            'font_color'=>'gray',
            'font_weight'=>'0',
            'max_sellpoint' => NULL,
            'min_sellpoint' => NULL,
            'join_count' => NULL,
            'ticket' => NULL,
        ]);
        
        DB::table('myshops')->insert([
            'user_id' => 7,
            'lab_name' => '테스트6의 공방',
            'background_img' => 'background_1.jpg',
            'left_img'=>'left_1.png',
            'center_img'=>'center_1.png',
            'right_img'=>'rigth_1.png',
            'font_style'=>'normal',
            'font_size'=>'30',
            'font_color'=>'gray',
            'font_weight'=>'0',
            'max_sellpoint' => NULL,
            'min_sellpoint' => NULL,
            'join_count' => NULL,
            'ticket' => NULL,
        ]);
    }
}
