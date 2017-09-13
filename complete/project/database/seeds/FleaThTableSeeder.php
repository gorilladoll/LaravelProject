<?php

use Illuminate\Database\Seeder;

class FleaThTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	
    	App\FleaTh::create([	
        	'flea_id'	=> 2,
	    	'booth_quantity' => 5,
	    	'start_year_month' => date('Y-m',strtotime("-25 day")),
	    	'start_day' => date('d',strtotime("-25 day")),
	    	'end_year_month' => date('Y-m',strtotime("-22 day")),
	    	'end_day' => date('d',strtotime("-22 day")),
	    	'start_time' => '12:00',
	    	'end_time' => '18:00',
	    	'entry_fee' => 5000,
	    	'booth_fee' => 10000,
	    	'commission' => 20,
	    	'text' => "地下鉄へのフリマ！一度見てみませんか",
	    	'topic' => '中古品, ハンドメイド, 服',
	    	'th' => 1,
	    	'recruit_start_time' => date('Y-m-d 12:00', strtotime("-33 day")),
	    	'recruit_end_time' => date('Y-m-d 20:00', strtotime("-28 day")),
	    	'block_plan' => 3
    	]);
    	
    	App\FleaTh::create([	
        	'flea_id'	=> 1,
	    	'booth_quantity' => 5,
	    	'start_year_month' => date('Y-m',strtotime("-23 day")),
	    	'start_day' => date('d',strtotime("-23 day")),
	    	'end_year_month' => date('Y-m',strtotime("-21 day")),
	    	'end_day' => date('d',strtotime("-21 day")),
	    	'start_time' => '12:00',
	    	'end_time' => '18:00',
	    	'entry_fee' => 5000,
	    	'booth_fee' => 10000,
	    	'commission' => 20,
	    	'text' => "ミハマのメインフリーマーケット！今、出店者募集中！",
	    	'topic' => '中古品、 ハンドメイド',
	    	'th' => 1,
	    	'recruit_start_time' => date('Y-m-d 12:00', strtotime("-28 day")),
	    	'recruit_end_time' => date('Y-m-d 20:00', strtotime("-25 day")),
	    	'block_plan' => 1
    	]);
    	
    	App\FleaTh::create([	
        	'flea_id'	=> 3,
	    	'booth_quantity' => 5,
	    	'start_year_month' => date('Y-m',strtotime("-20 day")),
	    	'start_day' => date('d',strtotime("-20 day")),
	    	'end_year_month' => date('Y-m',strtotime("-17 day")),
	    	'end_day' => date('d',strtotime("-17 day")),
	    	'start_time' => '12:00',
	    	'end_time' => '18:00',
	    	'entry_fee' => 5000,
	    	'booth_fee' => 10000,
	    	'commission' => 20,
	    	'text' => "つくること　つながること　ささえるこ",
	    	'topic' => '中古品、 ハンドメイド、服、雑貨',
	    	'th' => 1,
	    	'recruit_start_time' => date('Y-m-d 12:00', strtotime("-28 day")),
	    	'recruit_end_time' => date('Y-m-d 20 :00', strtotime("-24 day")),
	    	'block_plan' => 4
    	]);
    	
    	App\FleaTh::create([	
        	'flea_id'	=> 4,
	    	'booth_quantity' => 5,
	    	'start_year_month' => date('Y-m',strtotime("-19 day")),
	    	'start_day' => date('d',strtotime("-19 day")),
	    	'end_year_month' => date('Y-m',strtotime("-17 day")),
	    	'end_day' => date('d',strtotime("-17 day")),
	    	'start_time' => '12:00',
	    	'end_time' => '18:00',
	    	'entry_fee' => 5000,
	    	'booth_fee' => 10000,
	    	'commission' => 20,
	    	'text' => "子育て応援フリーマーケット！出店者募集中！",
	    	'topic' => 'キッチン用品、子供服、手作り品など家庭用品',
	    	'th' => 1,
	    	'recruit_start_time' => date('Y-m-d 12:00', strtotime("-25 day")),
	    	'recruit_end_time' => date('Y-m-d 20:00', strtotime("-23 day")),
	    	'block_plan' => 5
    	]);
    	
    	App\FleaTh::create([	
        	'flea_id'	=> 5,
	    	'booth_quantity' => 5,
	    	'start_year_month' => date('Y-m',strtotime("-16 day")),
	    	'start_day' => date('d',strtotime("-16 day")),
	    	'end_year_month' => date('Y-m',strtotime("-15 day")),
	    	'end_day' => date('d',strtotime("-15 day")),
	    	'start_time' => '12:00',
	    	'end_time' => '18:00',
	    	'entry_fee' => 5000,
	    	'booth_fee' => 10000,
	    	'commission' => 20,
	    	'text' => "安全・安心・防災まつりinいきつきにてフリマ開催",
	    	'topic' => '中古品、 ハンドメイド、不要衣類、雑貨',
	    	'th' => 1,
	    	'recruit_start_time' => date('Y-m-d 12:00', strtotime("-23 day")),
	    	'recruit_end_time' => date('Y-m-d 20:00', strtotime("-20 day")),
	    	'block_plan' => 6
    	]);
    	
    	App\FleaTh::create([	
        	'flea_id'	=> 6,
	    	'booth_quantity' => 5,
	    	'start_year_month' => date('Y-m',strtotime("-15 day")),
	    	'start_day' => date('d',strtotime("-15 day")),
	    	'end_year_month' => date('Y-m',strtotime("-13 day")),
	    	'end_day' => date('d',strtotime("-13 day")),
	    	'start_time' => '12:00',
	    	'end_time' => '18:00',
	    	'entry_fee' => 5000,
	    	'booth_fee' => 10000,
	    	'commission' => 20,
	    	'text' => "伝統あるフリマ、アルヴェフリーマーケットです",
	    	'topic' => '中古品、 ハンドメイド',
	    	'th' => 1,
	    	'recruit_start_time' => date('Y-m-d 12:00', strtotime("-21 day")),
	    	'recruit_end_time' => date('Y-m-d 20:00', strtotime("-18 day")),
	    	'block_plan' => 7
    	]);
    	
    	/*====================정산용====================*/
    	App\FleaTh::create([	
        	'flea_id'	=> 1,
	    	'booth_quantity' => 5,
	    	'start_year_month' => date('Y-m',strtotime("-13 day")),
	    	'start_day' => date('d',strtotime("-13 day")),
	    	'end_year_month' =>  date('Y-m',strtotime("-11 day")),
	    	'end_day' => date('d',strtotime("-11 day")),
	    	'start_time' => '12:00',
	    	'end_time' => '18:00',
	    	'entry_fee' => 5000,
	    	'booth_fee' => 10000,
	    	'commission' => 20,
	    	'text' => "ミハマのメインフリーマーケット！今、出店者募集中！",
	    	'topic' => '中古品、 ハンドメイド',
	    	'th' => 2,
	    	'recruit_start_time' => date('Y-m-d 12:00', strtotime("-20 day")),
	    	'recruit_end_time' => date('Y-m-d 20:00', strtotime("-15 day")),
	    	'block_plan' => 1
    	]);
    	/*==================================================*/
    	
    	App\FleaTh::create([	
        	'flea_id'	=> 7,
	    	'booth_quantity' => 5,
	    	'start_year_month' => date('Y-m',strtotime("-12 day")),
	    	'start_day' => date('d',strtotime("-12 day")),
	    	'end_year_month' => date('Y-m',strtotime("-11 day")),
	    	'end_day' => date('d',strtotime("-11 day")),
	    	'start_time' => '12:00',
	    	'end_time' => '18:00',
	    	'entry_fee' => 5000,
	    	'booth_fee' => 10000,
	    	'commission' => 20,
	    	'text' => "無料で自由、ちょっぴり不思議なマーケット開催！",
	    	'topic' => '不要になった衣類、中古品',
	    	'th' => 1,
	    	'recruit_start_time' => date('Y-m-d 12:00', strtotime("-18 day")),
	    	'recruit_end_time' => date('Y-m-d 20:00', strtotime("-15 day")),
	    	'block_plan' => 8
    	]);
    	
    	App\FleaTh::create([	
        	'flea_id'	=> 8,
	    	'booth_quantity' => 5,
	    	'start_year_month' => date('Y-m',strtotime("-10 day")),
	    	'start_day' => date('d',strtotime("-10 day")),
	    	'end_year_month' => date('Y-m',strtotime("-9 day")),
	    	'end_day' => date('d',strtotime("-9 day")),
	    	'start_time' => '12:00',
	    	'end_time' => '18:00',
	    	'entry_fee' => 5000,
	    	'booth_fee' => 10000,
	    	'commission' => 20,
	    	'text' => "手作りアートのみの市、世田谷アートにようこそ",
	    	'topic' => '中古品、ハンドメイド、 アート作品、雑貨',
	    	'th' => 1,
	    	'recruit_start_time' => date('Y-m-d 12:00', strtotime("-20 day")),
	    	'recruit_end_time' => date('Y-m-d 20:00', strtotime("-14 day")),
	    	'block_plan' => 9
    	]);
    	
    	App\FleaTh::create([	
        	'flea_id'	=> 9,
	    	'booth_quantity' => 5,
	    	'start_year_month' => date('Y-m',strtotime("-8 day")),
	    	'start_day' => date('d',strtotime("-8 day")),
	    	'end_year_month' => date('Y-m',strtotime("-6 day")),
	    	'end_day' => date('d',strtotime("-6 day")),
	    	'start_time' => '12:00',
	    	'end_time' => '18:00',
	    	'entry_fee' => 5000,
	    	'booth_fee' => 10000,
	    	'commission' => 20,
	    	'text' => "フリーマーケットとパブリックビューイング開催！",
	    	'topic' => '中古品、ハンドメイド、スポーツ用品、雑貨',
	    	'th' => 1,
	    	'recruit_start_time' => date('Y-m-d 12:00', strtotime("-15 day")),
	    	'recruit_end_time' => date('Y-m-d 20:00', strtotime("-11 day")),
	    	'block_plan' => 10
    	]);
    	
    	
    	/*====================정산용====================*/
    	
    	App\FleaTh::create([	
        	'flea_id'	=> 1,
	    	'booth_quantity' => 5,
	    	'start_year_month' => date('Y-m',strtotime("-7 day")),
	    	'start_day' => date('d',strtotime("-7 day")),
	    	'end_year_month' =>  date('Y-m',strtotime("-5 day")),
	    	'end_day' => date('d',strtotime("-5 day")),
	    	'start_time' => '12:00',
	    	'end_time' => '18:00',
	    	'entry_fee' => 5000,
	    	'booth_fee' => 10000,
	    	'commission' => 20,
	    	'text' => "ミハマのメインフリーマーケット！今、出店者募集中！",
	    	'topic' => '中古品、 ハンドメイド',
	    	'th' => 3,
	    	'recruit_start_time' => date('Y-m-d 12:00', strtotime("-15 day")),
	    	'recruit_end_time' => date('Y-m-d 20:00', strtotime("-10 day")),
	    	'block_plan' => 1
    	]);
    	/*================================================*/
    	
    	App\FleaTh::create([	
        	'flea_id'	=> 10,
	    	'booth_quantity' => 5,
	    	'start_year_month' => date('Y-m',strtotime("-5 day")),
	    	'start_day' => date('d',strtotime("-5 day")),
	    	'end_year_month' => date('Y-m',strtotime("-3 day")),
	    	'end_day' => date('d',strtotime("-3 day")),
	    	'start_time' => '12:00',
	    	'end_time' => '18:00',
	    	'entry_fee' => 5000,
	    	'booth_fee' => 10000,
	    	'commission' => 20,
	    	'text' => "素敵な出会いは広場から一緒にまちづくり",
	    	'topic' => '中古品、 ハンドメイド',
	    	'th' => 1,
	    	'recruit_start_time' => date('Y-m-d 12:00', strtotime("-10 day")),
	    	'recruit_end_time' => date('Y-m-d 20:00', strtotime("-8 day")),
	    	'block_plan' => 11
    	]);
    	
    	App\FleaTh::create([	
        	'flea_id'	=> 11,
	    	'booth_quantity' => 5,
	    	'start_year_month' => date('Y-m',strtotime("-1 day")),
	    	'start_day' => date('d',strtotime("-1 day")),
	    	'end_year_month' => date('Y-m',strtotime("+1 day")),
	    	'end_day' => date('d',strtotime("+1 day")),
	    	'start_time' => '12:00',
	    	'end_time' => '18:00',
	    	'entry_fee' => 5000,
	    	'booth_fee' => 10000,
	    	'commission' => 20,
	    	'text' => "子育てのすべてのもの、完備！",
	    	'topic' => 'キッチン用品、子供服、手作り品など家庭用品',
	    	'th' => 1,
	    	'recruit_start_time' => date('Y-m-d 12:00', strtotime("-10 day")),
	    	'recruit_end_time' => date('Y-m-d 20:00', strtotime("-5 day")),
	    	'block_plan' => 12
    	]);
    	
    	App\FleaTh::create([	
        	'flea_id'	=> 12,
	    	'booth_quantity' => 5,
	    	'start_year_month' => date('Y-m',strtotime("-1 day")),
	    	'start_day' => date('d',strtotime("-1 day")),
	    	'end_year_month' => date('Y-m',strtotime("+1 day")),
	    	'end_day' => date('d',strtotime("+1 day")),
	    	'start_time' => '12:00',
	    	'end_time' => '18:00',
	    	'entry_fee' => 5000,
	    	'booth_fee' => 10000,
	    	'commission' => 20,
	    	'text' => "桜木地区の「ひと・もの・しごと」",
	    	'topic' => 'あらゆる中古品、雑貨、衣類',
	    	'th' => 1,
	    	'recruit_start_time' => date('Y-m-d 12:00', strtotime("-10 day")),
	    	'recruit_end_time' => date('Y-m-d 20:00', strtotime("-6 day")),
	    	'block_plan' => 13
    	]);
    	
    	App\FleaTh::create([	
        	'flea_id'	=> 13,
	    	'booth_quantity' => 5,
	    	'start_year_month' => date('Y-m',strtotime("+3 day")),
	    	'start_day' => date('d',strtotime("+3 day")),
	    	'end_year_month' => date('Y-m',strtotime("+5 day")),
	    	'end_day' => date('d',strtotime("+5 day")),
	    	'start_time' => '12:00',
	    	'end_time' => '18:00',
	    	'entry_fee' => 5000,
	    	'booth_fee' => 10000,
	    	'commission' => 20,
	    	'text' => "田舎の元気や創業祭！！",
	    	'topic' => 'アイデア作品、ハンドメイド、中古品',
	    	'th' => 1,
	    	'recruit_start_time' => date('Y-m-d 12:00', strtotime("-5 day")),
	    	'recruit_end_time' => date('Y-m-d 20:00', strtotime("-1 day")),
	    	'block_plan' => 14
    	]);
    	
    	App\FleaTh::create([	
        	'flea_id'	=> 14,
	    	'booth_quantity' => 5,
	    	'start_year_month' => date('Y-m',strtotime("+4 day")),
	    	'start_day' => date('d',strtotime("+4 day")),
	    	'end_year_month' => date('Y-m',strtotime("+5 day")),
	    	'end_day' => date('d',strtotime("+5 day")),
	    	'start_time' => '12:00',
	    	'end_time' => '18:00',
	    	'entry_fee' => 5000,
	    	'booth_fee' => 10000,
	    	'commission' => 20,
	    	'text' => "小さな村に小さな市場が開店します。秋の理山ホリデー",
	    	'topic' => 'ハンドメイド雑貨、飲・食物、野菜販売、特産品',
	    	'th' => 1,
	    	'recruit_start_time' => date('Y-m-d 12:00', strtotime("-5 day")),
	    	'recruit_end_time' => date('Y-m-d 20:00', strtotime("-1 day")),
	    	'block_plan' => 15
    	]);
    	
    	App\FleaTh::create([	
        	'flea_id'	=> 15,
	    	'booth_quantity' => 5,
	    	'start_year_month' => date('Y-m',strtotime("+6 day")),
	    	'start_day' => date('d',strtotime("+6 day")),
	    	'end_year_month' => date('Y-m',strtotime("+8 day")),
	    	'end_day' => date('d',strtotime("+8 day")),
	    	'start_time' => '12:00',
	    	'end_time' => '18:00',
	    	'entry_fee' => 5000,
	    	'booth_fee' => 10000,
	    	'commission' => 20,
	    	'text' => "有名出店者確報！、Paletteフリマ",
	    	'topic' => 'コーヒー、雑貨、ハンドメイド',
	    	'th' => 1,
	    	'recruit_start_time' => date('Y-m-d 12:00', strtotime("-1 day")),
	    	'recruit_end_time' => date('Y-m-d 20:00', strtotime("+3 day")),
	    	'block_plan' => 16
    	]);

    	// App\FleaTh::create([	
     //   	'flea_id'	=> 1,
	    // 	'booth_quantity' => 15,
	    // 	'start_year_month' => date('Y-m',strtotime("-1 month -15 day")),
	    // 	'start_day' => date('d',strtotime("-1 month -15 day")),
	    // 	'end_year_month' => date('Y-m',strtotime("-1 month -10 day")),
	    // 	'end_day' => date('d',strtotime("-1 month -10 day")),
	    // 	'start_time' => '12:00',
	    // 	'end_time' => '18:00',
	    // 	'entry_fee' => 5000,
	    // 	'booth_fee' => 10000,
	    // 	'commission' => 20,
	    // 	'text' => '안녕하세요 2번째 테스트 플리마켓입니다.',
	    // 	'topic' => '음식',
	    // 	'th' => 2,
	    	// 'recruit_start_time' => date('Y-m-d 12:00', strtotime("-25 day")),
	    	// 'recruit_end_time' => date('Y-m-d 20:00', strtotime("-20 day")),
	    // 	'block_plan' => 1
    	// ]);

    	// App\FleaTh::create([	
     //   	'flea_id'	=> 1,
	    // 	'booth_quantity' => 11,
	    // 	'start_year_month' => date('Y-m',strtotime("-15 day")),
	    // 	'start_day' => date('d',strtotime("-15 day")),
	    // 	'end_year_month' =>  date('Y-m',strtotime("-10 day")),
	    // 	'end_day' => date('d',strtotime("-10 day")),
	    // 	'start_time' => '12:00',
	    // 	'end_time' => '18:00',
	    // 	'entry_fee' => 5000,
	    // 	'booth_fee' => 10000,
	    // 	'commission' => 20,
	    // 	'text' => '안녕하세요 3번째 테스트 플리마켓입니다.',
	    // 	'topic' => '음식',
	    // 	'th' => 3,
	    // 	'recruit_start_time' => date('Y-m-d 12:00', strtotime("-25 day")),
	    // 	'recruit_end_time' => date('Y-m-d 20:00', strtotime("-20 day")),
	    // 	'block_plan' => 1
    	// ]);
    	
    	
    	// App\FleaTh::create([	
     //   	'flea_id'	=> 2,
	    // 	'booth_quantity' => 4,
	    // 	'start_year_month' => date('Y-m',strtotime("-15 day")),
	    // 	'start_day' => date('d',strtotime("-15 day")),
	    // 	'end_year_month' =>  date('Y-m',strtotime("-10 day")),
	    // 	'end_day' => date('d',strtotime("-10 day")),
	    // 	'start_time' => '12:00',
	    // 	'end_time' => '18:00',
	    // 	'entry_fee' => 5000,
	    // 	'booth_fee' => 10000,
	    // 	'commission' => 20,
	    // 	'text' => '안녕하세요 1번째 영진 플리마켓입니다.',
	    // 	'topic' => '음식',
	    // 	'th' => 1,
	    // 	'recruit_start_time' => date('Y-m-d 12:00', strtotime("-25 day")),
	    // 	'recruit_end_time' => date('Y-m-d 20:00', strtotime("-20 day")),
	    // 	'block_plan' => 2
    	// ]);
    }
}
