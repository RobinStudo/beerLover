<?php

namespace App\Controller;

use App\Core\Controller\AbstractController;

class BeerController extends AbstractController
{
    public function list(): void
    {
        $this->view->render('beer/list', [
            'title' => 'Découvrez notre catalogue de breuvages extraordinairement houblonnés',
        ]);
    }
}
