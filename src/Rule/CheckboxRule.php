<?php

namespace App\Rule;

use App\Validator\Validator;

/**
 * Class CheckboxRule
 * @package App\Rule
 */
class CheckboxRule extends Rule
{
    /**
     * @var string
     */
    private string $checkboxValue;

    /**
     * @var string
     */
    private string $checkedValue;

    /**
     * EmailRule constructor.
     * @param Validator $validator
     * @param string $checkboxValue
     * @param string $checkedValue
     */
    public function __construct(
        Validator $validator,
        string $checkboxValue,
        string $checkedValue)
    {
        parent::__construct($validator);
        $this->checkboxValue = $checkboxValue;
        $this->checkedValue = $checkedValue;
    }

    /**
     * @return void
     */
    public function run(): void
    {
        if ($this->checkboxValue !== $this->checkedValue) {
            $this->validator->setError('site-rules_unchecked');
        }
    }
}