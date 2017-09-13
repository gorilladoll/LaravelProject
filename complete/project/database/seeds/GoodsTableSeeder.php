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
            'name' => 'ブラックチョコレート',
            'myshop_id' => 1,
            'category' => 'チョコレート'
        ]);

        App\Good::create([  
            'name' => 'ホワイト・チョコレート',
            'myshop_id' => 1,
            'category' => 'チョコレート'
        ]);

        App\Good::create([  
            'name' => 'トリュフチョコレート',
            'myshop_id' => 1,
            'category' => 'チョコレート'
        ]);

        App\Good::create([  
            'name' => 'シェルチョコレート',
            'myshop_id' => 1,
            'category' => 'チョコレート'
        ]);

        App\Good::create([  
            'name' => 'ジャンドゥーヤチョコレート',
            'myshop_id' => 1,
            'category' => 'チョコレート'
        ]);
        
        
        
        
        
        
        App\Good::create([  
            'name' => '수제 캔들(바하마 브리즈)',
            'myshop_id' => 2,
            'category' => '캔들'
        ]);

        App\Good::create([  
            'name' => '수제 캔들(비치 플라워)',
            'myshop_id' => 2,
            'category' => '캔들'
        ]);
        
        App\Good::create([  
            'name' => '수제 캔들(비치 워크)',
            'myshop_id' => 2,
            'category' => '캔들'
        ]);

        App\Good::create([  
            'name' => '수제 캔들(플러피 타월)',
            'myshop_id' => 2,
            'category' => '캔들'
        ]);
  
         App\Good::create([  
            'name' => '수제 캔들(시나몬 바닐라)',
            'myshop_id' => 2,
            'category' => '캔들'
        ]);

        App\Good::create([  
            'name' => '수제 캔들(크렌베리 처트니)',
            'myshop_id' => 2,
            'category' => '캔들'
        ]);
        
        App\Good::create([  
            'name' => '수제 캔들(프레쉬 컷 로즈)',
            'myshop_id' => 2,
            'category' => '캔들'
        ]);

        App\Good::create([  
            'name' => '수제 캔들(레몬 라벤더)',
            'myshop_id' => 2,
            'category' => '캔들'
        ]); 
        
        
        
        
        
        
        
        
        
        App\Good::create([  
            'name' => '수제 레몬청',
            'myshop_id' => 3,
            'category' => '차'
        ]); 
        
        App\Good::create([  
            'name' => '수제 딸기청',
            'myshop_id' => 3,
            'category' => '차'
        ]);
        
        App\Good::create([  
            'name' => '수제 키위레몬청',
            'myshop_id' => 3,
            'category' => '차'
        ]); 
        
        App\Good::create([  
            'name' => '수제 바나나청',
            'myshop_id' => 3,
            'category' => '차'
        ]); 
        
        App\Good::create([  
            'name' => '수제 멜론청',
            'myshop_id' => 3,
            'category' => '차'
        ]); 
        
        App\Good::create([  
            'name' => '수제 생강청',
            'myshop_id' => 3,
            'category' => '차'
        ]); 
        
        App\Good::create([  
            'name' => '수제 대추청',
            'myshop_id' => 3,
            'category' => '차'
        ]); 
        
        
        
        
        
        
        
        
        
        App\Good::create([  
            'name' => '바게트',
            'myshop_id' => 4,
            'category' => '수제빵'
        ]); 
        
        App\Good::create([  
            'name' => '브레첼',
            'myshop_id' => 4,
            'category' => '수제빵'
        ]); 
        
        App\Good::create([  
            'name' => '포카치아',
            'myshop_id' => 4,
            'category' => '수제빵'
        ]); 
        
        App\Good::create([  
            'name' => '베이글',
            'myshop_id' => 4,
            'category' => '수제빵'
        ]); 
        
        App\Good::create([  
            'name' => '화쥐안',
            'myshop_id' => 4,
            'category' => '수제빵'
        ]); 
        
        App\Good::create([  
            'name' => '파니니',
            'myshop_id' => 4,
            'category' => '수제빵'
        ]); 
    }
}
