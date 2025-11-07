<h2><?= htmlspecialchars($title) ?></h2>

<?php if (is_logged_in()): ?>
    <form method="post" action="">
        <textarea name="content" rows="3" placeholder="Écrivez votre message ici..." required></textarea>
        <button type="submit">Poster</button>
    </form>
<?php else: ?>
    <p>Vous devez <a href="/auth/login">vous connecter</a> pour poster un message.</p>
<?php endif; ?>

<h3>Messages</h3>
<div>
    <?php foreach ($messages as $message): ?>
        <?php include 'commentaire.php'; ?>
    <?php endforeach; ?>
</div>