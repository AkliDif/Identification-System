<?php
//--------- CONNEXION BDD (mariaDB)
// Database settings
$db="my_db";
$dbhost="localhost";
$dbport=3306;
$dbuser="akli";
$dbpasswd="06101955";

$pdo = new PDO('mysql:host='.$dbhost.';port='.$dbport.';dbname='.$db.'', $dbuser, $dbpasswd);
$pdo->exec("SET CHARACTER SET utf8");

// die the connection if it fails
if(!$pdo) {
    die('Error: ' . $pdo->errorInfo());
}
 
//--------- SESSION
session_start();
 
//--------- CHEMIN
define("RACINE_SITE","/var/www/html/");
 
//--------- VARIABLES
$contenu = '';
 
//--------- AUTRES INCLUSIONS
require_once("functions.inc.php");