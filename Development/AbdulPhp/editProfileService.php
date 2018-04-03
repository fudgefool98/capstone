<?php
//04/1/18: No errors. Full update works but not inserting any values that are entered on the front end.
//After update all columns in row are nullified. Throwing mysqli_query() error
session_start();
//account settings
//test the post directly vs creating variables.

//pull username in session to query by
$usr = $_SESSION['name'];

//connect to database
$servername = "localhost";
$usrname = "root";
$passwordDB = "";
$dbname = "fandom";
$link = new mysqli($servername, $usrname, $passwordDB, $dbname);

if($link -> connect_error) {
    die("Connection failed: " . $link->connect_error);
    return false;
}
//pull all data from user already in DB then if changed upsert to db again with new and current info not changed
$query = "SELECT * FROM User WHERE email= '$usr'";

$result = mysqli_query($link, $query) or die (mysqli_error());
$row = mysqli_fetch_row($result);

$email = null;
$username = "";
$firstName = "";
$lastName = "";
$about = "";
$password = "";
$twitter = "";
$facebook = "";
$tumblr = "";
$instagram = "";
$snapchat = "";

//set variables to values in DB unless changed on front end then change values and upsert everything
//change logic
//$i = 0;

//if(!empty($_POST['fname'])){
//    $_SESSION['firstName'] = "I made it to the switch in fname: fname is emtpy " + .$_POST['firstName'].;
//    echo "{$_SESSION['firstName']}";
//}
//
if(empty($_POST['email'])){
    $email = $row[1];
}else{
    $email = $_POST['email'];
}
if(empty($_POST['username'])){
    $username = $row[14];
}else{
    $username = $_POST['username'];
}
if(empty($_POST['fname'])){
    $firstName = $row[2];
}else{
    $firstName = $_POST['fname'];
}
if(empty($_POST['lname'])){
    $lastName = $row[3];
}else{
    $lastName = $_POST['lname'];
}
//TODO: password hash is being nullified fix it!!!!!!!!!!!!
if(empty($_POST['password'])){
    $password = row[5];
}else{
    $password = password_hash($password, PASSWORD_DEFAULT);
}
if(empty($_POST['about'])){
    $about = $row[6];
}else{
    $about = $_POST['about'];
}
if(empty($_POST['twitter'])){
    $twitter = $row[7];
}else{
    $twitter = $_POST['twitter'];
}
if(empty($_POST['facebook'])){
    $facebook = $row[8];
}else{
    $facebook = $_POST['facebook'];
}
if(empty($_POST['tumblr'])){
    $tumblr = $row[9];
}else{
    $tumblr = $_POST['tumblr'];
}
if(empty($_POST['instagram'])){
    $instagram = $row[10];
}else{
    $instagram = $_POST['instagram'];
}
if(empty($_POST['snapchat'])){
    $snapchat = $row[11];
}else{
    $snapchat = $_POST['snapchat'];
}

        
//switch(true){
//    case empty($_POST['username']):
//        $username = $row[1];
//        break;
//    case empty($_POST['fname']):
//        //not hitting this point
//        $firstName = $row[2];
//        break;
//    case empty($_POST['lname']):
//        $_SESSION['firstName'] = "I made it to the switch in fname: fname is emtpy";
//        $lastName = $row[3];
//        break;
//    case isset($_POST['password']):
//            //need to test if confirm password is the same on front end
//        $password = password_hash($password, $PASSWORD_DEFAULT);
//        break;
//    case empty($_POST['password']):
//        $password = $row[5];
//        break;
//    case empty($_POST['twitter']):
//        $twitter = $row[7];
//        break;
//    case empty($_POST['facebook']):
//        $facebook = $row[8];
//        break;
//    case empty($_POST['tumblr']):
//        $tumblr = $row[9];
//        break;
//    case empty($_POST['instagram']):
//        $instagram = $row[10];
//        break;
//    case empty($_POST['snapchat']):
//        $snapchat = $row[11];
//        break;
//        
//}
//set remaining values to be updated so we can update the whole table at once.
$userId = $row[0];

$updateQuery = "UPDATE User 
                SET email = '".$email."', firstName = '".$firstName."', lastName = '".$lastName."', passwordHash = '".$password."', twitter = '".$twitter."', facebook = '".$facebook."', tumblr = '".$tumblr."', instagram = '".$instagram."', snapchat = '".$snapchat."', username = '".$username."' 
                WHERE userId = '".$row[0]."' ";

if (mysqli_query($link, $updateQuery)) {
    $_SESSION["errorMessage"] = "We successfully updated your user '$firstName' UserId = '$row[0]'";//this is the error being thrown
} else {
    $_SESSION["errorMessage"] = "Error updating record: " . mysqli_error($link);
}

mysqli_close($link);

header('Location: ../../CapstoneProject/editProfile.php');
?>