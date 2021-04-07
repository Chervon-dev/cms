<?php

namespace App\Validator\Admin;

use App\Validator\Validator;

/**
 * Class UserValidator
 * @package App\Validator\Admin
 */
class UserValidator extends Validator
{
    /**
     * Выполняет валидацию авторизации
     * @return bool
     */
    public function rules(): bool
    {
        $rules = [
            'name' => 'required',
            'email' => 'required|email',
        ];

        // Устанавливает данные об успехе
        $this->setSuccessMessage('You are successfully update!');
        return $this->validate($rules);
    }
}