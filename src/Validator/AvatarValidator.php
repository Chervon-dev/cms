<?php

namespace App\Validator;

/**
 * Валидатор для файла аватарки
 * Class AvatarValidator
 * @package App\Validator
 */
class AvatarValidator extends Validator
{
    /**
     * Валидация данных файла аватарки
     * @return bool
     */
    public function rules(): bool
    {
        $rules = [
            'avatar' => 'file|type:image|maxsize:2097152|error'
        ];

        // Устанавливает данные об успехе
        $this->setSuccessMessage('You have successfully updated!');
        return $this->validate($rules);
    }
}