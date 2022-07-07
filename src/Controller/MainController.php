<?php

namespace App\Controller;

use App\Core\Controller\AbstractController;
use App\Core\ViewManager;
use App\Repository\BreweryRepository;
use App\Repository\StyleRepository;

class MainController extends AbstractController
{
    public function __construct(
        protected ViewManager $view,
        private StyleRepository $styleRepository,
        private BreweryRepository $breweryRepository
    ){
        parent::__construct($this->view);
    }

    public function home(): void
    {
        $styles = $this->styleRepository->findAll();
        $breweries = $this->breweryRepository->findAll();

        $this->view->render('main/home', [
            'title' => 'BeerLover, votre cave à bière numérique',
        ], [
            'styles' => $styles,
            'breweries' => $breweries,
        ]);
    }

    public function about(): void
    {
        $this->view->render('main/about', [
            'title' => 'Faites connaisances avec BeerLover, notre savoir-faire et nos valeurs houblonnées',
        ]);
    }
}
