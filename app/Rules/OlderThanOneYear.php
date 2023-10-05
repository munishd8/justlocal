<?php

namespace App\Rules;

use Closure;
use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Support\Carbon;

class OlderThanOneYear implements ValidationRule
{
    /**
     * Run the validation rule.
     *
     * @param  \Closure(string): \Illuminate\Translation\PotentiallyTranslatedString  $fail
     */
    public function validate(string $attribute, mixed $value, Closure $fail): void
    {
        $dateOfBirth = Carbon::parse($value);
        $oneYearBeforeToday = Carbon::now()->subYear();

        if ($dateOfBirth->greaterThan($oneYearBeforeToday)) {
            $fail('The :attribute must be Must be before last Year.');
        }
    }

}
