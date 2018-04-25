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
            $htmlList .= '<dt class="links"><a href="http://www.fandomdb.com/Production/viewArticle.php?title='.$row[0].'&authorID='.$row[1].'">'.$row[0].' </a></dt>';
        }
}
else{
    $specificArticleSQL = 'SELECT title, authorID FROM Article';
$clickableArticle = multipleResultQuery($conn,$specificArticleSQL);
$htmlList = '';
while ($row = $clickableArticle->fetch_row()) {
            $htmlList .= '<dt class="links"><a href="http://www.fandomdb.com/Production/viewArticle.php?title='.$row[0].'&authorID='.$row[1].'">'.$row[0].' </a></dt>';
        }
}
?>
<!DOCTYPE html>
<html>
<head>
<title>Artcles for the Fandom</title><!--    potentially change 'the Fandom" to the specific fandom name -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <link href="//netdna.bootstrapcdn.com/twitter-bootstrap/2.3.2/css/bootstrap-combined.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="//netdna.bootstrapcdn.com/twitter-bootstrap/2.3.2/js/bootstrap.min.js"></script>
    <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
    <link rel="stylesheet" type="text/css" href="navbar.css">
    
    <style>

        h2{
            text-align: center;
            padding 30px;
            font-size: 35pt;
            margin-top: 20px;
        }
        .fandomdb{
            height: 50px;
            width: 250px;
            padding-right: 10px;

        }
        span{
            font-size: 14px;
            font-weight: 400;
            color: #8860D0;
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
         
    
    
    
    
    
    <div class="row">
      <div class="span8">
        <div class="row">
          <div class="span8">
            <h4><strong><a href="#">
                <ul>
                    <?php

                        echo $htmlList; 

                  ?>
                </ul>
                </a></strong></h4>
          </div>
        </div>
        <div class="row">
          <div class="span2">
            <a href="#" class="thumbnail">
                <img src="http://placehold.it/260x180" alt="">
            </a>
          </div>
          <div class="span6">      
            <p>
              Lorem ipsum dolor sit amet, id nec conceptam conclusionemque. Et eam tation option. Utinam salutatus ex eum. Ne mea dicit tibique facilisi, ea mei omittam explicari conclusionemque, ad nobis propriae quaerendum sea.
            </p>
            <p><a class="btn" href="#">Read more</a></p>
          </div>
        </div>
        <div class="row">
          <div class="span8">
            <p></p>
            <p>
              <i class="icon-user"></i> by <a href="#">John</a> 
              | <i class="icon-calendar"></i> Sept 16th, 2012

            </p>
          </div>
        </div>
      </div>
    </div>
    <hr>
     
     
     
     
     
     
     
    </div>
</body>
</html>
