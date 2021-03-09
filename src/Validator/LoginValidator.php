<?php

namespace App\Validator;

/**
 * Валидатор для авторизации
 * Class LoginValidator
 * @package App\Validator
 */
class LoginValidator extends Validator
{
    /**
     * Выполняет валидацию авторизации
     * @return bool
     */
    public function rules(): bool
    {
        $rules = [
            'email' => 'required',
            'password' => 'required',
        ];

        // Устанавливает данные об успехе
        $this->setSuccessMessage('You are successfully login!');
        return $this->validate($rules);
    }
}
