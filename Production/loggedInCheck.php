<?php 
session_start();
$loggedIn = false;
if(isset($SESSION['user'])){
    if($_SESSION['user']==''){
        unset($_SESSION['user']);
        $loggedIn = 'false';
    }
    else{
        $loggedIn = 'true';
    }
}
else{
        $loggedIn = false;
}
?>
