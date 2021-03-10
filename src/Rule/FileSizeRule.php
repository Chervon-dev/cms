<?php

namespace App\Rule;

use App\Validator\Validator;

/**
 * Class FileSizeRule
 * @package App\Rule
 */
class FileSizeRule extends Rule
{
    /**
     * @var int|string
     */
    private string|int $fileSize;

    /**
     * @var int|string
     */
    private string|int $sizeValue;

    /**
     * EmailRule constructor.
     * @param Validator $validator
     * @param string|int $fileSize
     * @param string|int $sizeValue
     */
    public function __construct(Validator $validator, string|int $fileSize, string|int $sizeValue)
    {
        parent::__construct($validator);
        $this->fileSize = $fileSize;
        $this->sizeValue = $sizeValue;
    }

    /**
     * @return void
     */
    public function run(): void
    {
        if ($this->fileSize > $this->sizeValue) {
            $this->validator->setError('error_size');
        }
    }
}