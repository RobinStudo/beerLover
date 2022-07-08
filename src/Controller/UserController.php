<?php

namespace App\Controller;

use App\Core\Controller\AbstractController;
use App\Core\Validator\Constraint\NotBlank;
use App\Core\Validator\Validator;
use App\Core\ViewManager;

class UserController extends AbstractController
{
    public function __construct(
        protected ViewManager $view,
        private Validator $validator
    ){
        parent::__construct($this->view);
    }

    public function register(): void
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['user'])) {
            $formData = $_POST['user'];

            $errors = $this->validator->validate($formData, [
                'username' => [
                    new NotBlank("Vous devez saisir un nom d'utilisateur"),
                ],
                'email' => [
                    new NotBlank(),
                ],
            ]);

            // Valider la longeur du nom d'utilisateur => 5 > 25
            // Valider le format de l'email
            // Valider la longueur du mot de passe => 8 > 30

            dump($errors);
        }

        $this->view->render('user/register', [
            'title' => 'Rejoignez la communauté des BeerLovers 💖',
        ]);
    }
}
