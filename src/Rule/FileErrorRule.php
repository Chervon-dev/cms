<?php

namespace App\Rule;

use App\Validator\Validator;

/**
 * Class FileErrorRule
 * @package App\Rule
 */
class FileErrorRule extends Rule
{
    /**
     * @var int
     */
    private int $error;

    /**
     * EmailRule constructor.
     * @param Validator $validator
     * @param int $error
     */
    public function __construct(Validator $validator, int $error)
    {
        parent::__construct($validator);
        $this->error = $error;
    }

    /**
     * @return void
     */
    public function run(): void
    {
        if ($this->error !== 0) {
            $this->validator->setError('error_upload');
        }
    }
}