<?php

namespace App\Service;

use App\JsonResponse;
use App\Model\Subscription;
use App\Validator\SubscriptionValidator;

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
        return Subscription::query()->where('email', $email)->exists();
    }

    /**
     * Регистрирует подписку (подписывает пользователя)
     * @return JsonResponse
     */
    public function sign(): JsonResponse
    {
        $data = ['email' => strip_tags($_POST['email'])];

        // Валидатор
        $validator = new SubscriptionValidator($data);

        // Валидация
        if (!$validator->rules()) {
            // Получение ошибок
            return $validator->getErrors();
        }

        // Добавление подписки
        $this->add($data['email']);

        // Получение данных об успехе
        return $validator->getSuccess();
    }

    /**
     * Удаляет подписку (отписывает пользователя)
     * @return void
     */
    public function unsubscribe(): void
    {
        $userService = new UserService();
        $this->delete(
            $userService->getActiveEmail()
        );
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
