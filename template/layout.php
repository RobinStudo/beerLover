<!doctype html>
<html lang="fr">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="assets/css/main.css" rel="stylesheet" />
        <title><?php echo $config['title'] ?? 'BeerLover'; ?></title>
    </head>
    <body>
        <header>
            <a href="#">
                <img src="assets/img/logo.png" alt="Logo de Beer Lover, votre référence houblonnée !"/>
            </a>
            <div>
                <a href="#">Se connecter</a>
                <nav>
                    <ul>
                        <li><a href="#">Accueil</a></li>
                        <li><a href="#">Nos bières</a></li>
                        <li><a href="#">À propos</a></li>
                        <li><a href="#">Contact</a></li>
                    </ul>
                </nav>
            </div>
        </header>

        <main>
            <?php require $config['path']; ?>
        </main>

        <footer>
            <div><ul>
                    <li><a href="#">Accueil</a></li>
                    <li><a href="#">Nos bières</a></li>
                    <li><a href="#">À propos</a></li>
                    <li><a href="#">Contact</a></li>
                </ul>
                <div>
                    <p>
                        BeerLover<br>
                        15 rue du pont<br>
                        59000 Lille
                    </p>
                </div>
                <div class="social">
                    <a href="#">
                        <img src="assets/img/icons/instagram.png" alt="Logo Instagram">
                    </a>
                    <a href="#">
                        <img src="assets/img/icons/twitter.png" alt="Logo Twitter">
                    </a>
                    <a href="#">
                        <img src="assets/img/icons/facebook.png" alt="Logo Facebook">
                    </a>
                </div>
            </div>
            <p>
                BeerLover, votre cave à bières numérique - © <?php echo date("Y")?>
                <a href="#">
                    Politique de confidentialité
                </a>
            </p>
        </footer>
    </body>
</html>
