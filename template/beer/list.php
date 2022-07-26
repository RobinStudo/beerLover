<h1>Découvrir notre séléction de bière</h1>

<div class="card-container">
    <?php foreach ($data['beers'] as $beer) { ?>
        <a href="<?php echo $this->router->buildLink('beerSingle') . '?id=' . $beer->getId(); ?>" class="card">
            <img src="<?php echo $beer->getPicture(); ?>" alt="<?php echo $beer->getName(); ?>">
            <h3><?php echo $beer->getName(); ?></h3>
            <p><?php echo $beer->getStyle()->getName(); ?></p>
        </a>
    <?php } ?>
</div>
