<?php

namespace App\Core\Controller;

use App\Core\ViewManager;

abstract class AbstractController
{
    public function __construct(protected ViewManager $view){}
}
