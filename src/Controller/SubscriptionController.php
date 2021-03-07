<?php

namespace App\Controller;

use App\Service\SubscriptionService;
use App\Service\UserService;
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
     * @var UserService
     */
    private UserService $userService;

    /**
     * AuthController constructor.
     */
    public function __construct()
    {
        $this->subscriptionService = new SubscriptionService();
        $this->userService = new UserService();
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

        // Проверяет, подписан ли данный Email
        if ($this->subscriptionService->checkByEmail($email)) {
            $validator->setError('isset_email');
        }

        // Валидация
        if ($validator->validate()) {
            // Добавление подписки
            $this->subscriptionService->add($email);
        } else {
            // Получение ошибок
            return $validator->getErrors();
        }

        // Получение данных об успехе
        return $validator->getSuccess();
    }

    /**
     * Удаляет подписку (отписывает пользователя)
     * @return void
     */
    public function unsubscribe(): void
    {
        $this->subscriptionService->delete(getActiveEmail());
    }
}
