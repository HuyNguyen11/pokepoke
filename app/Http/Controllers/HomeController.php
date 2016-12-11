<?php namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use DB;
use Response;

class HomeController extends Controller {

    
    public function index()
    {   
        $countries = DB::table('countries')->get();
        
        $view =  view('home');
        $view->with('countries', $countries);
        
        return $view;
    }

    public function show($id)
    {
        $query = DB::table('countries')->where('id', '=', $id)->get();

        $country = $query[0];

        return Response::json($country, 200);
    }


}