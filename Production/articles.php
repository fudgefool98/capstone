<?php 
//FIND THE ERROR
require 'db_credentials.php';
require 'loggedInCheck.php';
require 'dbConnUserForNav.php';

function multipleResultQuery($conn,$query){
    if($result = $conn->query($query)){
        return $result;
    }
    else {
        print "Error: " . $query . "<br>" . $conn->error;
    }   
}
if(isset($_GET['title'])){
$_GET['title'] = $conn->real_escape_string($_GET['title']);    
$specificArticleSQL = 'SELECT title, authorID FROM Article WHERE fandom = "'.$_GET['title'].'"';
$clickableArticle = multipleResultQuery($conn,$specificArticleSQL);
$htmlList = '';
while ($row = $clickableArticle->fetch_row()) {
            $htmlList .= '<dt class="links"><a href="http://ec2-54-208-194-246.compute-1.amazonaws.com/Production/viewArticle.php?title='.$row[0].'&authorID='.$row[1].'">'.$row[0].' </a></dt>';
        }
}
else{
    $specificArticleSQL = 'SELECT title, authorID FROM Article';
$clickableArticle = multipleResultQuery($conn,$specificArticleSQL);
$htmlList = '';
while ($row = $clickableArticle->fetch_row()) {
            $htmlList .= '<dt class="links"><a href="http://ec2-54-208-194-246.compute-1.amazonaws.com/Production/viewArticle.php?title='.$row[0].'&authorID='.$row[1].'">'.$row[0].' </a></dt>';
        }
}
?>
<!DOCTYPE html>
<html>
<head>
<title>IT4970</title>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    
    <style>

        .navColor{
            background-color: #84CEEB;
            border-color:#84CEEB;
            color: black;
        }
        
        .navWords{
            color: black;
        }
        img{
            height: 50px;
            width: 200px;
            padding-right: 10px;

        }
        .menuDiv{
            height: 51px;
        }
        .pageContent{
            background-color: #C1C8EA;
        }
        .links{
            margin: 30px;
        }
        
    </style>
    
</head>
<body class="pageContent">   
<?php require 'navBar.php'?>
    <div class="fandoms">
        <h2><?php
            if(isset($_GET['title'])){
            echo $_GET['title'];
            }
            else{
                echo 'All';
            }
            ?> Articles</h2>
        <ul>
            <?php
          
echo $htmlList; 

          ?>
        </ul>
    </div>
</body>
</html>
