<?php
echo '<!-- NAV BAR --> 
<nav class="navbar navbar-inverse navColor menuDiv"> 
            <div class="container-fluid "> 
                <div class="navbar-header"> 
                    <a  href="http://www.fandomdb.com/Production/mainAnon.php"> 
                        <img class="fandomdb img-responsive" src="images/FandomDBCropped.png" alt="FDB"> 
                    </a> 
                </div> 
                <ul class="nav navbar-nav"> 
                    <li><a href="http://www.fandomdb.com/Production/fandoms.php" class="navWords"> <span class="glyphicon glyphicon-heart"></span>  Fandoms</a></li> 
                    <li><a href="http://www.fandomdb.com/Production/creators.php" class="navWords"> <span class="glyphicon glyphicon-user"></span>  Creators</a></li> ';
                    
if(isset($SESSION['user'])){
                              //this href needs to be set
    echo '<li><a href="#" class="navWords"> <span class="glyphicon glyphicon-edit"></span> Create a Post</a></li> ';
}
                       
 echo '</ul> ';
                
if(isset($SESSION['user'])){
echo '<ul class="nav navbar-nav navbar-right"> 
//        question
          <li><a href="#" class="navWords"><span class="glyphicon glyphicon-user"></span>';
    echo $_SESSION['user'];

    echo '</a></li> 
          <li><a href="http://www.fandomdb.com/Production/loginPage.php" class="navWords"><span class="glyphicon glyphicon-log-in"></span> Log Out</a></li> 
          </ul> ';
    //still need to handle logout
}
else{

  echo '<ul class="nav navbar-nav navbar-right"> 
      <li><a href="http://www.fandomdb.com/Production/signupPage.php" class="navWords"><span class="glyphicon glyphicon-plus-sign"></span> Sign Up</a></li> 
      <li><a href="http://www.fandomdb.com/Production/loginPage.php" class="navWords"><span class="glyphicon glyphicon-log-in"></span> Login</a></li> ';
    //the above href needs to be set
}
            echo '</div> 
        </nav>
        <!-- END NAV BAR --> ';
?>