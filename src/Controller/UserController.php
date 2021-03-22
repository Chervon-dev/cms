<?php

namespace App\Controller;

use App\Exception\NotFoundException;
use App\JsonResponse;
use App\Service\UserService;
use App\View\View;

/**
 * Контроллер для работы с пользователями
 * Class UserController
 * @package App\Controller
 */
class UserController
{
    /**
     * @var UserService
     */
    private UserService $userService;

    /**
     * AuthController constructor.
     */
    public function __construct()
    {
        $this->userService = new UserService();
    }

    /**
     * Выводит страницу (Profile)
     * @return View
     * @throws NotFoundException
     */
    public function me(): View
    {
        return $this->userService->me();
    }

    /**
     * Выводит страницу (user-info)
     * @param int $id
     * @return View
     * @throws NotFoundException
     */
    public function show(int $id): View
    {
        return $this->userService->show($id);
    }

    /**
     * Обновляет данные о пользователе
     * @return JsonResponse
     */
    public function update(): JsonResponse
    {
        return $this->userService->update();
    }

    /**
     * Обновляет аватар пользователя
     * @return JsonResponse
     */
    public function updateAvatar(): JsonResponse
    {
        return $this->userService->updateAvatar();
    }
}
