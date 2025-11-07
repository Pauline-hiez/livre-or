<?php

// Page Profil

function get_user_by_id($id)
{

    $query = "SELECT * FROM utilisateurs WHERE id = ? LIMIT 1";
    return db_select_one($query, [$id]);
}
