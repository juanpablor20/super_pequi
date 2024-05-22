<?php

namespace App\Services;

class UserValidationRules
{
    public static function rules()
    {
        return [
            'names' => 'required|min:2|max:50',
            'last_name' => 'required|min:2|max:50',
            'type_identification' => 'required',
            'number_identification' => 'required|numeric|digits_between:6,12|unique:users,number_identification',
            'sex_user' => 'required|string',
            'gender_sex' => 'required',
            'email_con' => 'required|email',
            'telephone_con' => 'required|regex:/^\d{10}$/',
            'addres_add' => 'required',
        ];
    }

    public static function passwordRules()
    {
        return [
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ];
    }

    public static function updateRules()
    {
        return [
            'names' => 'required',
            'last_name' => 'required',
            'type_identification' => 'required',
            'number_identification' => 'required',
            'sex_user' => 'required',
            'gender_sex' => 'required',
            'email_con' => 'required',
            'telephone_con' => 'required',
            'addres_add' => 'required',
        ];
    }
}
