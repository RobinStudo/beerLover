<h1>Bienvenue sur BeerLover</h1>

<h2>Découvrez de nouveaux styles de bières</h2>
<div class="card-container">
    <?php foreach ($data['styles'] as $style) { ?>
        <div class="card">
            <h3><?php echo $style->getName(); ?></h3>
        </div>
    <?php } ?>
</div>


<h2>Découvrez de nouvelles brasseries</h2>
<div class="card-container">
    <?php foreach ($data['breweries'] as $brewery) { ?>
        <div class="card">
            <h3><?php echo $brewery->getName(); ?></h3>
        </div>
    <?php } ?>
</div>
