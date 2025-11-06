<?php

// Fonctions utilitaires globales

/**
 * Nettoie une entrée utilisateur
 */
function clean_input($data)
{
    return htmlspecialchars(trim($data), ENT_QUOTES, 'UTF-8');
}

/**
 * Vérifie si la requête est de type POST
 */
function is_post()
{
    return $_SERVER['REQUEST_METHOD'] === 'POST';
}

/**
 * Récupère une variable POST en toute sécurité
 */
function post($key, $default = null)
{
    return $_POST[$key] ?? $default;
}

/**
 * Redirige vers une autre page
 */
function redirect($url)
{
    header("Location: index.php?page=$url");
    exit;
}

/**
 * Vérifie si un utilisateur est connecté
 */
function is_logged_in()
{
    return isset($_SESSION['user_id']);
}

/**
 * Déconnecte l'utilisateur
 */
function logout()
{
    session_unset();
    session_destroy();
}

/**
 * Définit un message flash (succès, erreur, info)
 */
function set_flash($type, $message)
{
    $_SESSION['flash'][$type] = $message;
}

/**
 * Affiche et supprime le message flash
 */
function display_flash()
{
    if (!empty($_SESSION['flash'])) {
        foreach ($_SESSION['flash'] as $type => $message) {
            $class = ($type === 'error') ? 'alert-danger' : (($type === 'success') ? 'alert-success' : 'alert-info');
            echo "<div class='alert $class'>" . htmlspecialchars($message) . "</div>";
        }
        unset($_SESSION['flash']);
    }
}

/**
 * Charge une vue avec un layout
 */
function load_view_with_layout($view, $data = [])
{
    extract($data);
    include "views/$view.php";
    include 'views/layout/footer.php';
}

/**
 * Vérifie un mot de passe (hashé)
 */
function verify_password($password, $hash)
{
    return password_verify($password, $hash);
}

/**
 * Retourne l’ID de l’utilisateur connecté
 */
function current_user_id()
{
    return $_SESSION['user_id'] ?? null;
}

/**
 * Retourne le login de l’utilisateur connecté
 */
function current_user_login()
{
    return $_SESSION['user_login'] ?? null;
}

/**
 * Empêche l’accès si non connecté
 */
function require_login()
{
    if (!is_logged_in()) {
        set_flash('error', 'Veuillez vous connecter pour accéder à cette page.');
        redirect('auth/login');
    }
}
