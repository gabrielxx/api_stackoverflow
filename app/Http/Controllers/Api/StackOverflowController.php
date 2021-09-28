<?php

namespace App\Http\Controllers\Api;
use App\Http\Controllers\Controller;
use App\Http\Requests\QuestionsRequest;

class StackOverflowController extends Controller
{

    public function getQuestions(QuestionsRequest $request){
        $params = $request->validated();
        $params['site'] = 'stackoverflow';
        return $this->sendRequestHttp($params);
    }
}
