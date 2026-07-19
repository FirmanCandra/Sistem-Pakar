<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Question;
use Illuminate\Http\Request;

class QuestionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('admin.questions.index', ['questions' => Question::withCount('options')->orderBy('sort_order')->paginate(10)]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.questions.form', ['question' => new Question]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        Question::create($this->validated($request));

        return redirect()->route('admin.questions.index')->with('success', 'Pertanyaan berhasil ditambahkan.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Question $question)
    {
        return redirect()->route('admin.questions.edit', $question);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Question $question)
    {
        return view('admin.questions.form', compact('question'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Question $question)
    {
        $question->update($this->validated($request, $question));

        return redirect()->route('admin.questions.index')->with('success', 'Pertanyaan berhasil diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Question $question)
    {
        $question->delete();

        return redirect()->route('admin.questions.index')->with('success', 'Pertanyaan berhasil dihapus.');
    }

    private function validated(Request $request, ?Question $question = null): array
    {
        return $request->validate([
            'code' => ['required', 'string', 'max:50', 'unique:questions,code,'.($question?->id ?? 'NULL')],
            'question_text' => ['required', 'string', 'max:255'],
            'sort_order' => ['required', 'integer', 'min:1'],
        ]);
    }
}
