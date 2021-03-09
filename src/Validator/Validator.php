<?php

namespace App\Validator;

use App\JsonResponse;

/**
 * Абстракный валидатор
 * Class Validator
 * @package App\Validator
 */
abstract class Validator
{
    /**
     * @var array
     */
    protected array $data = [];

    /**
     * @var array
     */
    protected array $errors = [];

    /**
     * @var string
     */
    protected string $successMessage;

    /**
     * @var Rules
     */
    protected Rules $rules;

    /**
     * Validator constructor.
     * @param array $data
     */
    public function __construct(array $data)
    {
        $this->data = $data;
        $this->rules = new Rules($this);
    }

    /**
     * Выполняет валидацию авторизации
     */
    abstract protected function rules();

    /**
     * @param array $rules
     * @return bool
     */
    protected function validate(array $rules): bool
    {
        foreach ($this->data as $key => $value) {

            if (isset($rules[$key])) {
                $rule = $rules[$key];
                $rulesList = explode('|', $rule);
                $this->runCheckRules($key, $value, $rulesList);
            }
        }

        return $this->checkErrors();
    }

    /**
     * Возвращает ошибки
     * @return JsonResponse
     */
    public function getErrors(): JsonResponse
    {
        return new JsonResponse($this->errors);
    }

    /**
     * Возвращает данные об успехе
     * @return JsonResponse
     */
    public function getSuccess(): JsonResponse
    {
        return new JsonResponse($this->successMessage);
    }

    /**
     * Устанавливает ошибку
     * @param string $message
     */
    public function setError(string $message): void
    {
        $this->errors[] = $message;
    }

    /**
     * Устанавливает данные об успехе
     * @param string $message
     */
    protected function setSuccessMessage(string $message): void
    {
        $this->successMessage = $message;
    }

    /**
     * Проверяет, нет ли ошибки
     * @return bool
     */
    protected function checkErrors(): bool
    {
        return empty($this->errors);
    }

    /**
     * @param string $key
     * @param mixed $value
     * @param array $rules
     * @return void
     */
    private function runCheckRules(string $key, mixed $value, array $rules): void
    {
        foreach ($rules as $ruleItem) {

            if ($ruleItem === 'required') {
                $this->rules->required($key, $value);
            }

            if ($ruleItem === 'email') {
                $this->rules->email($value);
            }

            if (str_starts_with($ruleItem, 'exists:')) {

                $params = getStringAfterCharacter($ruleItem, ':');
                list($table, $column) = explode('.', $params);
                $this->rules->exists($value, $table, $column);
            }

            if (str_starts_with($ruleItem, 'checkboxType:')) {

                $type = getStringAfterCharacter($ruleItem, ':');
                $this->rules->checked($value, $type);
            }

            if (str_starts_with($ruleItem, 'confirm:')) {

                $confirmedField = getStringAfterCharacter($ruleItem, ':');
                $confirmedValue = $this->data[$confirmedField];
                $this->rules->confirm($value, $confirmedField, $confirmedValue);
            }

            if (str_starts_with($ruleItem, 'type:')) {

                $type = getStringAfterCharacter($ruleItem, ':');
                $this->rules->checkType($value, $type);
            }

            if (str_starts_with($ruleItem, 'maxsize:')) {

                $size = getStringAfterCharacter($ruleItem, ':');
                $this->rules->checkSize($value, $size);
            }

            if (str_starts_with($ruleItem, 'error:')) {

                $errorValue = getStringAfterCharacter($ruleItem, ':');
                $this->rules->checkError($value, $errorValue);
            }
        }
    }
}
