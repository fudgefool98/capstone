<?php
    
session_start();
//function postArticle(){
    require('../JordanPhp/db_credentials.php');
    $link = new mysqli($servername, $username, $password, $dbname);
    if($link -> connect_error) {
        die("Connection failed: " . $link->connect_error);
        return false;
    }
    $email = $_SESSION['name'];
    $userQuery = "SELECT userId FROM User WHERE email = '$email'";
    
    $userResult = mysqli_query($link ,$userQuery) or die (mysqli_error($link));
  
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
    $type = 1;
    $title = $_POST['title'];
    $content = $_POST['article'];
    if($userResult) {
        $authorId = mysqli_fetch_row($userResult);
    }else{
        $_SESSION['articleErrorMessage'] = "There was an issue with the userId ln: 58 writeArticleService";
        return 1;
    }
    $description = "Written article";
    $lastEdited = date("Y-m-d H:i:s");
    
    $link = new mysqli($servername, $username, $password, $dbname);  
    //$id = 12;

      $insertArticleSql = "INSERT INTO Article (fandom, type, discription, title, content, authorID, lastEdited) VALUES('$fandom', '$type', '$description', '$title', '$content', '$authorId', '$lastEdited')";
    
      if($link->query($insertArticleSql) === TRUE){
          //SUCCESS
      }
    
      mysqli_close($link);
    
    header('Location: writeArticle.php');
//}

//function createFandom(){
//if new fandom is selected create fandom THEN create the article in the db

    //pull fandom name and create the fandom
    
//    
//    return $title;
//    
//}

?>