<?php 

//parse out the php and test it
require 'db_credentials.php';
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
session_start();
$loggedIn;
if (!isset($_SESSION['user'])){ 
    $loggedIn = false;
}
function multipleResultQuery($conn,$query){
    if($result = $conn->query($query)){
        return $result;
    }
    else {
        print "Error: " . $query . "<br>" . $conn->error;
    }
    
}


$fandomListSQL = "SELECT title FROM Fandom";
$fandomList = multipleResultQuery($conn,$fandomListSQL);
$htmlList = '';
while ($row = $fandomList->fetch_row()) {
            $htmlList .= '<dt class="links"><a href="http://ec2-54-208-194-246.compute-1.amazonaws.com/Development/JordanPhp/articles.php?title='.$row[0].'">'.$row[0].' </a></dt>';
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
        h2{
            margin-left: 40px;
        }
        
        .links{
            margin: 30px;
        }
        
        #myInput {
            background-image: url('/css/searchicon.png');
            background-position: 10px 12px;
            background-repeat: no-repeat;
            width: 50%;
            font-size: 16px;
            padding: 12px 20px 12px 40px;
            border: 1px solid #ddd;
/*            margin-bottom: 12px;*/
            margin-left: 40px; 
            margin-top: 20px;
        }

        #myUL {
          list-style-type: none;
          padding: 0;
          margin: 0;
        }

        #myUL li a {
          margin-top: -1px; /* Prevent double borders */
          padding: 12px;
          text-decoration: none;
          font-size: 18px;
          color: black;
          display: block
        }

        #myUL li a:hover:not(.header) {
          color: #8860D0;
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
                      <li><a href="#" class="navWords"><span class="glyphicon glyphicon-user"></span> USER NAME PLACEHOLDER</a></li>
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
        <h2>Our Fandoms</h2>
        <input type="text" id="myInput" onkeyup="myFunction()" placeholder="Search for fandoms..." title="Type in a name">
        <div>
            <ul id="myUL">
                <li> <?php echo $htmlList; ?> </li>
            </ul>
        </div>      
    </div>
    
    <script>
        function myFunction() {
            var input, filter, ul, li, a, i;
            input = document.getElementById("myInput");
            filter = input.value.toUpperCase();
            ul = document.getElementById("myUL");
            li = ul.getElementsByTagName("dt");
            for (i = 0; i < li.length; i++) {
                a = li[i].getElementsByTagName("a")[0];
                if (a.innerHTML.toUpperCase().indexOf(filter) > -1) {
                    li[i].style.display = "";
                } else {
                    li[i].style.display = "none";

                }
            }
        }
    </script>
</body>
</html>