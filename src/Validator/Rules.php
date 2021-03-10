<?php

namespace App\Validator;

/**
 * Class Rules
 * @package App\Validator
 */
class Rules
{
    /**
     * @var Validator
     */
    private Validator $validator;

    /**
     * Rules constructor.
     * @param Validator $validator
     */
    public function __construct(Validator $validator)
    {
        $this->validator = $validator;
    }

    /**
     * @param string $field
     * @param string $value
     */
    public function required(string $field, string $value): void
    {
        if ($value == '') {
            $this->validator->setError('empty_' . $field);
        }
    }

    /**
     * @param string $email
     */
    public function email(string $email): void
    {
        if (!isTrueEmailAddress($email)) {
            $this->validator->setError('wrong_email');
        }
    }

    /**
     * @param string $checkBox
     * @param string $checkedValue
     */
    public function checkbox(string $checkBox, string $checkedValue): void
    {
        if ($checkBox !== $checkedValue) {
            $this->validator->setError('site-rules_unchecked');
        }
    }

    /**
     * @param string $value
     * @param string $table
     * @param string $column
     * @return void
     */
    public function exists(string $value, string $table, string $column): void
    {
        if (call_user_func([$table, 'query'])->where($column, $value)->exists() && $value !== getActiveEmail()) {
            $this->validator->setError('isset_' . $column);
        }
    }

    /**
     * @param string $value
     * @param string $confirmedField
     * @param string $confirmedValue
     * @return void
     */
    public function confirm(string $value, string $confirmedField, string $confirmedValue): void
    {
        if ($value !== $confirmedValue) {
            $this->validator->setError($confirmedField . 's_mismatch');
        }
    }

    /**
     * @param array $file
     * @param string $type
     * @return void
     */
    public function checkFileType(array $file, string $type): void
    {
        $fileType = mime_content_type($file['tmp_name']);
        if (!str_starts_with($fileType, $type . '/')) {
            $this->validator->setError('error_type');
        }
    }

    /**
     * @param array $file
     * @param string $size
     * @return void
     */
    public function checkFileSize(array $file, string $size): void
    {
        if ($file['size'] > $size) {
            $this->validator->setError('error_size');
        }
    }

    /**
     * @param array $file
     * @param string $errorValue
     * @return void
     */
    public function checkFileError(array $file, string $errorValue): void
    {
        if ($file['error'] !== $errorValue) {
            $this->validator->setError('error_upload');
        }
    }
}