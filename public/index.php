<?php

session_start();

// Point d'entrée de l'application

require_once __DIR__ . '/../config/database.php';
require_once __DIR__ . '/../core/database.php';

// Inclure la page d'accueil
// require_once ROOT . '/view/home/index.php';

require_once __DIR__ . '/../core/view.php';

require_once __DIR__ . '/../core/router.php';
require_once __DIR__ . '/../includes/helpers.php';
require_once __DIR__ . '/../model/auth_model.php';
require_once __DIR__ . '/../model/home_model.php';
require_once __DIR__ . '/../model/livreor_model.php';

dispatch();
