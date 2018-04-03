<?php 
require 'db_credentials.php';
session_start();

//<THIS IS RELATED TO THE BIRTHDAY FIELD AND AN ERROR CHECK TO ENSURE AGE>13;>
date_default_timezone_set('UTC');

function ageCalculator($dob){
    if(!empty($dob)){
        $birthdate = new DateTime($dob);
        $today   = new DateTime('today');
        $age = $birthdate->diff($today)->y;
        if($age>13){
            return 1;
        }
        else{
            return 0;
        }
    }
    else{
        return 0;
    }
}

$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 

$firstName = $conn->real_escape_string($_POST['firstName']);
$lastName = $conn->real_escape_string($_POST['lastName']);
$username = $conn->real_escape_string($_POST['username']);
$email = $conn->real_escape_string($_POST['email']);
$birthday = $conn->real_escape_string($_POST['birthday']);
$password = $conn->real_escape_string($_POST['password']);
$passwordConfirmation = $conn->real_escape_string($_POST['passwordConfirmation']);



//check if all inputs full
if($firstName == '' || $lastName == '' || $email == '' || $password == '' || $passwordConfirmation == ''){
    unset($_SESSION["message"]);
    $_SESSION["message"] = "You must fill all inputs to continue";
    header('Location: signupPage.php');
    exit; 
}
// check if older than 13
if(new DateTime($birthday)> new DateTime('now')){
    unset($_SESSION["message"]);
        $_SESSION["message"] = "You must be 13 years of age or older to sign up";
    header('Location: signupPage.php');
    exit; 
}
// ^^ 13 years of age or older

// display this error first, i don't care if their passwords don't match they're too young to use the site;
    if (ageCalculator($birthday)==1){
        //if its true do nothing 
    }
    else{
        //if its false set message string
        unset($_SESSION["message"]);
        $_SESSION["message"] = "You must be 13 years of age or older to sign up";
    }
    if($password == $passwordConfirmation){
        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
    }
    else{
        unset($_SESSION["message"]);
        $_SESSION["message"] = "Your password's do not match each other";
    }
    

if (!isset($_SESSION['message'])){
$sql = "INSERT INTO User (firstName, lastName, email, birthday, passwordHash) VALUES('$firstName', '$lastName', '$email', '$birthday','$hashedPassword')";
}
else{
    header('Location: signupPage.php');
    exit;   
}
if(!username || /*creat a function that query's user table if username matches a row in db return true (it will put us in this block*/){
    unset($_SESSION["message"]);
        $_SESSION["message"] = "Your username exists pick another unique username";
    header('Location: signupPage.php');
    exit; 
}
if ($conn->query($sql) === TRUE) {
    //I WANT TO SET 'user' TO THE ID NOT THE EMAIL HOW??? ANOTHER QUERY? HOW DO I ENSURE UNIQUENESS???
     $_SESSION['user'] = $email;
     header('Location: signupPage.php');
     //^^ WILL SEND TO HOME PAGE WITH USER LOGGED IN
     exit; 
} 
else {
    print "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();

?>