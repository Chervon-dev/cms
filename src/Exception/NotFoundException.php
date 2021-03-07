<?php

namespace App\Exception;

use App\Renderable;

/**
 * Class NotFoundException
 * @package App\Exception
 */
class NotFoundException extends HttpException implements Renderable
{
    public function render()
    {
        includeView('errors/404/404.php');
    }
}
