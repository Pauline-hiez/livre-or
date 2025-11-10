<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title></title>
    <link rel="stylesheet" href="<?= url('assets/style.css'); ?>">
    <link href="https://fonts.googleapis.com/css2?family=Fascinate+Inline&family=Gabriela&family=Imperial+Script&family=League+Script&family=Mea+Culpa&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Story+Script&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Fascinate+Inline&family=Gabriela&family=Imperial+Script&family=League+Script&family=Mea+Culpa&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Roboto:ital,wght@0,100..900;1,100..900&family=Story+Script&display=swap" rel="stylesheet">
</head>

<body class="<?= isset($body_class) ? htmlspecialchars($body_class) : ''; ?>">
    <header>
        <nav>
            <ul class="nav-menu">
                <li><a class="accueil" href="<?= url(); ?>">Accueil</a></li>
                <li><a href="<?= url('livreor'); ?>">Livre d'or</a></li>

                <?php if (is_logged_in()): ?>
                    <li><a href="<?= url('home/profil'); ?>">Mon profil</a></li>
                    <li><a href="<?= url('auth/logout'); ?>">Déconnexion</a></li>
                <?php else: ?>
                    <li><a href="<?= url('auth/register'); ?>">Inscription</a></li>
                    <li><a href="<?= url('auth/login'); ?>">Connexion</a></li>
                <?php endif; ?>

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