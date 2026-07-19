<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Rule extends Model
{
    protected $fillable = ['name', 'description', 'plant_ids'];

    protected function casts(): array
    {
        return [
            'plant_ids' => 'array',
        ];
    }

    public function details(): HasMany
    {
        return $this->hasMany(RuleDetail::class);
    }
}
