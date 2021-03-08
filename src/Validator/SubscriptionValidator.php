<?php

namespace App\Validator;

use App\Model\Subscription;
use App\Service\SubscriptionService;

/**
 * Валидатор для подписок
 * Class SubscriptionValidator
 * @package App\Validator
 */
class SubscriptionValidator extends Validator
{
    /**
     * @var string
     */
    private string $email;

    /**
     * SubscriptionValidator constructor.
     * @param string $email
     */
    public function __construct(string $email)
    {
        parent::__construct();
        $this->email = $email;
    }

    /**
     * Выполняет валидацию подписки (Email)
     * @return bool
     */
    public function validate(): bool
    {
        // Проверяет, подписан ли данный Email
        if ($this->checkByEmail($this->email)) {
            $this->setError('isset_email');
        }

        if ($this->email == '') {
            $this->setError('empty_email');
        }

        if (!isTrueEmailAddress($this->email)) {
            $this->setError('wrong_email');
        }

        // Устанавливает данные об успехе
        $this->setSuccessMessage(isAuthorized());
        return $this->checkErrors();
    }

    /**
     * Проверяет, подписан ли пользователь (по Email)
     * @param string $email
     * @return bool
     */
    public function checkByEmail(string $email): bool
    {
        return Subscription::query()
            ->where('email', $email)
            ->exists();
    }
}
