<?php

// Récupère un utilisateur par son Login

function get_user_by_login($login)
{
    $query = "SELECT * FROM utilisateurs WHERE login = ? LIMIT 1";
    return db_select_one($query, [$login]);
}

// Créer un nouvel utilisateur

function create_user($login, $password_hash)
{
    $query = "INSERT INTO utilisateurs (login, password_hash) VALUES (?, ?)";
    if (db_execute($query, [$login, $password_hash])) {
        return db_last_insert_id();
    }
    return false;
}

// Met à jour un utilisateur

function update_user($id, $login)
{
    $login = trim($login);
    $query = "UPDATE utilisateurs SET login = ? WHERE id = ?";
    return db_execute($query, [$login, $id]);
}

// Met à jour le mot de passe de l'utilisateur

function update_user_password($id, $password)
{
    $hashed_password = password_hash($password, PASSWORD_DEFAULT);
    $query = "UPDATE utilisateurs SET password = ? WHERE id = ?";
    return db_execute($query, [$hashed_password, $id]);
}
