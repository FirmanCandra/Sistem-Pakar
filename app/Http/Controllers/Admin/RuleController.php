<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Plant;
use App\Models\Question;
use App\Models\QuestionOption;
use App\Models\Rule;
use Illuminate\Http\Request;

class RuleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('admin.rules.index', ['rules' => Rule::withCount('details')->latest()->paginate(10)]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.rules.form', $this->formData(new Rule));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $this->validated($request);
        $rule = Rule::create([
            'name' => $data['name'],
            'description' => $data['description'] ?? null,
            'plant_ids' => $data['plant_ids'],
        ]);

        $this->syncDetails($rule, $data['conditions'] ?? []);

        return redirect()->route('admin.rules.index')->with('success', 'Rule berhasil ditambahkan.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Rule $rule)
    {
        return redirect()->route('admin.rules.edit', $rule);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Rule $rule)
    {
        return view('admin.rules.form', $this->formData($rule));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Rule $rule)
    {
        $data = $this->validated($request);
        $rule->update([
            'name' => $data['name'],
            'description' => $data['description'] ?? null,
            'plant_ids' => $data['plant_ids'],
        ]);

        $this->syncDetails($rule, $data['conditions'] ?? []);

        return redirect()->route('admin.rules.index')->with('success', 'Rule berhasil diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Rule $rule)
    {
        $rule->delete();

        return redirect()->route('admin.rules.index')->with('success', 'Rule berhasil dihapus.');
    }

    private function formData(Rule $rule): array
    {
        return [
            'rule' => $rule->load('details'),
            'plants' => Plant::orderBy('name')->get(),
            'questions' => Question::with('options')->orderBy('sort_order')->get(),
            'selectedConditions' => $rule->details->pluck('question_option_id', 'question_id')->all(),
        ];
    }

    private function validated(Request $request): array
    {
        return $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'description' => ['nullable', 'string'],
            'plant_ids' => ['required', 'array', 'min:1'],
            'plant_ids.*' => ['exists:plants,id'],
            'conditions' => ['required', 'array', 'min:1'],
            'conditions.*' => ['nullable', 'exists:question_options,id'],
        ]);
    }

    private function syncDetails(Rule $rule, array $conditions): void
    {
        $rule->details()->delete();

        foreach ($conditions as $questionId => $optionId) {
            if (! $optionId) {
                continue;
            }

            $option = QuestionOption::findOrFail($optionId);
            $rule->details()->create([
                'question_id' => $option->question_id,
                'question_option_id' => $option->id,
            ]);
        }
    }
}
