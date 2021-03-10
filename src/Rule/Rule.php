<?php

namespace App\Rule;

use App\Validator\Validator;

/**
 * Class Rule
 * @package App\Rule
 */
abstract class Rule
{
    /**
     * @var Validator
     */
    protected Validator $validator;

    /**
     * Rule constructor.
     * @param Validator $validator
     */
    public function __construct(Validator $validator)
    {
        $this->validator = $validator;
    }

    /**
     * Запускает проверку правила
     * @return void
     */
    abstract public function run(): void;
}