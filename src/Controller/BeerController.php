<?php

namespace App\Controller;

use App\Core\Controller\AbstractController;
use App\Core\ViewManager;
use App\Entity\Beer;
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

    public function single(): void
    {
        $id = !empty($_GET['id']) ? $_GET['id'] : 0;
        $beer = $this->beerRepository->find($id);

        if(!$beer instanceof Beer){
            http_response_code(404);
            return;
        }

        $this->view->render('beer/single', [
            'title' => sprintf('%s - BeerLover', $beer->getName()),
        ], [
            'beer' => $beer
        ]);
    }
}
