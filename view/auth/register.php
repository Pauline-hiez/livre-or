<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inscription</title>
    <link rel="stylesheet" href="assets/style.css">
</head>

<body>

    <?php require_once __DIR__ . "/../layout/layout.php"; ?>

    <main class="main-content">
        <div class="auth-container">
            <h2>Inscription</h2>

            <?php if (isset($_SESSION['flash'])): ?>
                <div class="alert alert-<?= $_SESSION['flash']['type'] ?>">
                    <?= $_SESSION['flash']['message'] ?>
                </div>
                <?php unset($_SESSION['flash']); ?>
            <?php endif; ?>

            <form method="post" action="">
                <div class="form-group">
                    <label for="login">Login :</label>
                    <input type="text" id="login" name="login" required placeholder="Choisissez un login">
                </div>

                <div class="form-group">
                    <label for="password">Mot de passe :</label>
                    <input type="password" id="password" name="password" required placeholder="Créez un mot de passe">
                </div>

                <div class="form-group">
                    <label for="confirm_password">Confirmez le mot de passe :</label>
                    <input type="password" id="confirm_password" name="confirm_password" required placeholder="Confirmez le mot de passe">
                </div>

                <button type="submit" class="btn">S'inscrire</button>

                <p class="switch-link">
                    Déjà un compte ? <a href="?page=auth/login">Se connecter</a>
                </p>
            </form>
        </div>
    </main>

</body>

</html>