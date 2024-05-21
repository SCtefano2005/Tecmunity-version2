<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;

class TecsupEmailRule implements Rule
{
    /**
     * Determine if the validation rule passes.
     *
     * @param  string  $attribute
     * @param  mixed  $value
     * @return bool
     */
    public function passes($attribute, $value)
    {
        // Implementa la lógica de validación aquí
        // Retorna true si la validación pasa, de lo contrario false
        return substr($value, -14) === '@tecsup.edu.pe';
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        // Retorna el mensaje de error en caso de que la validación falle
        return 'El campo :attribute debe ser un correo de @tecsup.edu.pe.';
    }
}
