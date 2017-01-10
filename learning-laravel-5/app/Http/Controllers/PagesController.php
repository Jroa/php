<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

class PagesController extends Controller
{
    public function about(){
    	//$data = array("first" => "Jonathan", "last" => "Roa");
    	//return view("pages.about", $data);

    	$first = "Jonathan";
    	$last = "Roa";

    	return view("pages.about", compact('first','last'));
    }
}
