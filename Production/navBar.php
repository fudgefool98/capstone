<?php
echo '<!-- NAV BAR --> 
<nav class="navbar navbar-inverse navColor menuDiv"> 
            <div class="container-fluid "> 
                <div class="navbar-header"> 
                    <a  href="http://ec2-54-208-194-246.compute-1.amazonaws.com/Production/mainAnon.php"> 
                        <img class="fandomdb" src="../images/FandomDBCropped.png" alt="FDB"> 
                    </a> 
                </div> 
                <ul class="nav navbar-nav"> 
                    <li><a href="http://ec2-54-208-194-246.compute-1.amazonaws.com/Production/fandoms.php">Fandoms</a></li> 
                    <li><a href="http://ec2-54-208-194-246.compute-1.amazonaws.com/Production/creators.php">Creators</a></li> ';
                    
if($loggedIn){
                              //this href needs to be set
    echo '<li><a href="#">Create a Post</a></li> ';
}
                       
 echo '</ul> ';
                
if($loggedIn){
echo '<ul class="nav navbar-nav navbar-right"> 
          <li><a href="#" class="navWords"><span class="glyphicon glyphicon-user"></span>';
    echo $_SESSION['user'];

    echo '</a></li> 
          <li><a href="#" class="navWords"><span class="glyphicon glyphicon-log-in"></span> Log Out</a></li> 
          </ul> ';
    //still need to handle logout
}
else{

  echo '<ul class="nav navbar-nav navbar-right"> 
      <li><a href="http://ec2-54-208-194-246.compute-1.amazonaws.com/Production/signupPage.php" class="navWords"><span class="glyphicon glyphicon-user"></span> Sign Up</a></li> 
      <li><a href="#" class="navWords"><span class="glyphicon glyphicon-log-in"></span> Login</a></li> ';
    //the above href needs to be set
}
            echo '</div> 
        </nav>
        <!-- END NAV BAR --> ';
?>