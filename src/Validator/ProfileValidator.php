<?php

namespace App\Validator;

use App\Model\User;

/**
 * Валидатор данных профиля
 * Class ProfileValidator
 * @package App\Validator
 */
class ProfileValidator extends Validator
{
    /**
     * Валидация данных профиля
     * @return bool
     */
    public function rules(): bool
    {
        $rules = [
            'name' => 'required',
            'email' => 'required|email|exists:' . User::class . '.email',
        ];

        // Устанавливает данные об успехе
        $this->setSuccessMessage('You have successfully updated!');
        return $this->validate($rules);
    }
}