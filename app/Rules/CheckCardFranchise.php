<?php

namespace App\Rules;

use App\Http\Helpers;
use Illuminate\Contracts\Validation\Rule;

class CheckCardFranchise implements Rule
{
    /**
     * Create a new rule instance.
     *
     * @return void
     */
    public function __construct()
    {

    }

    /**
     * Determine if the validation rule passes.
     *
     * @param  string  $attribute
     * @param  mixed  $value
     * @return bool
     */
    public function passes($attribute, $value)
    {
        return Helpers::getFranchise($value);
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return trans('validation.franchise_doesnot_exists');
    }
}
