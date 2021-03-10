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
     * Выполняет валидацию подписки (Email)
     * @return bool
     */
    public function rules(): bool
    {
        $rules = [
            'email' => 'required|email|exists:' . Subscription::class . '.email'
        ];

        // Устанавливает данные об успехе
        $this->setSuccessMessage('Success!');
        return $this->validate($rules);
    }
}
