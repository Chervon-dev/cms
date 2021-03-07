<?php

namespace App\Validator;

use App\Service\UserService;

/**
 * Валидатор для авторизации
 * Class LoginValidator
 * @package App\Validator
 */
class LoginValidator extends Validator
{
    /**
     * @var string
     */
    private string $email;

    /**
     * @var string
     */
    private string $password;

    /**
     * LoginValidator constructor.
     * @param string $email
     * @param string $password
     */
    public function __construct(string $email, string $password)
    {
        parent::__construct();
        $this->email = $email;
        $this->password = $password;
    }

    /**
     * Выполняет валидацию авторизации
     * @return bool
     */
    public function validate(): bool
    {
        if ($this->email == '') {
            $this->setError('empty_email');
        }

        if ($this->password == '') {
            $this->setError('empty_password');
        }

        // Устанавливает данные об успехе
        $this->setSuccessMessage('You are successfully login!');
        return $this->checkErrors();
    }
}
