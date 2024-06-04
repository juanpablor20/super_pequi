<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;

class ValidAddress implements Rule
{
    public function passes($attribute, $value)
    {
        // Verificar si la dirección coincide con el formato deseado
        return preg_match('/^[A-Za-z0-9\-# ]+$/', $value);
    }

    public function message()
    {
        return 'La dirección no cumple con el formato requerido.';
    }
}
