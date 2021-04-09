<?php

namespace App\Validator;

use App\JsonResponse;
use App\Rule\CheckboxRule;
use App\Rule\ConfirmRule;
use App\Rule\EmailRule;
use App\Rule\ExistsRule;
use App\Rule\FileErrorRule;
use App\Rule\FileSizeRule;
use App\Rule\FileTypeRule;
use App\Rule\RequiredRule;
use App\Rule\Rule;

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
     * @var array
     */
    protected array $rules = [];

    /**
     * Validator constructor.
     * @param array $data
     */
    public function __construct(array $data)
    {
        $this->data = $data;
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
                $this->registerRules($key, $value, $rulesList);
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
     * Проверяет, есть ли ошибка
     * @param string $error
     * @return bool
     */
    public function checkError(string $error): bool
    {
        return in_array($error, $this->errors);
    }

    /**
     * Регестрирует правила
     * @param string $key
     * @param mixed $value Значение из полученного массива
     * @param array $rules Массив правил для поля
     * @return void
     */
    private function registerRules(string $key, mixed $value, array $rules): void
    {
        foreach ($rules as $ruleItem) {

            if ($ruleItem === 'required') {
                // Добавляем правило
                $this->addRule(
                    new RequiredRule($this, $key, $value)
                );
            }

            if ($ruleItem === 'email') {
                // Добавляем правило
                $this->addRule(
                    new EmailRule($this, $value)
                );
            }

            if ($ruleItem === 'error') {
                // Добавляем правило
                $this->addRule(
                    new FileErrorRule($this, $value['error'])
                );
            }

            if (str_starts_with($ruleItem, 'maxsize:')) {

                $size = getStringAfterCharacter($ruleItem, ':');

                // Добавляем правило
                $this->addRule(
                    new FileSizeRule($this, $value['size'], $size)
                );
            }

            if (str_starts_with($ruleItem, 'exists:')) {

                $params = getStringAfterCharacter($ruleItem, ':');
                list($table, $column) = explode('.', $params);

                // Добавляем правило
                $this->addRule(
                    new ExistsRule($this, $value, $table, $column)
                );
            }

            if (str_starts_with($ruleItem, 'checkbox:')) {

                $type = getStringAfterCharacter($ruleItem, ':');

                // Добавляем правило
                $this->addRule(
                    new CheckboxRule($this, $value, $type)
                );
            }

            if (str_starts_with($ruleItem, 'confirm:')) {

                $confirmedField = getStringAfterCharacter($ruleItem, ':');
                $confirmedValue = $this->data[$confirmedField];

                // Добавляем правило
                $this->addRule(new ConfirmRule(
                    $this,
                    $value,
                    $confirmedField,
                    $confirmedValue
                ));
            }

            if (str_starts_with($ruleItem, 'type:')) {

                $fileType = mime_content_type($value['tmp_name']);
                $type = getStringAfterCharacter($ruleItem, ':');

                // Добавляем правило
                $this->addRule(
                    new FileTypeRule($this, $fileType, $type)
                );
            }
        }

        $this->runRules();
    }

    /**
     * Запускает проверку всех правил
     * @return void
     */
    private function runRules()
    {
        foreach ($this->rules as $rule) {
            $rule->run();
        }
    }

    /**
     * Регестрирует правило
     * @param Rule $rule
     * @return void
     */
    private function addRule(Rule $rule): void
    {
        $this->rules[] = $rule;
    }
}
