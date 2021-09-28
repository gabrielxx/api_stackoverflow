<?php

namespace App\Http\Controllers\Api;
use Illuminate\Support\Facades\Http;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\QuestionsRequest;

class StackOverflowController extends Controller
{
    public $endpoint = "https://api.stackexchange.com/2.3";

    public function questions(QuestionsRequest $request){
        $params = $request->validated();
        $params['site'] = 'stackoverflow';
        $response = Http::get($this->endpoint.'/questions', $params);
        if($response->successful())
            return response()->json($response->json(), 200); 
        else
            return response()->json(['error' => $response->serverError()], 404); 
    }
}
