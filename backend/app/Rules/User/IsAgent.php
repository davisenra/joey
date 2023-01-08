<?php

namespace App\Rules\User;

use App\Models\User;
use Illuminate\Contracts\Validation\InvokableRule;

class IsAgent implements InvokableRule
{
    /**
     * Run the validation rule.
     *
     * @param  string  $attribute
     * @param  mixed  $value
     * @param  \Closure(string): \Illuminate\Translation\PotentiallyTranslatedString  $fail
     * @return void
     */
    public function __invoke($attribute, $value, $fail)
    {
        $user = User::where([
            ['uuid', $value],
            ['role', 'agent'],
        ])->first();

        if (! $user) {
            $fail('Provided user is not an agent');
        }
    }
}
