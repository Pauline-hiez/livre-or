<div class="home-container">

    <section class="hero-section">
        <div class="hero-content">
            <h1>Partagez vos Aventures <br>✈</h1>
            <p class="hero-subtitle">Créez des souvenirs impérissables et découvrez les expériences de nos voyageurs</p>
            <div class="hero-buttons">
                <a href="<?= url('livreor'); ?>" class="btn-primary">Découvrir le Livre d'or</a>
                <?php if (!is_logged_in()): ?>
                    <a href="<?= url('auth/register'); ?>" class="btn-secondary">Rejoindre l'aventure</a>
                <?php endif; ?>
            </div>
        </div>
    </section>

    <section class="features-section">
        <h2>Pourquoi partager vos expériences ?</h2>
        <div class="features-grid">
            <div class="feature-card">
                <div class="feature-icon">✎</div>
                <h3>Racontez votre histoire</h3>
                <p>Partagez vos moments inoubliables et inspirez d'autres voyageurs</p>
            </div>
            <div class="feature-card">
                <div class="feature-icon">𖣓</div>
                <h3>Découvrez le monde</h3>
                <p>Explorez les récits d'aventures aux quatre coins du globe</p>
            </div>
            <div class="feature-card">
                <div class="feature-icon">✉</div>
                <h3>Échangez</h3>
                <p>Rejoignez une communauté de passionnés de voyages</p>
            </div>
        </div>
    </section>

    <section class="cta-section">
        <h2>Prêt à partager votre aventure ?</h2>
        <p>Rejoignez notre communauté et laissez votre empreinte dans notre livre d'or</p>
        <?php if (is_logged_in()): ?>
            <a href="<?= url('livreor'); ?>" class="btn-cta">Écrire mon message</a>
        <?php else: ?>
            <a href="<?= url('auth/register'); ?>" class="btn-cta">Commencer maintenant</a>
        <?php endif; ?>
    </section>
</div>