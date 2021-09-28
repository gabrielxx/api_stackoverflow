<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\Http;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;
   
    public $endpoint = "https://api.stackexchange.com/2.3";

    public function sendRequestHttp($params){
       
        $response = Http::get($this->endpoint.'/questions', $params);
        if($response->successful())
            return response()->json($response->json(), 200); 
        else
            return response()->json(['error' => $response->serverError()], 404); 
    }
}
