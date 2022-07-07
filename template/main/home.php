<h1>Bienvenue sur BeerLover</h1>

<h2>Découvrez de nouveaux styles de bières</h2>
<?php foreach ($data['styles'] as $style) { ?>
    <div>
        <h3><?php echo $style->getName(); ?></h3>
    </div>
<?php } ?>
