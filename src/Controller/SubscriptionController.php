<?php

namespace App\Controller;

use App\JsonResponse;
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
     * @return JsonResponse
     */
    public function sign(): JsonResponse
    {
        return $this->subscriptionService->sign();
    }

    /**
     * Удаляет подписку (отписывает пользователя)
     * @return void
     */
    public function unsubscribe(): void
    {
        $this->subscriptionService->unsubscribe();
    }
}
