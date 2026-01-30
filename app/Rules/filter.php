<?php

namespace App\Rules;

use Closure;
use Illuminate\Contracts\Validation\ValidationRule;

class filter implements ValidationRule
{
    protected $forbden;
    public function __construct($for)
    {
        return $this->forbden = $for;
    }

    /**
     * Run the validation rule.
     *
     * @param  \Closure(string, ?string=): \Illuminate\Translation\PotentiallyTranslatedString  $fail
     */
    public function validate(string $attribute, mixed $value, Closure $fail): void
    {
        if (in_array($value, $this->forbden)) {
            $fail("this value is not allwoed");
        }
    }
}
