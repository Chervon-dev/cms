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
     * Проверяет, подписан ли пользователь (по Email)
     * @param string $email
     * @return bool
     */
    public function checkByEmail(string $email): bool
    {
        // Возвращает данные о подписке пользователя
        $subscribe = Subscription::query()
            ->where('email', '=', $email)
            ->first();

        return !empty($subscribe);
    }

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
