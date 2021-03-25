<?php

namespace App;

/**
 * Класс для работы с конфигами
 * Class Config
 * @package App
 */
class Config
{
    /**
     * @var Config|null
     */
    private static Config|null $instance = null;

    /**
     * @var array
     */
    private array $configs;

    /**
     * Config constructor.
     */
    private function __construct()
    {
        // Устанавливаем конфиг для подключения к БД
        $this->setConfig('db', require APP_DIR . '/configs/db.php');

        // Устанавливаем конфиг для пагинации
        $this->setConfig('pagination', require APP_DIR . '/configs/pagination.php');
    }

    /**
     * Устанавливает параметр
     * @param string $key
     * @param mixed $value
     * @return void
     */
    public function setConfig(string $key, mixed $value): void
    {
        $this->configs[$key] = $value;
    }

    /**
     * Возвращает параметр (по названию параметра)
     * @param string $config
     * @param mixed|null $default
     * @return mixed
     */
    public function getConfig(string $config, mixed $default = null): mixed
    {
        return array_get($this->configs, $config, $default);
    }

    /**
     * @return Config
     */
    public static function getInstance(): Config
    {
        if (is_null(self::$instance)) {
            self::$instance = new self;
        }
        return self::$instance;
    }

    private function __clone()
    {
    }
}
