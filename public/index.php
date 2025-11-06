<?php
// Point d'entrée de l'application

require_once __DIR__ . '/../config/database.php';

// Inclure la page d'accueil
// require_once ROOT . '/view/home/index.php';


require_once __DIR__ . '/../core/router.php';

dispatch();
