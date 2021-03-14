<?php

namespace App\Rules;

use App\Models\Contact;
use App\Models\File;
use Illuminate\Contracts\Validation\Rule;

class CheckContactUnique implements Rule
{
    private File $file;
    /**
     * Create a new rule instance.
     *
     * @return void
     */
    public function __construct(File $file)
    {
        $this->file = $file;
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
        $files = File::where('user_id', $this->file->user_id)->pluck('id');
        $contacts = Contact::where('email', $value)->whereIn('file_id',$files)->get();
        if($contacts->count() == 0){
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
        return trans('validation.contact_exist');
    }
}
