<?php

namespace App;

/**
 * Class JsonResponse
 * @package App
 */
class JsonResponse implements Renderable
{
    /**
     * @var string
     */
    private string $data = '';

    /**
     * Возвращает Json (отформатированные данные)
     * @param $data
     * @return string
     */
    private function toJson($data): string
    {
        return empty($data) ? '' : json_encode($data);
    }

    /**
     * Добавляет Json данные
     * @param array|string $data
     * @return void
     */
    public function setData(array|string $data): void
    {
        $this->data .= $this->toJson($data);
    }

    /**
     * Возвращает Json данные
     * @return string
     */
    public function render(): string
    {
        return $this->data;
    }
}
