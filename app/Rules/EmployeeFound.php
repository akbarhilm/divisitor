<?php

namespace App\Rules;

use App\Api\Employee;
use Closure;
use Illuminate\Contracts\Validation\ValidationRule;

class EmployeeFound implements ValidationRule
{
    /**
     * Run the validation rule.
     *
     * @param  \Closure(string): \Illuminate\Translation\PotentiallyTranslatedString  $fail
     */
    public function validate(string $attribute, mixed $value, Closure $fail): void
    {
        if (strlen($value) === 6) {
            $found = Employee::find($value);

            if (!$found) {
                $fail('Please provide a valid Reporter ID');
            }
        }
    }
}
