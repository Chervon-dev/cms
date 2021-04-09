<?php

namespace App\Validator\Admin;

use App\Validator\Validator;

/**
 * Class PostValidator
 * @package App\Validator\Admin
 */
class PostValidator extends Validator
{
    /**
     * Выполняет валидацию авторизации
     * @return bool
     */
    public function rules(): bool
    {
        $rules = [
            'title' => 'required',
            'description' => 'required',
            'content' => 'required',
            'img' => 'file|type:image|maxsize:2097152|error'
        ];

        // Устанавливает данные об успехе
        $this->setSuccessMessage('Success!');
        return $this->validate($rules);
    }
}