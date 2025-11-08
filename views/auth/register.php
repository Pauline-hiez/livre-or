<div class="auth-split-container">
    <div class="auth-form-side">
        <div class="auth-container">
            <h2>Inscription</h2>

            <form method="post" action="">
                <div class="form-group">
                    <label for="login">Login :</label>
                    <input type="text" id="login" name="login" required placeholder="Choisissez un login">
                </div>

                <div class="form-group">
                    <label for="password">Mot de passe :</label>
                    <p>*8 caractères, 1 minuscule, 1 majuscule, 1 chiffre</p>
                    <input type="password" id="password" name="password" required placeholder="Créez votre mot de passe">
                </div>

                <div class="form-group">
                    <label for="confirm_password">Confirmez le mot de passe :</label>
                    <input type="password" id="confirm_password" name="confirm_password" required placeholder="Confirmez le mot de passe">
                </div>

                <button type="submit" class="btn">S'inscrire</button>

                <p class="switch-link">
                    Déjà un compte ? <a href="<?= url('auth/login'); ?>">Se connecter</a>
                </p>
            </form>
        </div>
    </div>

    <div class="auth-image-side"></div>
</div>