<?php
define('PUBLICROOT', dirname(__FILE__)); // Chemin vers le dossier contenant index.php (public)
define('ROOT', dirname(PUBLICROOT)); // Chemin vers le dossier parent du dossier contenant index.php
define('DS', DIRECTORY_SEPARATOR); // Raccourci vers le séparateur de dossier
define('APP', ROOT.DS.'app'); // Chemin vers le dossier app (app)
define('BASE_URL', 'http://'.$_SERVER['HTTP_HOST']); // URL du site
require APP.DS.'Includer.php';
new Dispatcher();