<?php

namespace App\Http\Controllers;

use App\Models\Consultation;
use App\Models\Question;
use App\Services\ForwardChainingService;
use Illuminate\Http\Request;

class ConsultationController extends Controller
{
    public function create()
    {
        return view('consultations.create', [
            'questions' => Question::with('options')->orderBy('sort_order')->get(),
        ]);
    }

    public function store(Request $request, ForwardChainingService $engine)
    {
        $questions = Question::with('options')->orderBy('sort_order')->get();

        $rules = [];
        foreach ($questions as $question) {
            $optionIds = $question->options->pluck('id')->implode(',');
            $rules["answers.{$question->id}"] = ['required', "in:{$optionIds}"];
        }

        $validated = $request->validate($rules, [
            'answers.*.required' => 'Semua pertanyaan wajib dijawab.',
        ]);

        $result = $engine->infer($validated['answers']);

        $consultation = Consultation::create([
            'session_id' => $request->session()->getId(),
            'matched_rule_ids' => $result['matchedRules']->pluck('id')->all(),
        ]);

        foreach ($validated['answers'] as $questionId => $optionId) {
            $consultation->answers()->create([
                'question_id' => $questionId,
                'question_option_id' => $optionId,
            ]);
        }

        return view('consultations.result', [
            'plants' => $result['plants'],
            'matchedRules' => $result['matchedRules'],
            'reasons' => $result['reasons'],
            'consultation' => $consultation,
        ]);
    }
}
