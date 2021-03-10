<?php

namespace App\Rule;

use App\Validator\Validator;

/**
 * Class ConfirmRule
 * @package App\Rule
 */
class ConfirmRule extends Rule
{
    /**
     * @var string
     */
    private string $value;

    /**
     * @var string
     */
    private string $confirmedField;

    /**
     * @var string
     */
    private string $confirmedValue;

    /**
     * EmailRule constructor.
     * @param Validator $validator
     * @param string $value
     * @param string $confirmedField
     * @param string $confirmedValue
     */
    public function __construct(
        Validator $validator,
        string $value,
        string $confirmedField,
        string $confirmedValue)
    {
        parent::__construct($validator);
        $this->value = $value;
        $this->confirmedField = $confirmedField;
        $this->confirmedValue = $confirmedValue;
    }

    /**
     * @return void
     */
    public function run(): void
    {
        if ($this->value !== $this->confirmedValue) {
            $this->validator->setError($this->confirmedField . 's_mismatch');
        }
    }
}