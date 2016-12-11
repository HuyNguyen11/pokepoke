<?php namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use DB;
use Response;
use Log;
use Request;


use Illuminate\Support\Facades\Input;

class HomeController extends Controller {

    
    public function index()
    {   
        $countries = DB::table('countries')->get();
        // dd($countries);
        $view =  view('home');
        $view->with('countries', $countries);
        
        return $view;
    }

    public function show($id)
    {
        $query = DB::table('countries')->where('id', '=', $id)->get();
	Log::info($query);
	Log::info($id);
        $country = $query[0];

        return Response::json($country, 200);
    }
    function saveMessage($id)
    {
        Log::info("save function start");
        $inputData = Input::all();
        Log::info($inputData['comment']);
        // Handle the user upload of avatar
        if( $inputData['comment']){
            DB::table('messages')->insert(
                ['countries_id' => $id, 'message' => $inputData['comment']]
            );
        }
        else {
                return Response::json(" Something wrong!!" , 500);
        }        
        return Response::json(" Done!" , 200);
    }    
    function getMessage($id)
    {
        Log::info("show message start");
        // Handle the user upload of avatar
        Log::info($id);
        if(!$id){
            return Response::json(" Something wrong!!" , 500);
        }
            $data = DB::table('messages')->where('countries_id', '=', $id)->get();
            $count = count($data);
            $rand =rand(0,$count-1);
            Log::info($data[$rand]->message);
        if(!$data){
            return Response::json(" Something wrong!!" , 500);
        }
        else{

        }
        return Response::json(["msg" => $data[$rand]->message], 200);
    }       

}
