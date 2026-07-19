<?php

namespace App\Http\Controllers;

use App\Models\Plant;
use App\Models\Question;
use App\Models\Rule;

class HomeController extends Controller
{
    public function index()
    {
        return view('home', [
            'plantsCount' => Plant::count(),
            'questionsCount' => Question::count(),
            'rulesCount' => Rule::count(),
        ]);
    }

}
