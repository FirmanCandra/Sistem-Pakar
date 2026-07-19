<?php

namespace App\Services;

use App\Models\Plant;
use App\Models\Rule;
use Illuminate\Support\Collection;

class ForwardChainingService
{
    /**
     * @param  array<int, int>  $answers  Keyed by question ID, valued by option ID.
     * @return array{plants: Collection<int, Plant>, matchedRules: Collection<int, Rule>, reasons: array<int, array<int, string>>}
     */
    public function infer(array $answers): array
    {
        $facts = collect($answers)->map(fn ($optionId) => (int) $optionId);

        $matchedRules = Rule::with(['details.question', 'details.option'])
            ->get()
            ->filter(function (Rule $rule) use ($facts) {
                if ($rule->details->isEmpty()) {
                    return false;
                }

                return $rule->details->every(function ($detail) use ($facts) {
                    return (int) $facts->get($detail->question_id) === (int) $detail->question_option_id;
                });
            })
            ->values();

        $plantIds = $matchedRules
            ->flatMap(fn (Rule $rule) => $rule->plant_ids ?? [])
            ->unique()
            ->values();

        $plants = Plant::whereIn('id', $plantIds)->get()->sortBy(function (Plant $plant) use ($plantIds) {
            return $plantIds->search($plant->id);
        })->values();

        $reasons = [];
        foreach ($matchedRules as $rule) {
            foreach ($rule->plant_ids ?? [] as $plantId) {
                $reasons[$plantId][] = $rule->description ?: $rule->name;
            }
        }

        return [
            'plants' => $plants,
            'matchedRules' => $matchedRules,
            'reasons' => $reasons,
        ];
    }
}
