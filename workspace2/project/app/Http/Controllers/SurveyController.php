<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\SurveyQuastion;
use App\SurveyExample;
use Illuminate\Support\Facades\DB;

class SurveyController extends Controller
{
    function register(Request $req,$th_id){

    	$surveyArr = $req->input('surveyArr');
		for($count = 0, $len = count($surveyArr); $count < $len ; $count++){
			$surveyQ = new SurveyQuastion;
			$surveyEX = new SurveyExample;

			$surveyQ->th_id 	= $th_id;
			$surveyQ->text 		= $surveyArr[$count]['survey_q'];
			$surveyQ->save();
			$quastionLastId = SurveyQuastion::max('id');
			foreach ($surveyArr[$count] as $key => $value) {
				$surveyQ = new SurveyQuastion;
				$surveyEX = new SurveyExample;
				if($key != 'survey_q'){
					$surveyQ->th_id 	= $th_id;
					$surveyQ->text 		= $surveyArr[$count][$key];
					$surveyQ->save();
					$exLastId = SurveyQuastion::max('id');
					$surveyEX->parent_id= $quastionLastId;
					$surveyEX->table_id	= $exLastId;
					$surveyEX->save();
				}
			}
		}

		$result = 'success';
		$callback = $req->input('callback');
		echo $callback."(".json_encode($result).")";
    }

    function loadSurvey(Request $req, $flea_id){
    	$surveyQ = new SurveyQuastion;
		$surveyEX = new SurveyExample;

		//$jointest = DB::table('survey_quastions')->select('id','text')->get();

		$quastionsJoin = DB::table('survey_quastions')->join('survey_examples', 'survey_examples.parent_id', '=', 'survey_quastions.id')->select('survey_quastions.id', 'survey_quastions.text')->distinct()->get();

		$examplesJoin = DB::table('survey_quastions')->join('survey_examples', 'survey_examples.table_id', '=', 'survey_quastions.id')->select('survey_quastions.id', 'survey_quastions.text','survey_examples.parent_id')->distinct()->get();

		//$jointest = preg_replace('/\\\u([0-9a-f]+)/', '&#x$1;', $jointest);
		//$jointest =  ($jointest, ENT_COMPAT, 'UTF-8');
		//$jointest = $jointest[0];

		// $join = array();

		// for($i = 0, $len = count($jointest); $i < $len; $i++){
		// 	$join[$i] = array();
		// 	foreach ($jointest[$i] as $key){
		// 		$join[$i][$key] = $jointest[$i][$key];
		// 		if($key == "text"){
		// 			$join[$i][$key] = preg_replace('/\\\u([0-9a-f]+)/', '&#x$1;', $jointest[$i][$key]);
		// 		}
		// 	}
		// }

		return view('contents.flea.surveyView')->with('quastionsJoin',$quastionsJoin)->with('examplesJoin',$examplesJoin);
    	//return response($examplesJoin);
    }

    function surveyApply(Request $req){
    	
    }
}
