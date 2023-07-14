<?php

namespace App\Http\Controllers\ChatBot;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Dialogflow\Action\Responses\Image;

class ChatController extends Controller
{
    public function konseling(Request $request)
    {
        $agent = \Dialogflow\WebhookClient::fromData($request->json()->all());
        $agent->reply('Hi, how can I help?');
        return response()->json($agent->render());
    }
}
