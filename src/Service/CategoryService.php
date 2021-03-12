<?php

namespace App\Service;

use App\Model\Category;
use Illuminate\Database\Eloquent\Collection;

/**
 * Class CategoryService
 * @package App\Service
 */
class CategoryService
{
    /**
     * @return Collection|array
     */
    public function getAll(): Collection|array
    {
        return Category::query()->get()->all();
    }
}