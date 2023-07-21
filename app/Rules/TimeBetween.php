<?php

namespace App\Rules;

use Carbon\Carbon;
use Closure;
use Illuminate\Contracts\Validation\ValidationRule;

class TimeBetween implements ValidationRule
{
    /**
     * Run the validation rule.
     *
     * @param  \Closure(string): \Illuminate\Translation\PotentiallyTranslatedString  $fail
     */
    public function validate(string $attribute, mixed $value, Closure $fail): void
    {
        $piclupDate=Carbon::parse($value);
        $pickupTime=Carbon::createFromTime($piclupDate->hour,$piclupDate->minute,$piclupDate->second);
        $earlistTime=Carbon::createFromTimeString('08:00:00');
        $lastTime=Carbon::createFromTimeString('12:00:00');
        if(! $pickupTime->between($earlistTime,$lastTime)){
         $fail('Please choose the time between 08:00 to 24:00');
        }
    }
}
