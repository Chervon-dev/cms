<?php

namespace App\Rule;

use App\Validator\Validator;

/**
 * Class RequiredRule
 * @package App\Rule
 */
class RequiredRule extends Rule
{
    /**
     * @var string
     */
    private string $value;

    /**
     * @var string
     */
    private string $field;

    /**
     * EmailRule constructor.
     * @param Validator $validator
     * @param string $value
     * @param string $field
     */
    public function __construct(Validator $validator, string $field, string $value)
    {
        parent::__construct($validator);
        $this->value = $value;
        $this->field = $field;
    }

    /**
     * @return void
     */
    public function run(): void
    {
        $message = 'empty_' . $this->field;
        if ($this->value == '' && !$this->validator->checkError($message)) {
            $this->validator->setError($message);
        }
    }
}