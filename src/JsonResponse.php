<?php

namespace App;

/**
 * Class JsonResponse
 * @package App
 */
class JsonResponse implements Renderable
{
    /**
     * @var mixed
     */
    private mixed $data = '';

    /**
     * JsonResponse constructor.
     * @param mixed $data
     */
    public function __construct(mixed $data)
    {
        $this->data = $data;
    }

    /**
     * Возвращает Json данные
     * @return void
     */
    public function render(): void
    {
        echo json_encode($this->data);
    }
}
