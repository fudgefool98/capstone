<?php 
/* initialize connection */
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "fandom";


$link = mysqli_connect($servername, $username, $password, $dbname);

if (!$link) {
    echo "Error: Unable to connect to MySQL." . PHP_EOL;
    echo "Debugging errno: " . mysqli_connect_errno() . PHP_EOL;
    echo "Debugging error: " . mysqli_connect_error() . PHP_EOL;
    exit;
}
else{
    echo "connected sucessfully!";
}
?>