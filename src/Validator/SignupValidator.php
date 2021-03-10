<?php

namespace App\Validator;

use App\Model\User;

/**
 * Валидатор для регистрации
 * Class SignupValidator
 * @package App\Validator
 */
class SignupValidator extends Validator
{
    /**
     * Выполняет валидацию регистрации
     * @return bool
     */
    public function rules(): bool
    {
        $rules = [
            'name' => 'required',
            'email' => 'required|email|exists:' . User::class . '.email',
            'password' => 'required',
            'confirm_password' => 'required|confirm:password',
            'checkbox' => 'checkbox:checked',
        ];

        // Устанавливает данные об успехе
        $this->setSuccessMessage('You have successfully registered!');
        return $this->validate($rules);
    }
}
