<?php
// load toutes les classes via autoloader et curl 
require_once __DIR__ . '/vendor/autoload.php';
require_once __DIR__ . '/curl.php';

use \LoginPage;

$loginPage = new LoginPage('http://localhost:3000/login');

$loginPage->render();
?>