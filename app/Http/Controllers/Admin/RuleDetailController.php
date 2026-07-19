<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Question;
use App\Models\QuestionOption;
use App\Models\Rule;
use App\Models\RuleDetail;
use Illuminate\Http\Request;

class RuleDetailController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('admin.rule-details.index', [
            'details' => RuleDetail::with(['rule', 'question', 'option'])->latest()->paginate(15),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.rule-details.form', $this->formData(new RuleDetail));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $this->validated($request);
        $option = QuestionOption::findOrFail($data['question_option_id']);
        $data['question_id'] = $option->question_id;
        RuleDetail::updateOrCreate(
            ['rule_id' => $data['rule_id'], 'question_id' => $data['question_id']],
            ['question_option_id' => $data['question_option_id']]
        );

        return redirect()->route('admin.rule-details.index')->with('success', 'Detail rule berhasil disimpan.');
    }

    /**
     * Display the specified resource.
     */
    public function show(RuleDetail $ruleDetail)
    {
        return redirect()->route('admin.rule-details.edit', $ruleDetail);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(RuleDetail $ruleDetail)
    {
        return view('admin.rule-details.form', $this->formData($ruleDetail));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, RuleDetail $ruleDetail)
    {
        $data = $this->validated($request);
        $option = QuestionOption::findOrFail($data['question_option_id']);
        $ruleDetail->update([
            'rule_id' => $data['rule_id'],
            'question_id' => $option->question_id,
            'question_option_id' => $option->id,
        ]);

        return redirect()->route('admin.rule-details.index')->with('success', 'Detail rule berhasil diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(RuleDetail $ruleDetail)
    {
        $ruleDetail->delete();

        return redirect()->route('admin.rule-details.index')->with('success', 'Detail rule berhasil dihapus.');
    }

    private function formData(RuleDetail $ruleDetail): array
    {
        return [
            'detail' => $ruleDetail,
            'rules' => Rule::orderBy('name')->get(),
            'questions' => Question::with('options')->orderBy('sort_order')->get(),
        ];
    }

    private function validated(Request $request): array
    {
        return $request->validate([
            'rule_id' => ['required', 'exists:rules,id'],
            'question_option_id' => ['required', 'exists:question_options,id'],
        ]);
    }
}
