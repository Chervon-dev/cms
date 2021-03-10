<?php

namespace App\Rule;

use App\Validator\Validator;

/**
 * Class FileTypeRule
 * @package App\Rule
 */
class FileTypeRule extends Rule
{
    /**
     * @var string
     */
    private string $fileType;

    /**
     * @var string
     */
    private string $typeValue;

    /**
     * EmailRule constructor.
     * @param Validator $validator
     * @param string $fileType
     * @param string $typeValue
     */
    public function __construct(Validator $validator, string $fileType, string $typeValue)
    {
        parent::__construct($validator);
        $this->fileType = $fileType;
        $this->typeValue = $typeValue;
    }

    /**
     * @return void
     */
    public function run(): void
    {
        if (!str_starts_with($this->fileType, $this->typeValue . '/')) {
            $this->validator->setError('error_type');
        }
    }
}