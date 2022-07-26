<?php

namespace App\Controller;

use App\Core\Controller\AbstractController;
use App\Core\Notification\Notification;
use App\Core\Notification\NotificationManager;
use App\Core\Router\Router;
use App\Core\Validator\Validator;
use App\Core\ViewManager;
use App\Entity\User;
use App\Repository\UserRepository;
use App\Service\MailerService;
use App\Service\UserService;

class UserController extends AbstractController
{
    public function __construct(
        protected ViewManager $view,
        private Validator $validator,
        private Router $router,
        private MailerService $mailerService,
        private NotificationManager $notificationManager,
        private UserRepository $userRepository,
        private UserService $userService
    ){
        parent::__construct($this->view);
    }

    public function register(): void
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['user'])) {
            $formData = $_POST['user'];

            $errors = $this->validator->validate($formData, User::registerValidationRules());

            if (count($errors) === 0) {
                $formData['hashedPassword'] = password_hash($formData['password'], PASSWORD_DEFAULT);
                $this->userRepository->insert($formData);

                $notification = new Notification('Compte créé avec succès', Notification::TYPE_SUCCESS);
                $this->notificationManager->add($notification);

                $this->mailerService->sendRegistrationConfirmation($formData);

                $this->router->redirect('userLogin');
            }
        }

        $this->view->render('user/register', [
            'title' => 'Rejoignez la communauté des BeerLovers 💖',
        ], [
            'formErrors' => $errors ?? [],
            'formData' => $formData ?? [],
        ]);
    }

    public function login(): void
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['user'])) {
            $formData = $_POST['user'];

            if($this->userService->authenticate($formData)){
                $notification = new Notification('Connexion réussie', Notification::TYPE_SUCCESS);
                $this->notificationManager->add($notification);

                $this->router->redirect('mainHome');
            }

            $notification = new Notification('Identifiants invalides', Notification::TYPE_ERROR);
            $this->notificationManager->add($notification);
        }

        $this->view->render('user/login', [
            'title' => 'Connectez-vous - BeerLover',
        ], [
            'formData' => $formData ?? [],
        ]);
    }
}
