<?php

namespace App\Core\Controller;

use App\Core\ViewManager;

// Les contrôleurs gères la logique de chaque route
// Cette classe permet de rendre commune certaines fonctionnalités
abstract class AbstractController
{
    public function __construct(protected ViewManager $view){}
}
