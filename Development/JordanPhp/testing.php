<?php
require 'db_credentials.php';
session_start();

$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 
$user = $conn->real_escape_string($_POST['username']);
echo $user;
function usernameIsUniqueCheck($conn,$user){
    $userSql = "Select username from User where username = '$user'";
    $userResult = $conn->query($userSql);
    print_r($userResult);
    if($userResult){
        //if query worked       
        $row = $userResult->fetch_row();
        if( $row === NULL){
            $userResult->free_result();
            return true;
                    //if userSql has no results return true
            // use this http://php.net/manual/en/mysqli-result.lengths.php
            // we have a result object we need to check that the result has no rows returned from the db. then return true.
        }
        else{
            //else return false
            $userResult->free_result();
            return false;
        }
    }
    else{
        return false;
    }
}
$r = usernameIsUniqueCheck($conn,$user);
echo "\n1".$r."\n";
if(!usernameIsUniqueCheck($conn,$user)){
    //$_SESSION["message"] = "Your username exists pick another unique username";
    //header('Location: testform.php');
    //exit; 
}
?>