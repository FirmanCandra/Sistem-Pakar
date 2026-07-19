<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class RuleDetail extends Model
{
    protected $fillable = ['rule_id', 'question_id', 'question_option_id'];

    public function rule(): BelongsTo
    {
        return $this->belongsTo(Rule::class);
    }

    public function question(): BelongsTo
    {
        return $this->belongsTo(Question::class);
    }

    public function option(): BelongsTo
    {
        return $this->belongsTo(QuestionOption::class, 'question_option_id');
    }
}
