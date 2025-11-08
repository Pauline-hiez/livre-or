<div class="commentaire">
    <div class="commentaire-header">
        <span class="commentaire-author"><?= htmlspecialchars($message['login']); ?></span>
        <span class="commentaire-date"><?= date('d/m/Y à H:i', strtotime($message['date'])); ?></span>
    </div>
    <p class="commentaire-content"><?= nl2br(htmlspecialchars($message['commentaire'])); ?></p>
</div>