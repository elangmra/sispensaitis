<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use GuzzleHttp\Client;

class EssayController extends Controller
{
    public function index()
    {
        return view('frontend.essay.index');
    }
    public function score(Request $request)
    {
        $client = new Client();

        $response = $client->post('http://localhost:5000/score-essay', [
            'json' => [
                'student_answer' => $request->student_answer,
                'key_answer' => $request->key_answer
            ]
        ]);

        $score = json_decode((string) $response->getBody(), true);

        return view('frontend.essay.result', ['score' => $score['score']]);
    }
}