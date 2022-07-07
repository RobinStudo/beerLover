<?php

namespace App\Controller;

use App\Core\Controller\AbstractController;

class MainController extends AbstractController
{
    public function home(): void
    {
        $this->view->render('main/home', [
            'title' => 'BeerLover, votre cave à bière numérique',
        ]);
    }

    public function about(): void
    {
        $this->view->render('main/about', [
            'title' => 'Faites connaisances avec BeerLover, notre savoir-faire et nos valeurs houblonnées',
        ]);
    }
}
