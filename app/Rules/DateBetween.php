<?php

namespace App\Rules;

use Carbon\Carbon;
use Closure;
use Illuminate\Contracts\Validation\ValidationRule;

class DateBetween implements ValidationRule
{
    public function __construct()
    {
        
    }
    /**
     * Run the validation rule.
     *
     * @param  \Closure(string): \Illuminate\Translation\PotentiallyTranslatedString  $fail
     */
    public function validate(string $attribute, mixed $value, Closure $fail): void
    {
       
        $pickupDate = Carbon::parse($value);
        $lastDate = Carbon::now()->addWeek();

      
    if ($value < now() || $value > $lastDate) {
        $fail("Please choose a date between now and a week from now.");
    }
    }
    
}
