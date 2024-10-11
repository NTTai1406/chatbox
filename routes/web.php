<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::post('send', [\App\Http\Controllers\ChatBotController::class, 'sendChat']);
Route::post('send', [\App\Http\Controllers\ChatController::class, 'sendChat']);

Route::get('/test-openai', function () {
    try {
        $result = OpenAI::completions()->create([
         'model' => 'gpt-3.5-turbo',
         'prompt' => 'Hello, World',
         'max_tokens' => 100,
        ]);
        return response()->json($result);
    }
    catch(Exception $e) {
        return $e->getMessage();
    }
});
