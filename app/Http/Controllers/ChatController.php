<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use OpenAI\Laravel\Facades\OpenAI;

class ChatController extends Controller
{
    public function sendChat(Request $request){
        $userMessage = $request->input('input');

        $responses = [
          'hello' => 'Hi! How I Assist You Today?',
          'how are you today?' => 'How I Assist You Today?',
          'good bye' => 'Good Bye',
          'default' =>'Sorry! I Did Not Understand You Your Can You Say Again',
        ];

        $response = $responses['default'];
        foreach ($responses as $key => $reply) {
            if (stripos($userMessage, $key) !== false) {
                $response = $reply;
                break;
            }
        }
        return response()->json($response);
    }
}
