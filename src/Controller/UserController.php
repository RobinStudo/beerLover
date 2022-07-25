<?php

namespace App\Controller;

use App\Core\Controller\AbstractController;
use App\Core\Notification\Notification;
use App\Core\Notification\NotificationManager;
use App\Core\Validator\Constraint;
use App\Core\Validator\Validator;
use App\Core\ViewManager;
use App\Repository\UserRepository;
use App\Service\MailerService;

class UserController extends AbstractController
{
    public function __construct(
        protected ViewManager $view,
        private Validator $validator,
        private MailerService $mailerService,
        private NotificationManager $notificationManager,
        private UserRepository $userRepository
    ){
        parent::__construct($this->view);
    }

    public function register(): void
    {
        $this->mailerService->send('coucou@gmail.com', 'Création de votre compte BeerLover', 'register');


        if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['user'])) {
            $formData = $_POST['user'];

            $errors = $this->validator->validate($formData, [
                'username' => [
                    new Constraint\NotBlank("Vous devez saisir un nom d'utilisateur"),
                    new Constraint\Length("Votre nom d'utilisateur doit contenir entre 5 et 25 caractères", 5, 25),
                ],
                'email' => [
                    new Constraint\NotBlank("Vous devez saisir un e-mail"),
                    new Constraint\Email(),
                ],
                'password' => [
                    new Constraint\NotBlank("Vous devez saisir un mot de passe"),
                    new Constraint\Length("Votre mot de passe doit contenir entre 8 et 30 caractères", 8, 30),
                ],
                'age' => [
                    new Constraint\NotBlank("Vous devez être majeur pour créer un compte"),
                ],
                'cgu' => [
                    new Constraint\NotBlank("Vous devez accepter les conditions du service"),
                ],
            ]);

            if (count($errors) === 0) {
                $formData['hashedPassword'] = password_hash($formData['password'], PASSWORD_DEFAULT);
                $this->userRepository->insert($formData);

                $notification = new Notification('Compte créé avec succès', Notification::TYPE_SUCCESS);
                $this->notificationManager->add($notification);

                $this->mailerService->send($formData['email'], 'Création de votre compte BeerLover', 'register');
            }


            // Rediriger sur la page de connexion
        }

        $this->view->render('user/register', [
            'title' => 'Rejoignez la communauté des BeerLovers 💖',
        ], [
            'formErrors' => $errors ?? [],
            'formData' => $formData ?? [],
        ]);
    }
}
