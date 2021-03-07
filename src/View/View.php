<?php

namespace App\View;

use App\Renderable;

/**
 * Класс для работы с шаблонами
 * Class View
 * @package App\View
 */
class View implements Renderable
{
    /**
     * @var string
     */
    private string $template;

    /**
     * @var array
     */
    private array $data;

    /**
     * View constructor.
     * @param string $template
     * @param array $data
     */
    public function __construct(string $template, array $data = [])
    {
        $this->template = $template;
        $this->data = $data;
    }

    /**
     * Выводит шаблон на страницу
     * @return void
     */
    public function render(): void
    {
        $templatePath = $this->getTemplatePath();
        includeView($templatePath, $this->data);
    }

    /**
     * Возвращает отформатированный путь
     * @return string
     */
    private function getTemplatePath(): string
    {
        return str_replace('.', '/', $this->template) . '.php';
    }
}
