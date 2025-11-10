<?php

function home_index()
{
    load_view_with_layout('home/index');
}

// Page profil : modification du mot de passe

function home_profil()
{

    if (!is_logged_in()) {
        set_flash('error', 'Vous devez être connecté pour accéder à votre profil.');
        redirect('auth/login');
    }

    $data = [
        'title' => 'Mon profil',
        'body_class' => 'livreor-page'
    ];
    $user_id = $_SESSION['user_id'];
    $user = get_user_by_id($user_id);
    $data['user'] = $user;

    if (is_post()) {
        $current_password = post('current_password');
        $new_password = post('new_password');
        $confirm_password = post('confirm_password');

        if (empty($current_password) || empty($new_password) || empty($confirm_password)) {
            set_flash('error', 'Tous les champs sont obligatoires.');
        } elseif (!password_verify($current_password, $user['password_hash'])) {
            set_flash('error', 'L’ancien mot de passe est incorrect.');
        } elseif ($new_password !== $confirm_password) {
            set_flash('error', 'Les nouveaux mots de passe ne correspondent pas.');
        } elseif (
            strlen($new_password) < 8 ||
            !preg_match('/[a-z]/', $new_password) ||
            !preg_match('/[A-Z]/', $new_password) ||
            !preg_match('/[0-9]/', $new_password)
        ) {
            set_flash('error', 'Le nouveau mot de passe doit contenir au moins 8 caractères, une majuscule, une minuscule et un chiffre.');
        } else {
            if (update_user_password($user_id, $new_password)) {
                set_flash('success', 'Mot de passe mis à jour avec succès !');
                redirect('home/profil');
            } else {
                set_flash('error', 'Erreur lors de la mise à jour du mot de passe.');
            }
        }
    }

    load_view_with_layout('home/profil', $data);
}
