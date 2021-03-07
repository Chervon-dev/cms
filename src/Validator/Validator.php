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
    protected array $errors = [];

    /**
     * @var string
     */
    protected string $successMessage;

    /**
     * @var JsonResponse
     */
    protected JsonResponse $response;

    /**
     * Validator constructor.
     */
    public function __construct()
    {
        $this->response = new JsonResponse();
    }

    /**
     * Выполняет валидацию
     * @return bool
     */
    abstract public function validate(): bool;

    /**
     * Возвращает ошибки
     * @return string|null
     */
    public function getErrors(): string|null
    {
        $this->response->setData($this->errors);
        return $this->response->render();
    }

    /**
     * Возвращает данные об успехе
     * @return string
     */
    public function getSuccess(): string
    {
        $this->response->setData($this->successMessage);
        return $this->response->render();
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
}
