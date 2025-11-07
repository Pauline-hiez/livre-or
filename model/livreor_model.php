<?php

// Récupère les messages
function get_all_messages()
{
    $query = "SELECT m.*, u.login FROM messages m
    JOIN utilisateurs u ON m.user_id = u.id";

    return db_select($query);
}

// Ajoute un message
function add_message($user_id, $content)
{
    $query = "INSERT INTO messages (user_id, content) VALUES (?, ?)";
    return db_execute($query, [$user_id, $content]);
}
