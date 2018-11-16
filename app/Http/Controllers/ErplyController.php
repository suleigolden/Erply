<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
// include ERPLY API class
use App\Classes\EAPI;

class ErplyController extends Controller
{
    //Add product to Erply System
    public function addProduct(Request $request){
    	
    	session_start();
    	// Initialise class
		$api = new EAPI();

		// Configuration settings
		$api->clientCode = "111294";
		$api->username = "suleimamman@gmail.com";
		$api->password = "1234";
		 $api->url = "https://".$api->clientCode.".erply.com/api/";

		// Create a new customer group
		$inputParameters = array(
		    "name" => $request->ProductName,
		);
		$result = $api->sendRequest("saveCustomerGroup", $inputParameters);

		// Default output format is JSON, so we'll decode it into a PHP array
		$output = json_decode($result, true);

		// print "<pre>";
		// print_r($output);
		// print "</pre>";
    	 // $out_Put = array('status' => "OK",
      //                  'replyResult' => $result, );
        return response()->json($output);
    }
}
