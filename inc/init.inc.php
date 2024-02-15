<?php

//--------- ERREURS
ini_set('display_errors', 'Off');
ini_set('log_errors', 'On');
ini_set('error_log', 'error.log');

//--------- CONNEXION BDD (mariaDB)
// Database settings
$db="my_db";
$dbhost="localhost";
$dbport=3306;
$dbuser = getenv('DB_USER');
$dbpasswd = getenv('DB_PASS');

try {
    $pdo = new PDO('mysql:host='.$dbhost.';port='.$dbport.';dbname='.$db.'', $dbuser, $dbpasswd);
    $pdo->exec("SET CHARACTER SET utf8");
} catch (PDOException $e) {
    error_log('PDO Error: ' . $e->getMessage());
    echo $dbuser;
    echo $dbpasswd;
    die('Database error');
}

//--------- SESSION
$secure = true; // to use secure connection
$httponly = true; // to prevent access via JavaScript
ini_set('session.cookie_secure', $secure);
ini_set('session.cookie_httponly', $httponly);
ini_set('session.use_only_cookies', 1);
session_start();

//--------- CHEMIN
define("RACINE_SITE","/var/www/html/");

//--------- VARIABLES
$contenu = '';

//--------- AUTRES INCLUSIONS

if (file_exists("inc/functions.inc.php")) {
    require_once("inc/functions.inc.php");
} else {
    die("Error: functions.inc.php not found");
}