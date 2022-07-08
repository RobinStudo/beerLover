<?php

namespace App\Controller;

use App\Core\Controller\AbstractController;

class UserController extends AbstractController
{
    public function register(): void
    {
        $this->view->render('user/register', [
            'title' => 'Rejoignez la communauté des BeerLovers 💖',
        ]);
    }
}
