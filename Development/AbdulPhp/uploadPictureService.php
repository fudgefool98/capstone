<?php

//Need to create Image table with following columns 
//    - Int pk: Id
//    - Int authorId
//    - Int articleId
//    - String path

//Store image in server at var/www/html/Development/AbdulPhp/images/filename
//Need to give apache permission to save in server

//connect to DB
 require('../JordanPhp/db_credentials.php');
 $link = new mysqli($servername, $username, $password, $dbname);
    if($link -> connect_error) {
        die("Connection failed: " . $link->connect_error);
        return false;
    }

$fileName = $_FILES['Filename']['name'];

$target = "var/www/html/Development/AbdulPhp/images/";		
$fileTarget = $target.$fileName;	
$tempFileName = $_FILES["Filename"]["tmp_name"];
//$fileDescription = $_POST['Description'];	

$result = move_uploaded_file($tempFileName,$fileTarget);
        
//Create path to save the image 
$path = $fileTarget;

//Query user for userId
$username = $_SESSION['user'];
$userQuery = "SELECT userId FROM User WHERE username = '$username'";
    
$userResult = mysqli_query($link ,$userQuery) or die (mysqli_error($link));
$userId = mysqli_fetch_row($userResult);

//Create Article 
//Create fandom if new is selected, set fandom to selected if not
$fandom = $_POST['fandom'];
        if($fandom == 'newFandom'){
            $title = $_POST['fandomName'];
    
            $createFandomSQL = "INSERT INTO Fandom (title) VALUES ('$title')";
    
            $createFandomResult = mysqli_query($link,$createFandomSQL) or die (mysqli_error($link));
            
            $_SESSION['articleErrorMessage'] = "Created new fandom '$title'";
            $fandom = $title;
        }else{
            //set fandom name to one selected from list of options
            $fandom = $_POST['oldFandom'];
        } 
//image type = 2
$type = 2;
$discription = $_POST['description'];
$title = $_POST['title'];
$content = "";//there will be no content here
$authorId = $userId;
$id;//query the article just created and get the Id.
$lastEdited = date("Y-m-d H:i:s");
    
$insertArticle = "INSERT INTO Article (fandom, type, discription, title, content, authorId, id, lastEdited) VALUES('$fandom', '$type', '$discription', '$title', '$content', '$authorId', '$id', '$lastEdited')";

$email = $_SESSION['name'];
$userQuery = "SELECT userId FROM User WHERE email = '$email'";
    
$userResult = mysqli_query($link ,$insertArticle) or die (mysqli_error($link));

//if article created create image entry in Image table
$insertImage = "INSERT INTO Image (authorId, articleId, path) VALUES('$userId', '$id', '$path')";


?>