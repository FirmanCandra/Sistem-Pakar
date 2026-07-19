<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Question;
use App\Models\QuestionOption;
use Illuminate\Http\Request;

class QuestionOptionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('admin.question-options.index', [
            'options' => QuestionOption::with('question')->orderBy('question_id')->orderBy('sort_order')->paginate(15),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.question-options.form', [
            'option' => new QuestionOption,
            'questions' => Question::orderBy('sort_order')->get(),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        QuestionOption::create($this->validated($request));

        return redirect()->route('admin.question-options.index')->with('success', 'Pilihan jawaban berhasil ditambahkan.');
    }

    /**
     * Display the specified resource.
     */
    public function show(QuestionOption $questionOption)
    {
        return redirect()->route('admin.question-options.edit', $questionOption);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(QuestionOption $questionOption)
    {
        return view('admin.question-options.form', [
            'option' => $questionOption,
            'questions' => Question::orderBy('sort_order')->get(),
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, QuestionOption $questionOption)
    {
        $questionOption->update($this->validated($request));

        return redirect()->route('admin.question-options.index')->with('success', 'Pilihan jawaban berhasil diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(QuestionOption $questionOption)
    {
        $questionOption->delete();

        return redirect()->route('admin.question-options.index')->with('success', 'Pilihan jawaban berhasil dihapus.');
    }

    private function validated(Request $request): array
    {
        return $request->validate([
            'question_id' => ['required', 'exists:questions,id'],
            'value' => ['required', 'string', 'max:100'],
            'label' => ['required', 'string', 'max:100'],
            'sort_order' => ['required', 'integer', 'min:1'],
        ]);
    }
}
