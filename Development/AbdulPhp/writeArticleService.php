<?php

session_start();
    require('../JordanPhp/db_credentials.php');
$link = new mysqli($servername, $username, $password, $dbname);  

if($link -> connect_error) {
    die("Connection failed: " . $link->connect_error);
    return false;
}

$userQuery 
$fandomQuery = "SELECT * FROM fandom WHERE  ";

?>