<?php 

//FIND THE ERROR
require 'db_credentials.php';
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
$_GET['title'] = $conn->real_escape_string($_GET['title']);    

session_start();
$loggedIn = false;
if (isset($_SESSION['user'])){ 
    $loggedIn = true;
}
function multipleResultQuery($conn,$query){
    if($result = $conn->query($query)){
        return $result;
    }
    else {
        print "Error: " . $query . "<br>" . $conn->error;
    }
    
}


$specificArticleSQL = 'SELECT title, authorID FROM Article WHERE fandom = "'.$_GET['title'].'"';
$clickableArticle = multipleResultQuery($conn,$specificArticleSQL);
$htmlList = '';
while ($row = $clickableArticle->fetch_row()) {
            $htmlList .= '<dt class="links"><a href="http://ec2-54-208-194-246.compute-1.amazonaws.com/Development/JordanPhp/viewArticle.php?title='.$row[0].'&authorID='.$row[1].'">'.$row[0].' </a></dt>';
    //currently the links will be broken.
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
    <!-- NAV BAR -->

    <nav class="navbar navbar-inverse navColor menuDiv">
      <div class="container-fluid ">
        <div class="navbar-header">
            <a  href="http://ec2-54-208-194-246.compute-1.amazonaws.com/CapstoneProject/mainAnon.html">
            <img class="fandomdb" src="../../images/FandomDBCropped.png" alt="FDB">
            </a>
        </div>
        <ul class="nav navbar-nav">
<!--          <li class="active"><a href="#">Home</a></li>-->
          <li><a href="#" class="navWords">Fandoms</a></li>
          <li><a href="#" class="navWords">Creators</a></li>
<!--          <li><a href="#" class="navWords">Page 3</a></li>-->
            </ul>
          
<?php
  if($loggedIn){
    echo '<ul class="nav navbar-nav navbar-right">
              <li><a href="#" class="navWords"><span class="glyphicon glyphicon-user"></span> '.$_SESSION["user"].'</a></li>
              <li><a href="#" class="navWords"><span class="glyphicon glyphicon-log-in"></span> Log Out</a></li>
              </ul>';
  }
  else{
        
      echo '<ul class="nav navbar-nav navbar-right">
          <li><a href="#" class="navWords"><span    class="glyphicon glyphicon-user"></span> Sign Up</a>    </li>
          <li><a href="#" class="navWords"><span    class="glyphicon glyphicon-log-in"></span> Login</a>    </li>';
  }  ?>
      </div>
    </nav>
    <div class="fandoms">
        <h2><?php $_GET['title'];?> Articles</h2>
        <ul>
            <?php
          
echo $htmlList; 

          ?>
        </ul>
    </div>
</body>
</html>
