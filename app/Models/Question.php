<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Question extends Model
{
    protected $fillable = ['code', 'question_text', 'sort_order'];

    public function options(): HasMany
    {
        return $this->hasMany(QuestionOption::class)->orderBy('sort_order');
    }

    public function ruleDetails(): HasMany
    {
        return $this->hasMany(RuleDetail::class);
    }
}
