<?php

//Need to create Image table with following columns 
//    - Int pk: Id
//    - Int userId
//    - Int articleId
//    - String path

//Store image in server at var/www/html/Development/AbdulPhp/images/filename
//Need to give apache permission to save in server

$fileName = $_FILES['Filename']['name'];

$target = "var/www/html/Development/AbdulPhp/images/";		
$fileTarget = $target.$fileName;	
$tempFileName = $_FILES["Filename"]["tmp_name"];
//$fileDescription = $_POST['Description'];	
$result = move_uploaded_file($tempFileName,$fileTarget);
        
//Create path to save the image 
$path = $fileTarget;

//Query user for userId
$userId = 

//Create Article 
$fandom = 
$type = 
$discription = 
$title = 
$content = 
$authorId
$id =
$lastEdited =
    
$insertArticle = "Insert Into Article (fandom, type, discription, title, content, authorId, id, lastEdited) VALUES('$fandom', '$type', '$discription', '$title', '$content', '$authorId', '$id', '$lastEdited')";

//if article created create image entry in Image table

?>