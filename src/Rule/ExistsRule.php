<?php

namespace App\Rule;

use App\Validator\Validator;

/**
 * Class ExistsRule
 * @package App\Rule
 */
class ExistsRule extends Rule
{
    /**
     * @var string
     */
    private string $value;

    /**
     * @var string
     */
    private string $table;

    /**
     * @var string
     */
    private string $column;

    /**
     * EmailRule constructor.
     * @param Validator $validator
     * @param string $value
     * @param string $table
     * @param string $column
     */
    public function __construct(
        Validator $validator,
        string $value,
        string $table,
        string $column)
    {
        parent::__construct($validator);
        $this->value = $value;
        $this->table = $table;
        $this->column = $column;
    }

    /**
     * @return void
     */
    public function run(): void
    {
        if ($this->checkValueInTable($this->value, $this->table, $this->column) &&
            $this->value !== getActiveEmail()
        ) {
            $this->validator->setError('isset_' . $this->column);
        }
    }

    /**
     * @param string $value
     * @param string $table
     * @param string $column
     * @return bool
     */
    private function checkValueInTable(string $value, string $table, string $column): bool
    {
        return call_user_func([$table, 'query'])->where($column, $value)->exists();
    }
}