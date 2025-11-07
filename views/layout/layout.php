<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title></title>
    <link rel="stylesheet" href="<?= url('assets/style.css'); ?>">
</head>

<body>
    <header>
        <nav>
            <ul>
                <li><a class="accueil" href="/">Accueil</a></li>
                <li><a href="/auth/register">Inscription</a></li>
                <li><a href="/auth/login">Connexion</a></li>
                <li><a href="/home/profil">Mon profil</a></li>
                <li><a href="/livreor/livre-or">Livre d'or</a></li>
            </ul>
        </nav>
    </header>

    <div class="flash-message">
        <?php display_flash(); ?>
    </div>

    <main class="main-content">
        <?= $content; ?>
    </main>


    <footer>
        <h4 class="text-reseaux">Retrouvez-nous sur les réseaux sociaux :</h4>
        <div class="reseaux">
            <a href="https://github.com/pauline-hiez"><img src="<?= url('assets/icones/github.png'); ?>" alt="GitHub"></a>
            <a href="https://facebook.fr"><img src="<?= url('assets/icones/facebook.png'); ?>" alt="Facebook"></a>
            <a href="https://instagram"><img src="<?= url('assets/icones/instagram.png'); ?>" alt="Instagram"></a>
            <a href="https://x.fr"><img src="<?= url('assets/icones/twitter.png'); ?>" alt="Twitter"></a>
        </div>
        <p class="copyright">© 2025 - Livre d'or - tous droits réservés</p>
    </footer>

</body>

</html>