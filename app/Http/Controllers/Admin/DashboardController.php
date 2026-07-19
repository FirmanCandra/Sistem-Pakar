<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Consultation;
use App\Models\Plant;
use App\Models\Question;
use App\Models\Rule;

class DashboardController extends Controller
{
    public function index()
    {
        return view('admin.dashboard', [
            'plantsCount' => Plant::count(),
            'questionsCount' => Question::count(),
            'rulesCount' => Rule::count(),
            'consultationsCount' => Consultation::count(),
        ]);
    }
}
