<?php
// load toutes les classes via autoloader
require_once __DIR__ . '/vendor/autoload.php';

use MyApp\LoginPage;

$loginPage = new LoginPage('http://localhost:3000/login');

$loginPage->render();
?>