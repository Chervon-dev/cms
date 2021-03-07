<?php

namespace App;

/**
 * Класс для работы с роутами
 * Class Route
 * @package App
 */
class Route
{
    /**
     * @var string
     */
    private string $method;

    /**
     * @var string
     */
    private string $path;

    /**
     * @var callable|string
     */
    private $callback;

    /**
     * Route constructor.
     * @param string $method
     * @param string $path
     * @param callable|string $callback
     */
    public function __construct(string $method, string $path, callable|string $callback)
    {
        $this->method = $method;
        $this->path = $path;
        $this->callback = $callback;
    }

    /**
     * @return string
     */
    public function getPath(): string
    {
        return $this->path;
    }

    /**
     * Запускает Route с параметрами
     * @param string $uri
     * @return mixed
     */
    public function run(string $uri): mixed
    {
        $callback = $this->prepareCallback();
        $params = $this->getParams($uri);
        return call_user_func_array($callback, $params);
    }

    /**
     * Проверяет, подходит ли маршрут к данному запросу
     * @param string $method
     * @param string $uri
     * @return bool
     */
    public function match(string $method, string $uri): bool
    {
        if (stripos($uri, '?')) {
            $uri = stristr($uri, '?', true);
        }

        return $this->method === $method &&
            preg_match('/^' . str_replace(['*', '/'], ['\w+', '\/'], $this->getPath()) . '$/', $uri);
    }

    /**
     * Подготавливает callback
     * @return callable|array
     */
    private function prepareCallback(): callable|array
    {
        if (is_string($this->callback)) {
            list($class, $method) = explode('@', $this->callback);
            return [(new $class()), $method];
        }

        return $this->callback;
    }

    /**
     * Возвращает параметры из uri
     * @param string $uri
     * @return array
     */
    private function getParams(string $uri): array
    {
        $urlParts = explode('/', $uri);
        $routeParts = explode('/', $this->getPath());

        $params = [];
        foreach ($routeParts as $key => $part) {
            if ($part === '*') {
                $params[] = $urlParts[$key];
            }
        }

        return $params;
    }
}
