<?php

namespace App\Validator\Admin;

use App\Validator\Validator;

/**
 * Class CommentValidator
 * @package App\Validator\Admin
 */
class CommentValidator extends Validator
{
    /**
     * Выполняет валидацию авторизации
     * @return bool
     */
    public function rules(): bool
    {
        $rules = [
            'text' => 'required'
        ];

        // Устанавливает данные об успехе
        $this->setSuccessMessage('Success!');
        return $this->validate($rules);
    }
}