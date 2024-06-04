<?php

namespace App\Rules;

use Closure;
use Illuminate\Contracts\Validation\Rule;

class ValidEmail implements Rule
{
    public function passes($attribute, $value)
    {
        // Validación RFC
        if (!filter_var($value, FILTER_VALIDATE_EMAIL)) {
            return false;
        }

        // Validación DNS
        $domain = substr(strrchr($value, "@"), 1);
        if (!checkdnsrr($domain, "MX")) {
            return false;
        }

        return true;
    }

    public function message()
    {
        return 'La dirección de correo electrónico no es válida';
    }
}

