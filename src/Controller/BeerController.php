<?php

namespace App\Controller;

use App\Core\Controller\AbstractController;
use App\Core\Notification\Notification;
use App\Core\Notification\NotificationManager;
use App\Core\Router\Router;
use App\Core\ViewManager;
use App\Entity\Beer;
use App\Repository\BeerRepository;
use App\Repository\UserRepository;
use App\Service\UserService;

class BeerController extends AbstractController
{
    public function __construct(
        protected ViewManager $view,
        private NotificationManager $notificationManager,
        private Router $router,
        private UserRepository $userRepository,
        private UserService $userService,
        private BeerRepository $beerRepository
    ){
        parent::__construct($this->view);
    }

    public function list(): void
    {
        $beers = $this->beerRepository->findAll();

        $this->view->render('beer/list', [
            'title' => 'Découvrez notre catalogue de breuvages extraordinairement houblonnés',
        ], [
            'beers' => $beers
        ]);
    }

    public function single(): void
    {
        $id = !empty($_GET['id']) ? $_GET['id'] : 0;
        $beer = $this->beerRepository->find($id);

        if(!$beer instanceof Beer){
            http_response_code(404);
            return;
        }

        $userId = $this->userService->getAuthenticatedUserId();
        if($userId){
            $currentUserHasFavorite = $this->userRepository->hasFavorite($userId, $beer->getId());
        }else{
            $currentUserHasFavorite = false;
        }

        $this->view->render('beer/single', [
            'title' => sprintf('%s - BeerLover', $beer->getName()),
        ], [
            'beer' => $beer,
            'currentUserHasFavorite' => $currentUserHasFavorite,
        ]);
    }

    public function toggleFavorite(): void
    {
        if(!$this->userService->isAuthenticated()){
            $this->router->redirect('userLogin');
        }

        $userId = $this->userService->getAuthenticatedUserId();
        $beerId = $_GET['id'] ?? 0;

        if($this->userRepository->hasFavorite($userId, $beerId)){
            $this->userRepository->removeFavorite($userId, $beerId);
            $notification = new Notification('Bière retiré des favoris', Notification::TYPE_SUCCESS);
        }else{
            $this->userRepository->addFavorite($userId, $beerId);
            $notification = new Notification('Bière ajouté aux favoris', Notification::TYPE_SUCCESS);
        }

        $this->notificationManager->add($notification);
        $this->router->redirect('beerList');
    }
}
