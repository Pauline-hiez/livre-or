<div class="main-content">

    <div class="auth-container">
        <h2>Mon profil</h2>



        <section class="profil-info">
            <h3>Informations personnelles</h3>
            <p><strong>Login :</strong> <?= htmlspecialchars($user['login']); ?></p>
        </section>

        <section class="profil-password">
            <h3>Modifier mon mot de passe</h3>
            <form action="<?= url('home-update-password'); ?>" method="post">
                <div class="form-group">
                    <label for="current_password">Mot de passe actuel :</label>
                    <input type="password" id="current_password" name="current_password" required placeholder="Entrez votre mot de passe actuel">
                </div>

                <div class="form-group">
                    <label for="new_password">Nouveau mot de passe :</label>
                    <input type="password" id="new_password" name="new_password" required placeholder="Entrez votre nouveau mot de passe">
                </div>

                <div class="form-group">
                    <label for="confirm_password">Confirmez le mot de passe :</label>
                    <input type="password" id="confirm_password" name="confirm_password" required placeholder="Confirmez le nouveau mot de passe">
                </div>

                <button type="submit" class="btn">Modifier le mot de passe</button>
            </form>
        </section>

    </div>
</div>