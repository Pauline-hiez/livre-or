<?php

// Module de connexion

function auth_login()
{
    // Rediriger si déjà connecté
    if (is_logged_in()) {
        redirect('/home');
    }

    $data = ['title' => 'Connexion'];

    if (is_post()) {
        $login = clean_input(post('login'));
        $password = post('password');

        if (empty($login) || empty($password)) {
            set_flash('error', 'Login et mot de passe obligatoires.');
        } else {
            // Rechercher l'utilisateur
            $user = get_user_by_login($login);

            if ($user && password_verify($password, $user['password_hash'])) {
                // Connexion réussie
                $_SESSION['user_id'] = $user['id'];
                $_SESSION['user_login'] = $user['login'];
                $_SESSION['login_time'] = time();

                $prenom = ucfirst(strtolower($user['login']));
                set_flash('success', 'Connexion réussie, bienvenue ' . htmlspecialchars($prenom) . ' !');
                redirect('/home/profil');
            } else {
                set_flash('error', 'Login ou mot de passe incorrect.');
            }
        }
    }

    load_view_with_layout('auth/login', $data);
}

// Module d'inscription

function auth_register()
{
    if (is_logged_in()) {
        redirect('/home');
    }

    $data = [
        'title' => 'Inscription'
    ];

    if (is_post()) {
        $login = clean_input(post('login'));
        $password = post('password');
        $confirm_password = post('confirm_password');

        // Validation des champs
        if (empty($login) || empty($password) || empty($confirm_password)) {
            set_flash('error', 'Tous les champs sont obligatoires.');
        } elseif (strlen($login) < 3) {
            set_flash('error', 'Le login doit contenir au moins 3 caractères.');
        } elseif (
            strlen($password) < 8 ||
            !preg_match('/[a-z]/', $password) ||
            !preg_match('/[A-Z]/', $password) ||
            !preg_match('/[0-9]/', $password)
        ) {
            set_flash('error', 'Le mot de passe doit contenir au moins 8 caractères, une minuscule, une majuscule et un chiffre.');
        } elseif ($password !== $confirm_password) {
            set_flash('error', 'Les mots de passe ne correspondent pas.');
        } elseif (get_user_by_login($login)) {
            set_flash('error', 'Ce login est déjà utilisé.');
        } else {
            // Hash du mot de passe
            $password_hash = password_hash($password, PASSWORD_DEFAULT);

            // Créer l'utilisateur
            $user_login = create_user($login, $password_hash);

            if ($user_login) {
                set_flash('success', 'Inscription réussie ! Vous pouvez maintenant vous connecter.');
                redirect('/auth/login');
            } else {
                set_flash('error', 'Erreur lors de l\'inscription.');
            }
        }
    }

    load_view_with_layout('auth/register', $data);
}

// Déconnexion

function auth_logout()
{
    logout();
    set_flash('success', 'Vous avez été déconnecté avec succès.');
    redirect('auth/login');
}
