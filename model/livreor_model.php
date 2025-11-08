<?php

// Récupère les messages
function get_all_messages()
{
    $query = "SELECT c.*, u.login FROM commentaires c
    JOIN utilisateurs u ON c.id_utilisateur = u.id
    ORDER BY c.date DESC";

    return db_select($query);
}

// Ajoute un message
function add_message($user_id, $content)
{
    $query = "INSERT INTO commentaires (id_utilisateur, commentaire, date) VALUES (?, ?, NOW())";
    return db_execute($query, [$user_id, $content]);
}
