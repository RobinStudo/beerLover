<?php

namespace App\Controller;

use App\Core\Controller\AbstractController;

class UserController extends AbstractController
{
    public function register(): void
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['user'])) {
            $formData = $_POST['user'];

            $errors = [];
            if (!filter_var($formData['email'], FILTER_VALIDATE_EMAIL)) {
                $errors[] = 'Vous devez saisir une addresse e-mail valide.';
            }
        }

        $this->view->render('user/register', [
            'title' => 'Rejoignez la communauté des BeerLovers 💖',
        ]);
    }
}
