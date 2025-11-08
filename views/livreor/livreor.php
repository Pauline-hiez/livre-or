<div class="livreor-container">
    <h2><?= htmlspecialchars($title) ?></h2>

    <?php if (is_logged_in()): ?>
        <form method="post" action="" class="livreor-form">
            <textarea name="content" rows="5" placeholder="Partagez vos impressions, vos souvenirs..." required></textarea>
            <button type="submit">Publier mon message</button>
        </form>
    <?php else: ?>
        <div class="livreor-form">
            <p>Vous devez <a href="<?= url('auth/login'); ?>">vous connecter</a> pour poster un message.</p>
        </div>
    <?php endif; ?>

    <h3>Messages (<?= count($messages); ?>)</h3>
    
    <?php if (empty($messages)): ?>
        <div class="no-messages">
            <p>Aucun message pour le moment. Soyez le premier à écrire ! ✍️</p>
        </div>
    <?php else: ?>
        <div class="messages-list">
            <?php foreach ($messages as $message): ?>
                <?php include 'commentaire.php'; ?>
            <?php endforeach; ?>
        </div>
    <?php endif; ?>
</div>