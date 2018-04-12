<?php 

//parse out the php and test it
require 'db_credentials.php';
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
session_start();
$loggedIn = false;
if (isset($_SESSION['user'])){ 
    $loggedIn = true;
}
else{
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


$listSQL = "SELECT username FROM User";
$list = multipleResultQuery($conn,$listSQL);
$htmlList = '';
while ($row = $list->fetch_row()) {
            $htmlList .= '<dt class="links"><a href="http://ec2-54-208-194-246.compute-1.amazonaws.com/Development/JordanPhp/userProfile.php?user='.$row[0].'">'.$row[0].' </a></dt>';
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
        <h2>Our Authors</h2>
        <ul>
            <?php
          
echo $htmlList; 

          ?>
        </ul>
    </div>
</body>
</html>
