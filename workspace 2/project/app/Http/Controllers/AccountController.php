<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Pagination\LengthAwarePaginator;
use Session;

class AccountController extends Controller
{

    function hostAccountView(Request $req, $flea_id){

    	$resultTest = '';
    	$userId = Session::get('user')['id'];
    	$fleaThList = DB::table('flea_ths')->select('flea_id','id','th')->where('flea_id','=',$flea_id)->get();

    	$pagingThInfo = DB::table('fleamarkets')->join('flea_ths', 'fleamarkets.id', '=', 'flea_ths.flea_id')
    	->select('fleamarkets.id','fleamarkets.flea_name','flea_ths.th','flea_ths.commission','flea_ths.booth_fee','flea_ths.booth_quantity','flea_ths.start_year_month')
    	->where('fleamarkets.host_id','=',$userId)->where('fleamarkets.id','=',$flea_id)->paginate(3);

    	$thInfo = DB::table('fleamarkets')->join('flea_ths', 'fleamarkets.id', '=', 'flea_ths.flea_id')
    	->select('fleamarkets.id','fleamarkets.flea_name','flea_ths.th','flea_ths.commission','flea_ths.booth_fee','flea_ths.booth_quantity','flea_ths.start_year_month')
    	->where('fleamarkets.host_id','=',$userId)->where('fleamarkets.id','=',$flea_id)->get();

    	$fleaAccounts = DB::table('flea_ths')->join('lab_accounts', 'flea_ths.id', '=', 'lab_accounts.th_id')
    	->select('flea_ths.th','lab_accounts.seller_id','lab_accounts.goods_id','lab_accounts.sell_price','lab_accounts.sell_count')
    	->where('flea_ths.flea_id','=',$flea_id)->get();

    	$monthInfo = DB::table('fleamarkets')->join('flea_ths', 'fleamarkets.id', '=', 'flea_ths.flea_id')
    	->select('flea_ths.start_year_month')->where('fleamarkets.host_id','=',$userId)
    	->where('fleamarkets.id','=',$flea_id)->groupBy('flea_ths.start_year_month')->paginate(2);

    	$yearInfo = DB::table('fleamarkets')->join('flea_ths', 'fleamarkets.id', '=', 'flea_ths.flea_id')
    	->select('flea_ths.start_year_month')
    	->where('fleamarkets.host_id','=',$userId)->where('fleamarkets.id','=',$flea_id)
    	->groupBy('flea_ths.start_year_month')->paginate(2);

    	$allAccount = 0;
    	$allCommAcc = 0;
    	$allBoothFeeAcc = 0;
    	$maxAcc = 0;
    	$minAcc = 0;
  		$monthAcc = array();
  		$yearAcc = array();

    	for($i = 0, $length1 = count($pagingThInfo); $i < $length1; $i++){
    		$pagingThInfo[$i]->account = 0;
    		$pagingThInfo[$i]->commissionAccount = 0;
    		$pagingThInfo[$i]->boothFeeAccount = 0;
    		/*각 회차별 정산변수 선언*/

    		for($j = 0, $length2 = count($fleaAccounts); $j < $length2; $j++){
    		//현재 회차와 사용자의 참가 회차가 같을 때 계산
    			if($pagingThInfo[$i]->th ==  $fleaAccounts[$j]->th ){
    				$pagingThInfo[$i]->commissionAccount += ($fleaAccounts[$j]->sell_price * $fleaAccounts[$j]->sell_count)*($pagingThInfo[$i]->commission/100);
	    		}
    		}

    		//각 정산별 값 설정
    		$allBoothFeeAcc += $pagingThInfo[$i]->boothFeeAccount = $pagingThInfo[$i]->booth_quantity * $pagingThInfo[$i]->booth_fee;
    		$allCommAcc += $pagingThInfo[$i]->commissionAccount;

    		$allAccount += $pagingThInfo[$i]->account = $pagingThInfo[$i]->commissionAccount + $pagingThInfo[$i]->boothFeeAccount;

    		//최고,최저 정산금액 산정
    		if($i == 0){
    			$minAcc = $maxAcc = $pagingThInfo[$i]->account;
			}
    		if($maxAcc < $pagingThInfo[$i]->account){
    			$maxAcc = $pagingThInfo[$i]->account;
    		}
    		if($minAcc > $pagingThInfo[$i]->account){
    			$minAcc = $pagingThInfo[$i]->account;
    		}

    	}

    	for($i = 0, $length1 = count($thInfo); $i < $length1; $i++){
    		$thInfo[$i]->account = 0;
    		$thInfo[$i]->commissionAccount = 0;
    		$thInfo[$i]->boothFeeAccount = 0;
    		/*각 회차별 정산변수 선언*/

    		for($j = 0, $length2 = count($fleaAccounts); $j < $length2; $j++){
    		//현재 회차와 사용자의 참가 회차가 같을 때 계산
    			if($thInfo[$i]->th ==  $fleaAccounts[$j]->th ){
    				$thInfo[$i]->commissionAccount += ($fleaAccounts[$j]->sell_price * $fleaAccounts[$j]->sell_count)*($thInfo[$i]->commission/100);
	    		}
    		}

    		//각 정산별 값 설정
    		$allBoothFeeAcc += $thInfo[$i]->boothFeeAccount = $thInfo[$i]->booth_quantity * $thInfo[$i]->booth_fee;
    		$allCommAcc += $thInfo[$i]->commissionAccount;

    		$allAccount += $thInfo[$i]->account = $thInfo[$i]->commissionAccount + $thInfo[$i]->boothFeeAccount;

    		//최고,최저 정산금액 산정
    		if($i == 0){
    			$minAcc = $maxAcc = $thInfo[$i]->account;
			}
    		if($maxAcc < $thInfo[$i]->account){
    			$maxAcc = $thInfo[$i]->account;
    		}
    		if($minAcc > $thInfo[$i]->account){
    			$minAcc = $thInfo[$i]->account;
    		}

    	}


    	for($i = 0, $length1 = count($monthInfo); $i < $length1; $i++){
    		$month1 = Date('y-m',strtotime($monthInfo[$i]->start_year_month."-01"));
    		unset($monthInfo[$i]->start_year_month);
    		$monthInfo[$i]->month = $month1;

    		for($j = 0, $length2 = count($thInfo); $j < $length2; $j++){
    			$month2 = Date('y-m',strtotime($thInfo[$j]->start_year_month."-01"));
    			if($monthInfo[$i]->month == $month2){
    				if(!array_key_exists('account', $monthInfo[$i])){
    					$monthInfo[$i]->account = 0;
    				}
    				$monthInfo[$i]->account += $thInfo[$j]->account;
    			}
    		}
    	}

    	// 연도별 값 정산
  		for($i = 0, $length1 = count($yearInfo); $i < $length1; $i++){
    		$year1 = Date('y',strtotime($yearInfo[$i]->start_year_month."-01"));
    		unset($yearInfo[$i]->start_year_month);
    		$yearInfo[$i]->year = $year1;

    		for($j = 0, $length2 = count($pagingThInfo); $j < $length2; $j++){
    			$year2 = Date('y',strtotime($pagingThInfo[$j]->start_year_month."-01"));
    			if($yearInfo[$i]->year == $year2){
    				if(!array_key_exists('account', $yearInfo[$i])){
    					$yearInfo[$i]->account = 0;
    				}
    				$yearInfo[$i]->account += $pagingThInfo[$j]->account;
    			}
    		}
    	}
    	for($i = 0, $length1 = count($yearInfo); $i < $length1; $i++){
    		if($i + 1 == $length1){
    			break;
    		}
    		if($yearInfo[$i]->year == $yearInfo[$i+1]->year){
	    		unset($yearInfo[$i]);
	    	}
    	}
    	$i = 0;
		foreach($yearInfo as $key=>$val)
		{
		    unset($yearInfo[$key]);

		    $new_key = $i;
		    $yearInfo[$new_key] = $val;

		    $i++;
		}



    	$accountInfo = array();
    	$accountInfo['fleaThList']		= $fleaThList;
    	$accountInfo['pagingThInfo'] 	= $pagingThInfo;
    	$accountInfo['allAccount']		= $allAccount;
    	$accountInfo['maxAcc']			= $maxAcc;
    	$accountInfo['minAcc']			= $minAcc;
    	$accountInfo['allCommAcc']		= $allCommAcc;
    	$accountInfo['allBoothFeeAcc']	= $allBoothFeeAcc;
    	// $accountInfo['monthAcc']		= $monthAcc;
    	// $accountInfo['yearAcc']			= $yearAcc;
    	$accountInfo['monthInfo']		= $monthInfo;
    	$accountInfo['yearInfo']		= $yearInfo;

        // return $accountInfo['pagingThInfo'];
    	// return response($year1);
    	// return response($monthAcc);
    	//return response($yearAcc);
    	//return response($date1);
    	return view('contents.account.accounts_host')->with('accountInfo',$accountInfo);
    	//return response($minAcc);
//    	return response($accountInfo);
    	//return response($ths_accounts);
    	//return response($accountInfo['fleaThList']);
    	// return response($pagingThInfo);
    	// return response($thInfo);
    	// return response($fleaAccounts);
    	// return response($yearInfo);
//    	 return response($monthInfo);
    }



    function hostAccountThView(Request $req, $flea_id, $th_id){
    	$userId = Session::get('user')['id'];
    	$flea_id;
    	$fleaThList = DB::table('flea_ths')->select('id','th','commission','booth_fee','block_plan')->where('flea_id','=',$flea_id)->get();
    	$commission = 0;
    	$booth_fee = 0;
    	$paginateNum = 2;
    	$maxAcc = 0;
    	$minAcc = 0;
    	$finalCommAccount = 0;
    	$finalBoothFee = 0;

    	for($i = 0, $length = count($fleaThList); $i < $length; $i++){
    		if($th_id == $fleaThList[$i]->id){
    			$commission = $fleaThList[$i]->commission;
    			$booth_fee = $fleaThList[$i]->booth_fee;
    		}
    	}

    	$fleamarket = DB::table('fleamarkets')->select('id','flea_name')->where('id','=',$flea_id)->get();
        
        // return $fleaThList;
        
        $plan_id = "";
        for($i = 0; $i < count($fleaThList); $i++){
            if($fleaThList[$i]->id == $th_id){
                $plan_id = $fleaThList[$i]->block_plan;
            }
        }
        
    	$boothInfo = DB::table('booths')->join('block_plans','booths.booth_name','=','block_plans.plan_name')->join('seller_applys','booths.user_id','=','seller_applys.user_id')
    	                                ->select('booths.id','booths.user_name','booths.user_id','booths.top','booths.left','booths.width','booths.height','booths.type','seller_applys.booth_name','seller_applys.th_id')
    	                                ->where('block_plans.user_id','=',$userId)->where('block_plans.id','=',$plan_id)->where('seller_applys.th_id','=',$th_id)->get();
    	                                
    	                                

    	$pagingBoothInfo = DB::table('booths')->join('block_plans','booths.booth_name','=','block_plans.plan_name')->join('seller_applys','booths.user_id','=','seller_applys.user_id')
    	                                ->select('booths.id','booths.user_name','booths.user_id','booths.top','booths.left','booths.width','booths.height','booths.type','seller_applys.booth_name','seller_applys.th_id')
    	                                ->where('block_plans.user_id','=',$userId)->where('block_plans.id','=',$plan_id)->where('seller_applys.th_id','=',$th_id)->paginate($paginateNum);
    	
    	$userSellInfo = DB::table('lab_accounts')->where('th_id','=',$th_id)->get();

        $users = DB::table('users')->get();

        for($i = 0, $length1 = count($users); $i < $length1; $i++){
            for($j = 0, $length2 = count($boothInfo); $j < $length2; $j++){
                if($users[$i]->email == $boothInfo[$j]->user_name){
                    $boothInfo[$j]->userId = $users[$i]->id;
                }
            }
        }

        for($i = 0, $length1 = count($users); $i < $length1; $i++){
            for($j = 0, $length2 = count($pagingBoothInfo); $j < $length2; $j++){
                if($users[$i]->email == $pagingBoothInfo[$j]->user_name){
                    $pagingBoothInfo[$j]->userId = $users[$i]->id;
                }
            }
        }

    	/*페이지네이션용 부스정보값 설정*/
    // 	for($i = 0, $length1 = count($pagingBoothInfo); $i < $length1; $i++){

    // 		for($j = 0, $length2 = count($userSellInfo); $j < $length2; $j++){

    // 			if($pagingBoothInfo[$i]->userId == $userSellInfo[$j]->seller_id){
    // 				if(!array_key_exists('account',$pagingBoothInfo[$i])){
    // 					$pagingBoothInfo[$i]->account = 0;
    // 				}
    // 				$pagingBoothInfo[$i]->account += ($userSellInfo[$j]->sell_price * $userSellInfo[$j]->sell_count);
    // 			}
	   // 	}
    // 	}
    	for($i = 0, $length1 = count($pagingBoothInfo); $i < $length1; $i++){

    		for($j = 0, $length2 = count($userSellInfo); $j < $length2; $j++){

    			if($pagingBoothInfo[$i]->user_id == $userSellInfo[$j]->seller_id){
    				if(!array_key_exists('account',$pagingBoothInfo[$i])){
    					$pagingBoothInfo[$i]->account = 0;
    					$pagingBoothInfo[$i]->commAccount = 0;
    				}

    				$pagingBoothInfo[$i]->account += ($userSellInfo[$j]->sell_price * $userSellInfo[$j]->sell_count);

    				$pagingBoothInfo[$i]->commAccount += ( ( ($userSellInfo[$j]->sell_price * $userSellInfo[$j]->sell_count) / 100 ) * $commission );
    			}
	    	}
	    	if($i == 0){
	    		$minAcc = $maxAcc = $pagingBoothInfo[$i]->account;
			}
	    	if($maxAcc < $pagingBoothInfo[$i]->account){
	    		$maxAcc = $pagingBoothInfo[$i]->account;
	    	}
	    	if($minAcc > $pagingBoothInfo[$i]->account){
	    		$minAcc = $pagingBoothInfo[$i]->account;
	    	}

	    	$pagingBoothInfo[$i]->finalAccount = $pagingBoothInfo[$i]->account - $pagingBoothInfo[$i]->commAccount - $booth_fee;
	    	$finalCommAccount += $pagingBoothInfo[$i]->commAccount;
	    	$finalBoothFee += $booth_fee;
    	}
    	

    	/*부스정보값 설정*/
    	for($i = 0, $length1 = count($boothInfo); $i < $length1; $i++){

    		for($j = 0, $length2 = count($userSellInfo); $j < $length2; $j++){

    			if($boothInfo[$i]->user_id == $userSellInfo[$j]->seller_id){
    				if(!array_key_exists('account',$boothInfo[$i])){
    					$boothInfo[$i]->account = 0;
    					$boothInfo[$i]->commAccount = 0;
    				}

    				$boothInfo[$i]->account += ($userSellInfo[$j]->sell_price * $userSellInfo[$j]->sell_count);

    				$boothInfo[$i]->commAccount += ( ( ($userSellInfo[$j]->sell_price * $userSellInfo[$j]->sell_count) / 100 ) * $commission );
    			}
	    	}
            
            // return $userSellInfo;
            
            // return $boothInfo;
            
	    	if($i == 0){
	    		$minAcc = $maxAcc = $boothInfo[$i]->account;
			}
	    	if($maxAcc < $boothInfo[$i]->account){
	    		$maxAcc = $boothInfo[$i]->account;
	    	}
	    	if($minAcc > $boothInfo[$i]->account){
	    		$minAcc = $boothInfo[$i]->account;
	    	}

	    	$boothInfo[$i]->finalAccount = $boothInfo[$i]->account - $boothInfo[$i]->commAccount - $booth_fee;
	    	$finalCommAccount += $boothInfo[$i]->commAccount;
	    	$finalBoothFee += $booth_fee;
    	}
    	
    // 	return $userSellInfo;
    //     return $boothInfo;
    	//return response($userId);
    	//return response($boothInfo);
    	$accountInfo 					= array();
    // 	$accountInfo['fleaThList'] 		= $fleaThList;
    	$accountInfo['fleaThList'] 		= $fleaThList;
    	$accountInfo['boothInfo'] 		= $boothInfo;
    	$accountInfo['fleamarket'] 		= $fleamarket;
    	$accountInfo['pagingBoothInfo'] = $pagingBoothInfo;
    	$accountInfo['commission'] 		= $commission;
    	$accountInfo['paginateNum']		= $paginateNum;
    	$accountInfo['maxAcc']			= $maxAcc;
    	$accountInfo['minAcc']			= $minAcc;
    	$accountInfo['finalCommAccount']= $finalCommAccount;
    	$accountInfo['finalBoothFee']   = $finalBoothFee;
    	$accountInfo['finalAccount']    = $finalCommAccount + $finalBoothFee;

    	// return response($fleamarket);
    	return view('contents.account.accounts_host_th')->with('accountInfo',$accountInfo);
    	// return response($userSellInfo);
    	// return response($boothInfo);
    	// return response($pagingBoothInfo);
    	//return response($pagingBoothInfo->currentPage());
    }


    function sellerAccountView(){
    	$userId = Session::get('user')['id'];
    	$maxAcc = 0;
    	$minAcc = 0;
        $allAccount = 0;
    	$finalAccount = 0;
        $boothFeeAccount = 0;
        $commAccount = 0;

    	$pagingFleamarketInfo = DB::table('fleamarkets')->select('id','host_id','flea_name')->where('host_id','=',$userId)->paginate(2);
    	$fleamarketInfo = DB::table('fleamarkets')->select('id','host_id','flea_name')->where('host_id','=',$userId)->get();

    	$thInfo = DB::table('flea_ths')->select('id','flea_id','booth_quantity','start_year_month','booth_fee','commission','th')->get();

    	$labAccountInfo = DB::table('lab_accounts')->select('id','goods_id','seller_id','sell_price','sell_count','th_id')->where('seller_id','=',$userId)->get();

    	$goodsInfo = DB::table('lab_accounts')->join('goods','goods.id','=','lab_accounts.goods_id')->select('goods.id','goods.name')->where('lab_accounts.seller_id','=',$userId)->distinct()->get();

    	$pagingGoodsInfo = DB::table('lab_accounts')->join('goods','goods.id','=','lab_accounts.goods_id')->select('goods.id','goods.name')->where('lab_accounts.seller_id','=',$userId)->distinct()->get();

    	//labAccount 정보 -> th정보로 통합
    	for($i = 0, $length1 = count($thInfo); $i < $length1; $i++){
    		$thInfo[$i]->account = 0;
            $thInfo[$i]->commAccount = 0;
            $thInfo[$i]->finalAccount = 0;

    		for($j = 0, $length2 = count($labAccountInfo); $j < $length2; $j++){
    			if($thInfo[$i]->id == $labAccountInfo[$j]->th_id){
    				$thInfo[$i]->account +=	($labAccountInfo[$j]->sell_price * $labAccountInfo[$j]->sell_count);
    			}
    		}
            $thInfo[$i]->commAccount += ( ( $thInfo[$i]->account / 100 ) * $thInfo[$i]->commission );
			$thInfo[$i]->finalAccount += ( $thInfo[$i]->account - $thInfo[$i]->booth_fee - $thInfo[$i]->commAccount );
    	}

    	// 전체 정산
    	for($i = 0, $length1 = count($fleamarketInfo); $i < $length1; $i++){
    		$fleamarketInfo[$i]->account = 0;
            $fleamarketInfo[$i]->commAccount = 0;
            $fleamarketInfo[$i]->boothFeeAccount = 0;
            $fleamarketInfo[$i]->finalAccount = 0;

    		for($j = 0, $length2 = count($thInfo); $j < $length2; $j++){
    			if($fleamarketInfo[$i]->id == $thInfo[$j]->flea_id){
    				$fleamarketInfo[$i]->commAccount +=	$thInfo[$j]->commAccount;
    				$fleamarketInfo[$i]->account += $thInfo[$j]->account;
                    $fleamarketInfo[$i]->boothFeeAccount += $thInfo[$j]->booth_fee;
    		        $fleamarketInfo[$i]->finalAccount += $thInfo[$j]->finalAccount;
                }
            }

    		if($i == 0){
    			$minAcc = $maxAcc = $fleamarketInfo[$i]->account;
			}
    		if($maxAcc < $fleamarketInfo[$i]->account){
    			$maxAcc = $fleamarketInfo[$i]->account;
    		}
    		if($minAcc > $fleamarketInfo[$i]->account){
    			$minAcc = $fleamarketInfo[$i]->account;
    		}

            $commAccount += $fleamarketInfo[$i]->commAccount;
            $boothFeeAccount += $fleamarketInfo[$i]->boothFeeAccount;
    		$allAccount += $fleamarketInfo[$i]->account;
    	}

        $finalAccount = $allAccount - $commAccount - $boothFeeAccount;
    	// 페이징용
    	for($i = 0, $length1 = count($pagingFleamarketInfo); $i < $length1; $i++){
            $pagingFleamarketInfo[$i]->account = 0;
            $pagingFleamarketInfo[$i]->commAccount = 0;
            $pagingFleamarketInfo[$i]->finalAccount = 0;

            for($j = 0, $length2 = count($thInfo); $j < $length2; $j++){
                if($pagingFleamarketInfo[$i]->id == $thInfo[$j]->flea_id){
                    $pagingFleamarketInfo[$i]->commAccount += $thInfo[$j]->commAccount;
                    $pagingFleamarketInfo[$i]->account += $thInfo[$j]->account;
                    $pagingFleamarketInfo[$i]->finalAccount += $thInfo[$j]->finalAccount;
                }
            }
        }

    	// 물품 전체 정산
    	for($i = 0, $length1 = count($goodsInfo); $i < $length1; $i++){
    		$pagingGoodsInfo[$i]->account 		= $goodsInfo[$i]->account         = 0;
    		$pagingGoodsInfo[$i]->commAccount 	= $goodsInfo[$i]->commAccount     = 0;
    		$pagingGoodsInfo[$i]->finalAccount 	= $goodsInfo[$i]->finalAccount    = 0;
    		$commission = 0;
    		$booth_fee = 0;
    		for($j = 0, $length2 = count($labAccountInfo); $j < $length2; $j++){
    			for($a = 0, $length3 = count($thInfo); $a < $length3; $a++){
    				if($labAccountInfo[$j]->th_id == $thInfo[$a]->id){
    					$commission = $thInfo[$a]->commission;
    					$booth_fee = $thInfo[$a]->booth_fee;
    				}
    			}

    			if($goodsInfo[$i]->id == $labAccountInfo[$j]->goods_id){

    				$pagingGoodsInfo[$i]->account += $goodsInfo[$i]->account += ($labAccountInfo[$j]->sell_price * $labAccountInfo[$j]->sell_count);
    				$pagingGoodsInfo[$i]->commAccount += $goodsInfo[$i]->commAccount += (($goodsInfo[$i]->account/100) * $commission);
    			}
    		}
    		$pagingGoodsInfo[$i]->finalAccount += $goodsInfo[$i]->finalAccount = $goodsInfo[$i]->account - $goodsInfo[$i]->commAccount - $booth_fee;
    	}
   	
    	$accountInfo = array();
    	$accountInfo['fleamarketInfo'] = $fleamarketInfo;
    	$accountInfo['thInfo'] = $thInfo;
    	$accountInfo['pagingFleamarketInfo'] = $pagingFleamarketInfo;
    	$accountInfo['maxAcc'] = $maxAcc;
    	$accountInfo['minAcc'] = $minAcc;
    	$accountInfo['allAccount'] = $allAccount;
        $accountInfo['finalAccount'] = $finalAccount;
        $accountInfo['commAccount'] = $commAccount;
        $accountInfo['boothFeeAccount'] = $boothFeeAccount;
    	$accountInfo['goodsInfo'] = $goodsInfo;
    	$accountInfo['pagingGoodsInfo'] = $pagingGoodsInfo;
        $accountInfo['userInfo'] = Session::get('user');

        // return response($finalAccount);
    	// return response($thInfo);
    	// return response($fleamarketInfo);
    	// return response($minAcc);/account/host/{flea_id}
        // return response($userId);
    	// return response($labAccountInfo);
    	// return response($goodsNameInfo);
    	// return response($goodsInfo);
        // return response(Session::get('user'));
    	return view('contents.account.account_seller')->with('accountInfo',$accountInfo);
    }

    function sellerAccountThView(Request $req, $flea_id, $th_id){
        $userId = Session::get('user')['id'];
        $goodsInfo = DB::table('lab_accounts')->join('goods','goods.id','=','lab_accounts.goods_id')->where('th_id','=',$th_id)->where('seller_id','=',$userId)->get();
        $pagingGoodsInfo = DB::table('lab_accounts')->join('goods','goods.id','=','lab_accounts.goods_id')->where('th_id','=',$th_id)->where('seller_id','=',$userId)->paginate(2);
        $fleamarketInfo = DB::table('fleamarkets')->select('id','host_id','flea_name')->where('host_id','=',$userId)->get();
        $thInfo = DB::table('flea_ths')->select('id','flea_id','booth_quantity','start_year_month','booth_fee','commission','th')->get();
        $allAccount = 0;
        $commAccount = 0;
        $booth_fee = 0;
        $finalAccount = 0;

        for($i = 0, $length = count($thInfo); $i < $length; $i++){
            if($thInfo[$i]->id == $th_id){
                $th = $thInfo[$i]->th;
                $commission = $thInfo[$i]->commission;
                $booth_fee = $thInfo[$i]->booth_fee;
            }
        }
        for($i = 0, $length1 = count($goodsInfo); $i < $length1; $i++){
            if(!array_key_exists('account', $goodsInfo[$i])){
                $goodsInfo[$i]->account = 0;
            }
            $goodsInfo[$i]->account += $goodsInfo[$i]->sell_price * $goodsInfo[$i]->sell_count;

            if($i == 0){
                $minAcc = $maxAcc = $goodsInfo[$i]->account;
            }
            if($maxAcc < $goodsInfo[$i]->account){
                $maxAcc = $goodsInfo[$i]->account;
            }
            if($minAcc > $goodsInfo[$i]->account){
                $minAcc = $goodsInfo[$i]->account;
            }
            $allAccount += $goodsInfo[$i]->account;
            $commAccount += ( ( $goodsInfo[$i]->account / 100 ) * $commission );
        }
        $finalAccount = $allAccount - $commAccount;

        for($i = 0, $length1 = count($pagingGoodsInfo); $i < $length1; $i++){
            if(!array_key_exists('account', $pagingGoodsInfo[$i])){
                $pagingGoodsInfo[$i]->account = 0;
            }
            $pagingGoodsInfo[$i]->account += $pagingGoodsInfo[$i]->sell_price * $pagingGoodsInfo[$i]->sell_count;
        }
        

        $accountInfo = array();
        $accountInfo['goodsInfo'] = $goodsInfo;
        $accountInfo['fleamarketInfo'] = $fleamarketInfo;
        $accountInfo['thInfo'] = $thInfo;
        $accountInfo['th'] = $th;
        $accountInfo['maxAcc'] = $maxAcc;
        $accountInfo['minAcc'] = $minAcc;
        $accountInfo['allAccount'] = $allAccount;
        $accountInfo['commAccount'] = $commAccount;
        $accountInfo['booth_fee'] = $booth_fee;
        $accountInfo['commission'] = $commission;
        $accountInfo['finalAccount'] = $finalAccount;


        // return response($thInfo);
        // return response($th_id);
        // return response($th);
        // return response($goodsInfo);
    	return view('contents.account.account_seller_th')->with('accountInfo',$accountInfo);
    }
}


