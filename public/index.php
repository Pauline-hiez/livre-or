<?php
// Point d'entrée de l'application

// Définir la racine du projet
define('ROOT', dirname(__DIR__));

// Inclure la page d'accueil
require_once ROOT . '/view/home/index.php';
