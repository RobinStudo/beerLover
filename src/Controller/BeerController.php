<?php

namespace App\Controller;

use App\Core\Controller\AbstractController;
use App\Core\ViewManager;
use App\Repository\BeerRepository;

class BeerController extends AbstractController
{
    public function __construct(
        protected ViewManager $view,
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
}
