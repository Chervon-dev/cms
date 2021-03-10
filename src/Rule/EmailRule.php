<?php

namespace App\Rule;

use App\Validator\Validator;

/**
 * Class EmailRule
 * @package App\Rule
 */
class EmailRule extends Rule
{
    /**
     * @var string
     */
    private string $email;

    /**
     * EmailRule constructor.
     * @param Validator $validator
     * @param string $email
     */
    public function __construct(Validator $validator, string $email)
    {
        parent::__construct($validator);
        $this->email = $email;
    }

    /**
     * @return void
     */
    public function run(): void
    {
        if (!isTrueEmailAddress($this->email)) {
            $this->validator->setError('wrong_email');
        }
    }
}