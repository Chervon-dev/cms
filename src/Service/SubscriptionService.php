<?php

namespace App\Service;

use App\Model\Subscription;

/**
 * Сервис для работы с моделью (Subscription)
 * Class SubscriptionService
 * @package App\Service
 */
class SubscriptionService
{
    /**
     * Добавляет подписку
     * @param string $email
     * @return void
     */
    public function add(string $email): void
    {
        Subscription::query()->insert(['email' => $email]);
    }

    /**
     * Удаляет подписку
     * @param string $email
     * @return void
     */
    public function delete(string $email): void
    {
        Subscription::query()
            ->where('email', '=', $email)
            ->delete();
    }
}
