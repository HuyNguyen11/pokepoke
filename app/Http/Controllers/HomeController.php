<?php namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use DB;

class HomeController extends Controller {

    
    public function index()
    {   
        $countries = DB::table('countries')->get();
        
        $view =  view('home');
        $view->with('countries', $countries);
        return $view;
    }



}