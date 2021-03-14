<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;

class CheckPhoneFormat implements Rule
{
    /**
     * Create a new rule instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
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
        if(preg_match("/^\(\+[0-9]{2}\)\s[0-9]{3}\s[0-9]{3}\s[0-9]{2}\s[0-9]{2}$/", $value)){
            return true;
        }
        if(preg_match("/^\(\+[0-9]{2}\)\s[0-9]{3}\-[0-9]{3}\-[0-9]{2}\-[0-9]{2}$/", $value)){
            return true;
        }
        return false;
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return trans('validation.phone');
    }
}