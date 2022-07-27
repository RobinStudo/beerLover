<h1><?php echo $data['beer']->getName(); ?></h1>

<div class="card">
    <img src="<?php echo $data['beer']->getPicture(); ?>" alt="<?php echo $data['beer']->getName(); ?>">
    <p><?php echo $data['beer']->getStyle()->getName(); ?></p>
    <a href="<?php echo $this->router->buildLink('beerToggleFavorite') . '?id=' . $data['beer']->getId(); ?>">
        <?php if($data['currentUserHasFavorite']) { ?>
            Retirer des favoris
        <?php } else { ?>
            Ajouter aux favoris
        <?php } ?>
    </a>
</div>
