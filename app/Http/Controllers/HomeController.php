<?php namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use DB;
use Response;
use Log;
use Request;
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
    function saveMessage()
    {
        Log::info("save function start");
        $inputData = Input::all();
        // Handle the user upload of avatar
        if( $inputData['comment']){
            
        }
        else {
                return Response::json(" Something wrong!!" , 500);
        }        
        return Response::json(array('avatar_url' => $user->avatar,"msg" => "success"),200 );
    }    

}
