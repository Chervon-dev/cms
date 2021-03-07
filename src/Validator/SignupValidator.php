<?php

namespace App\Validator;

use App\Service\UserService;

/**
 * Валидатор для регистрации
 * Class SignupValidator
 * @package App\Validator
 */
class SignupValidator extends Validator
{
    /**
     * @var string
     */
    private string $name;

    /**
     * @var string
     */
    private string $email;

    /**
     * @var string
     */
    private string $password;

    /**
     * @var string
     */
    private string $confirmPassword;

    /**
     * @var string
     */
    private string $checkbox;

    /**
     * SignupValidator constructor.
     * @param string $name
     * @param string $email
     * @param string $password
     * @param string $confirmPassword
     * @param string $checkbox
     */
    public function __construct(
        string $name,
        string $email,
        string $password,
        string $confirmPassword,
        string $checkbox)
    {
        parent::__construct();
        $this->name = $name;
        $this->email = $email;
        $this->password = $password;
        $this->confirmPassword = $confirmPassword;
        $this->checkbox = $checkbox;
    }

    /**
     * Выполняет валидацию регистрации
     * @return bool
     */
    public function validate(): bool
    {
        if ($this->name == '') {
            $this->setError('empty_name');
        }

        if ($this->email == '') {
            $this->setError('empty_email');

        } elseif (!isTrueEmailAddress($this->email)) {
            $this->setError('wrong_email');
        }

        if ($this->password == '') {
            $this->setError('empty_password');
        }

        if ($this->confirmPassword == '' || $this->confirmPassword !== $this->password) {
            $this->setError('passwords_mismatch');
        }

        if ($this->checkbox === 'unchecked') {
            $this->setError('site-rules_unchecked');
        }

        // Устанавливает данные об успехе
        $this->setSuccessMessage('You have successfully registered!');
        return $this->checkErrors();
    }
}
