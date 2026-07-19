<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class QuestionOption extends Model
{
    protected $fillable = ['question_id', 'value', 'label', 'sort_order'];

    public function question(): BelongsTo
    {
        return $this->belongsTo(Question::class);
    }

    public function ruleDetails(): HasMany
    {
        return $this->hasMany(RuleDetail::class);
    }
}
