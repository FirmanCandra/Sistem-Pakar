<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Consultation extends Model
{
    protected $fillable = ['session_id', 'matched_rule_ids'];

    protected function casts(): array
    {
        return [
            'matched_rule_ids' => 'array',
        ];
    }

    public function answers(): HasMany
    {
        return $this->hasMany(ConsultationAnswer::class);
    }
}
