<?php

namespace App;

use Illuminate\Database\Capsule\Manager as Capsule;

/**
 * Основной класс приложения
 * Class Application
 * @package App
 */
class Application
{
    /**
     * @var Router
     */
    private Router $router;

    /**
     * Application constructor.
     * @param Router $router
     */
    public function __construct(Router $router)
    {
        $this->router = $router;
        $this->initialize();
    }

    /**
     * Запускает приложение
     * @return void
     */
    public function run(): void
    {
        try {
            $dispatch = $this->router->dispatch();

            if ($dispatch instanceof Renderable) {
                $dispatch->render();
            } else {
                echo $dispatch;
            }

        } catch (\Exception $exception) {
            $this->renderException($exception);
        }
    }

    /**
     * Выводит исключение
     * @param \Exception $exception
     * @return void
     */
    private function renderException(\Exception $exception): void
    {
        if ($exception instanceof Renderable) {
            $exception->render();
        } else {
            $this->showExceptionMessage($exception);
        }
    }

    /**
     * Выводит сообщение об ошибке
     * @param \Exception $exception
     * @return void
     */
    private function showExceptionMessage(\Exception $exception): void
    {
        $code = $exception->getCode() !== 0 ?? 500;
        echo $code . ' ' . $exception->getMessage();
    }

    /**
     * Инициализирует параметры БД
     * @return void
     */
    private function initialize(): void
    {
        $capsule = new Capsule;

        $capsule->addConnection(
            Config::getInstance()->getConfig('db')
        );

        $capsule->setAsGlobal();
        $capsule->bootEloquent();
    }
}
