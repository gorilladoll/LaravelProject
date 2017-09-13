<?php

use Illuminate\Database\Seeder;

class FleamarketTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        App\Fleamarket::create([	
	       	'host_id'	=> 1,
		   	'explain' => "ミハマのメインフリーマーケット！今、出店者募集中！",
		   	'flea_name' => "ミハマ de フリマ",
            'image_name' => "poster_jp_01.png",
            'location' => "千葉市",
            'address' => '美浜区',
            'coordinate1' => '35.640079',
            'coordinate2' => '140.058699'
	    ]);
	    
	    
	    App\Fleamarket::create([	
	       	'host_id'	=> 3,
		   	'explain' => "地下鉄へのフリマ！一度見てみませんか",
		   	'flea_name' => "メトロ・デ・フリマ",
            'image_name' => "poster_jp_15.jpg",
            'location' => "東京",
            'address' => '東京メトロ有楽町線',
            'coordinate1' => '35.674910',
            'coordinate2' => '139.762848'
	    ]);
	    
	    
	    
	    App\Fleamarket::create([	
	       	'host_id'	=> 4,
		   	'explain' => "つくること　つながること　ささえること",
		   	'flea_name' => "MIKAGE MARKET",
            'image_name' => "poster_jp_14.jpg",
            'location' => "京都府",
            'address' => '京都府京都市上京区',
            'coordinate1' => '35.029773',
            'coordinate2' => '135.753846'
	    ]);
	    
	    App\Fleamarket::create([	
	       	'host_id'	=> 5,
		   	'explain' => "子育て応援フリーマーケット！出店者募集中！",
		   	'flea_name' => "すくすく・フリーマーケット",
            'image_name' => "poster_jp_13.jpg",
            'location' => "大府市愛知県",
            'address' => '大府市愛知県吉田町正右エ門新田4 Chome−1−1',
            'coordinate1' => '34.995570',
            'coordinate2' => '136.942744'
	    ]);
	    
	    App\Fleamarket::create([	
	       	'host_id'	=> 6,
		   	'explain' => "安全・安心・防災まつりinいきつきにてフリマ開催",
		   	'flea_name' => "安全・安心・防災まつりinいきつき",
            'image_name' => "poster_jp_12.jpg",
            'location' => "長崎県",
            'address' => '日本長崎県平戸市生月町里免１６６０ 平戸市役所 生月支所',
            'coordinate1' => '33.388836',
            'coordinate2' => '129.432192'
	    ]);
	    
	    App\Fleamarket::create([	
	       	'host_id'	=> 7,
		   	'explain' => "伝統あるフリマ、アルヴェフリーマーケットです",
		   	'flea_name' => "アルヴェフ・リーマーケット",
            'image_name' => "poster_jp_11.jpg",
            'location' => "秋田市",
            'address' => '서울특별시 강남구 청담동 100-2',
            'coordinate1' => '37.527084',
            'coordinate2' => '127.045724'
	    ]);
	    
	    App\Fleamarket::create([	
	       	'host_id'	=> 8,
		   	'explain' => "無料で自由、ちょっぴり不思議なマーケット開催！",
		   	'flea_name' => "Free flea market",
            'image_name' => "poster_jp_10.jpg",
            'location' => "京都",
            'address' => 'Kyōto-fu, Kyōto-shi, Higashiyama-ku, Gojōbashihigashi 4-chōme, 東山区五条橋東4丁目452 ラティエール五条坂1F',
            'coordinate1' => '37.650545',
            'coordinate2' => '127.181529'
	    ]);
	    
	    App\Fleamarket::create([	
	       	'host_id'	=> 9,
		   	'explain' => "手作りアートのみの市、世田谷アートにようこそ",
		   	'flea_name' => "世田谷アートフリマ",
            'image_name' => "poster_jp_09.png",
            'location' => "東京",
            'address' => '世田谷区',
            'coordinate1' => '36.808878',
            'coordinate2' => '127.149352'
	    ]);
	    
	    App\Fleamarket::create([	
	       	'host_id'	=> 10,
		   	'explain' => "フリーマーケットとパブリックビューイング開催！",
		   	'flea_name' => "吹田スタジアムフェスタ",
            'image_name' => "poster_jp_08.jpg",
            'location' => "大阪府",
            'address' => '大阪府吹田市吹田スタジアム',
            'coordinate1' => '37.567916',
            'coordinate2' => '126.930277'
	    ]);
	    
	    App\Fleamarket::create([
	       	'host_id'	=> 11,
		   	'explain' => "素敵な出会いは広場から一緒にまちづくり",
		   	'flea_name' => "フリーマーケットinあんなか",
            'image_name' => "poster_jp_07.jpg",
            'location' => "群馬県",
            'address' => '群馬県安中市スポーツセンターイベント広場',
            'coordinate1' => '37.484043',
            'coordinate2' => '126.782673'
	    ]);
	    
	     App\Fleamarket::create([	
	       	'host_id'	=> 12,
		   	'explain' => "子育てのすべてのもの、完備！",
		   	'flea_name' => "子育てフリマ＆ママ楽フェスタ",
            'image_name' => "poster_jp_06.jpg",
            'location' => "東京",
            'address' => '3 Chome-2-19 Asagayaminami, Suginami-ku, Tōkyō-to 166-0004',
            'coordinate1' => '37.547124',
            'coordinate2' => '126.958858'
	    ]);
	    
	    App\Fleamarket::create([	
	       	'host_id'	=> 13,
		   	'explain' => "桜木地区の「ひと・もの・しごと」",
		   	'flea_name' => "チーム桜木！わくわく・フリマ",
            'image_name' => "poster_jp_05.png",
            'location' => "静岡県",
            'address' => '1270-2 Shimotaruki, Kakegawa, Shizuoka Prefecture 436-0222 일본',
            'coordinate1' => '37.503179',
            'coordinate2' => '127.028069'
	    ]);
	    
	    App\Fleamarket::create([	
	       	'host_id'	=> 14,
		   	'explain' => "田舎の元気や創業祭！！",
		   	'flea_name' => "くりまる・フリーマーケット",
            'image_name' => "poster_jp_04.PNG",
            'location' => "滋賀県",
            'address' => '547-3 Ono, Rittō-shi, Shiga-ken 520-3016',
            'coordinate1' => '35.870415',
            'coordinate2' => '128.598148'
	    ]);
	    
	    App\Fleamarket::create([	
	       	'host_id'	=> 15,
		   	'explain' => "小さな村に小さな市場が開店します。秋の理山ホリデー",
		   	'flea_name' => "Samegawa de Marche",
            'image_name' => "poster_jp_03.jpg",
            'location' => "福島県",
            'address' => '福岡県鮫川村',
            'coordinate1' => '37.013061',
            'coordinate2' => '140.512082'
	    ]);
	    
	    App\Fleamarket::create([	
	       	'host_id'	=> 16,
		   	'explain' => "有名出店者確報！、Paletteフリマ",
		   	'flea_name' => "Palette Club フリーマーケット",
            'image_name' => "poster_jp_02.jpg",
            'location' => "東京都",
            'address' => '東京都中央区',
            'coordinate1' => '35.669802',
            'coordinate2' => '139.776705'
	    ]);  
    }
}
