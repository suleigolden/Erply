<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ErplyController extends Controller
{
    //Add product to Erply System
    public function addProduct(Request $request){

    	 $outPut = array('status' => "OK",
                        'replyResult' => "null", );
        return response()->json($outPut);
    }
}