<?php

namespace App\Controller;

use App\Service\SubscriptionService;
use App\Validator\SubscriptionValidator;

/**
 * Контроллер для работы с подпиской
 * Class SubscriptionController
 * @package App\Controller
 */
class SubscriptionController
{
    /**
     * @var SubscriptionService
     */
    private SubscriptionService $subscriptionService;

    /**
     * AuthController constructor.
     */
    public function __construct()
    {
        $this->subscriptionService = new SubscriptionService();
    }

    /**
     * Регестрирует подписку (подписывает пользователя)
     * @return bool|string
     */
    public function sign(): bool|string
    {
        // Инициализация переменных
        $email = strip_tags($_POST['email']);

        // Валидатор
        $validator = new SubscriptionValidator($email);

        // Валидация
        if (!$validator->validate()) {
            // Получение ошибок
            return $validator->getErrors();
        }

        // Добавление подписки
        $this->subscriptionService->add($email);

        // Получение данных об успехе
        return $validator->getSuccess();
    }

    /**
     * Удаляет подписку (отписывает пользователя)
     * @return void
     */
    public function unsubscribe(): void
    {
        $this->subscriptionService->delete(
            getActiveEmail()
        );
    }
}
