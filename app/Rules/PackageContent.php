<?php

namespace App\Rules;

use Illuminate\Support\Facades\Config;
use Illuminate\Contracts\Validation\Rule;

class PackageContent implements Rule
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
        if(preg_match('/^[0-9]{6}/', $value)) {
            return (bool) in_array(substr($value,6), Config::get('constants.cities'));
        } else return false;
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return 'The package_content does not contain a valid string.';
    }
}
