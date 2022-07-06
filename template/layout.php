<!doctype html>
<html lang="fr">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="css/layout.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">
        <title><?php echo $config['title'] ?? 'BeerLover'; ?></title>
    </head>
    <body>
        <header>
            <nav>
                <p>
                    BeerLover
                </p>
                <ul>
                    <li><a href="/">Accueil</a></li>
                    <li><a href="/bieres">Liste des bières</a></li>
                    <li><a href="/a-propos">A propos</a></li>
                    <li><a href="#">Connexion</a></li>
                </ul>
            </nav>
        </header>
        <main>
            <h1></h1>
            <?php require $config['path']; ?>
        </main>
    <footer>
        <p class="rights">Tous droits réservés - 2022 BeerLover ©</p>
        <div class="footer-container">
            <div>
                <p>Rejoignez nous sur les réseaux</p>
                <i class="fa-brands fa-instagram"></i>
                <i class="fa-brands fa-facebook"></i>
                <i class="fa-brands fa-youtube"></i>
                <i class="fa-brands fa-linkedin"></i>
            </div>
            <div>
                <p>A propos</p>
                <ul>
                    <li>CGU</li>
                    <li>Confidentialité - Cookies</li>
                    <li>Plan du site</li>
                    <li>Contact</li>
                </ul>
            </div>
            <div>
                <p>Rejoignez notre newsletter</p>
            </div>
        </div>
    </footer>
    </body>
</html>
