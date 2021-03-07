<?php

namespace App;

use App\Exception\NotFoundException;

/**
 * Основной класс роутинга
 * Class Router
 * @package App
 */
class Router
{
    /**
     * @var array
     */
    private array $routes = [];

    /**
     * Регестрирует роут с запросом (GET)
     * @param string $uri
     * @param callable|string $callback
     * @return void
     */
    public function get(string $uri, callable|string $callback): void
    {
        $this->add('GET', $uri, $callback);
    }

    /**
     * Регестрирует роут с запросом (POST)
     * @param string $uri
     * @param callable|string $callback
     * @return void
     */
    public function post(string $uri, callable|string $callback): void
    {
        $this->add('POST', $uri, $callback);
    }

    /**
     * Отвечает за запуск метода Route->run()
     * @return mixed
     * @throws NotFoundException
     */
    public function dispatch(): mixed
    {
        $uri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);

        foreach ($this->routes as $route) {
            if ($route->match($_SERVER['REQUEST_METHOD'], $uri)) {
                return $route->run($uri);
            }
        }

        throw new NotFoundException();
    }

    /**
     * Регестрирует роут
     * @param string $method
     * @param string $path
     * @param callable|string $callback
     * @return void
     */
    private function add(string $method, string $path, callable|string $callback): void
    {
        $this->routes[] = new Route($method, $path, $callback);
    }
}
