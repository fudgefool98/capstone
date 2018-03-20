<?php 
/*
the problems with this document are as follows

#1 as is commented in many places the sql statements aren't completed or the table User's must be altered to include the new rows.
#2 The function oneResultQuery has not been tested and likely fails to retrive plain text ready to be echoed in the proper locations
#3 NO IMPLEMENTATION IS DONE FOR THE PROFILE PICTURE!!!!!
#4 ask about the security of this document
*/

// Start the session
require 'db_credentials.php';
session_start();
//for now we force JORDAN as the session var for user id = 40
$_SESSION['user'] = 40;
if (!isset($_SESSION['user'])){ 
    //currently only relocates as i haven't tested signed in
    //header('Location: loginPage.html');
    //exit;
}
else{
    $conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
}
$aboutMeSql = "SELECT about FROM User WHERE userID = $_SESSION[user]";

//$WrittenArticlesListSql = "";
//requires join
//$favFandomsSql = "";
//requires join

$twitter = "SELECT twitter FROM User Where userID = $_SESSION[user]";
$facebook = "SELECT facebook FROM User Where userID = $_SESSION[user] ";
$instagram = "SELECT instagram FROM User Where userID = $_SESSION[user] ";
$snapchat = "SELECT snapchat FROM User Where userID = $_SESSION[user] ";
$tumblr = "SELECT tumblr FROM User Where userID = $_SESSION[user] ";

$emailSql = "SELECT email FROM User Where userID = $_SESSION[user]";
$birthdaySql = "SELECT birthday FROM User Where userID = $_SESSION[user]";

//$topFandomSql = "SELECT ";
//requires join
$mostRecentArticleSql = "SELECT title FROM Article WHERE authorID = $_SESSION[user] order by lastEdited desc limit 1";
//requires join


//make sure I am processing the results properly in this function so that it returns the value and only the value of the query desired

//if the value is nullable
function oneResultQuery($conn,$query){
    if($result = $conn->query($query)){
        $returnThis = $result->fetch_row(); 
        if($returnThis[0] != null){
            return $returnThis[0];
        }
        else{
            return "No information available";
        }
    }
    else {
        print "Error: " . $query . "<br>" . $conn->error;
    }
    
}
function multipleResultQuery($conn,$query){
    if($result = $conn->query($query)){
        while ($row = $result->fetch_row()) {
            $returnThis += $row[0] . "\n";
        }
        return $returnThis;
    }
    else {
        print "Error: " . $query . "<br>" . $conn->error;
    }
    
}
//if the value is non nullable we would like to return a string that says 
//"This hasn't been set yet, edit your information by clicking Edit User"


//these are tabs
$resultAboutMe = oneResultQuery($conn, $aboutMeSql);

//$resultFavFandoms = multipleResultQuery($conn, $favFandomsSql);
//$resultWrittenArticlesList = multipleResultQuery($conn, $WrittenArticlesListSql);

    //social media
    $resultTwitter = oneResultQuery($conn, $twitter);
    $resultFacebook = oneResultQuery($conn, $facebook);
    $resultInstagram = oneResultQuery($conn, $instagram);
    $resultSnapchat = oneResultQuery($conn, $snapchat);
    $resultTumblr = oneResultQuery($conn, $tumblr);

//these are in quick look
$resultEmail = oneResultQuery($conn, $emailSql);
$resultBirthday = oneResultQuery($conn, $birthdaySql);
$resultMostRecentArticle = oneResultQuery($conn, $mostRecentArticleSql);

//$resultTopFandom = oneResultQuery($conn, $topFandomSql);


$conn->close();
?>

<!DOCTYPE html>
<html>
    <head>
        <title>User Profile</title><!-- this could be "name User Profile"-->
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
        <script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
        <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
        <link rel="stylesheet" type="text/css" href="userPage.css">
        <style>
            .profilePic{
                border-radius: 20%;
            }
            .profileInfo{
                border-radius: 15px;
                border-color: #C1C8EA;
            }
            .contentDiv{
                border-bottom-left-radius: 10px;
                border-bottom-right-radius: 10px;
            }
            .quickLook{
                border-radius: 15px;
                border-color: #8860D0;
                color: #5680E9;
            }
            labelColor{
            }
            .tab {
                overflow: hidden;
                border: 1px solid #8860D0;
/*                border-bottom: none;*/
                background-color: #84CEEB;
                border-top-right-radius: 10px;
                border-top-left-radius: 10px;
            }

            /* Style the buttons inside the tab */
            .tab button {
                background-color: inherit;
                float: left;
                border: none;
                outline: none;
                cursor: pointer;
                padding: 14px 16px;
                transition: 0.3s;
                font-size: 17px;
            }

            /* Change background color of buttons on hover */
            .tab button:hover {
                background-color: #5AB9EA;
            }

            /* Create an active/current tablink class */
            .tab button.active {
                background-color: #5680E9;
            }

            /* Style the tab content */
            .tabcontent {
                display: none;
                padding: 6px 12px;
                border: 1px solid #8860D0;
                border-top: none;
                border-bottom-left-radius: 15px;
                border-bottom-right-radius: 15px;
            }
            .words{
                -webkit-animation: fadeEffect 1s;
                animation: fadeEffect 1s;
            }
            @-webkit-keyframes fadeEffect {
                from {opacity: 0;}
                to {opacity: 1;}
            }

            @keyframes fadeEffect {
                from {opacity: 0;}
                to {opacity: 1;}
            }
            .tabBody{
                background-color: whitesmoke;
                color: #5680E9;
                border-bottom-left-radius: 15px;
                border-bottom-right-radius: 15px;
            }
            hr{
                color: black;
            }
          .navColor{
            background-color: #84CEEB;
            border-color:#C1C8E4;
        }
            
        .navWords{
            color: white;
        }
        .fandomdb{
            height: 50px;
            width: 250px;
            padding-right: 10px;

        }
        .menuDiv{
            height: 55px;
        }

        .createAccount {
         font-size: 20px;
        }
            
        </style>
    </head>
    
    <body>
<!--        Navbar-->
        <nav class="navbar navbar-inverse navColor menuDiv">
      <div class="container-fluid ">
        <div class="navbar-header">
            <img class="fandomdb" src="../images/FandomDBCropped.png" alt="FDB">
        </div>
        <ul class="nav navbar-nav">
          <li><a href="#">Home</a></li>
            <li><a href="#" class="navWords">Go Back</a></li>
        </ul>
      </div>
    </nav>
<!--        script for tabs-->
        <script>
            function openTab(evt, tabName) {
                var i, tabcontent, tablinks;
                tabcontent = document.getElementsByClassName("tabcontent");
                for (i = 0; i < tabcontent.length; i++) {
                    tabcontent[i].style.display = "none";
                }
                tablinks = document.getElementsByClassName("tablinks");
                for (i = 0; i < tablinks.length; i++) {
                    tablinks[i].className = tablinks[i].className.replace(" active", "");
                }
                document.getElementById(tabName).style.display = "block";
                evt.currentTarget.className += " active";
            }

         
//            document.getElementById("defaultOpen").click();
    
        </script>
<!--        Header-->
        <div class="container-fluid header">
          <div class="row">
            <div class="fb-profile">
                <img align="left" class="fb-image-lg" src="images/FandomDBCropped.png" alt="Profile image example"/>
                <div>
                <img align="left" class="fb-image-profile thumbnail profilePic" src="images/blankUser.png" alt="Profile image example"/>
                </div>
                <div class="fb-profile-text">
                    <h1>User Profile</h1><!-- this could be their name-->
                    <a href="http://ec2-54-208-194-246.compute-1.amazonaws.com/CapstoneProject/editProfile.html">Edit Profile</a>
                </div>
            </div>
          </div>
        </div> <!-- /container fluid-->  
        <div class="container pageContent">
          <div class="col-sm-8">
              <!--Tabs for profile-->
              <div data-spy="scroll" class="tabbable-panel profileInfo">
                <div class="tab">
                    <button class="tablinks" onclick="openTab(event, 'About')">About Me</button>
                    <button class="tablinks" onclick="openTab(event, 'Articles')">Written Articles</button>
                    <button class="tablinks" onclick="openTab(event, 'Fandoms')">Favorite Fandoms</button>
                    <button class="tablinks" onclick="openTab(event, 'Other')">Social Media</button>
                </div>
<!--                  Info within tab-->
<!--                  data needs to loaded into these tabs based on user profile information from "Edit Profile" or User tables in DB-->
                  <div class="tabBody">
                    <div id="About" class="tabcontent" style="display:block">
                      <h3>About Me</h3>
                        <hr>
                      <p class="words"><?php echo "$resultAboutMe"; ?></p>
                    </div>

                    <div id="Articles" class="tabcontent">
                      <h3>Written Articles</h3>
                        <hr>
                      <p class="words"><?php echo "$resultWrittenArticlesList"; ?></p> 
                    </div>

                    <div id="Fandoms" class="tabcontent">
                      <h3>Favorite Fandoms</h3>
                        <hr>
                      <p class="words"><?php echo "$resultFavFandoms"; ?></p>
                    </div>

                    <div id="Other" class="tabcontent">
                      <h3>Social Media</h3>
                        <hr>
                      <ul class="words">Twitter: <?php echo "$resultTwitter"; ?></ul>
                      <ul class="words">Facebook: <?php echo "$resultFacebook";  ?></ul>
                      <ul class="words">Instagram: <?php echo "$resultInstagram";?></ul>
                      <ul class="words">Snapchat: <?php echo "$resultSnapchat"; ?></ul>
                      <ul class="words">Tumblr: <?php echo "$resultTumblr"; ?></ul>
                    </div>
                  </div>
              </div>

          </div>
<!--            Right side quick look at user details-->
          <div class="col-sm-4">
           <div class="panel panel-default quickLook">
                <div class="menu_title">
                   Quick Look
                </div>
                <div class="panel-body">
                    <div class="row">
                        <div class="col-lg-12">
                             <div class="form-group labelColor">
                                 <label>Username: <?php echo "$resultEmail"; ?></label>
                                  <p></p>
                             </div>
                              <div class="form-group labelColor">
                                  <label for="email">Birthday: <?php echo "$resultBirthday"; ?></label>
                                  <p></p>
                              </div>
                              <div class="form-group labelColor">
                                  <label for="email">Top Fandom: <?php echo "$resultTopFandom"; ?></label>
                                  <p></p>
                              </div>
                               <div class="form-group labelColor">
                                  <label for="email">Most Recent Article: <?php echo "$resultMostRecentArticle"; ?></label>
                                   <p></p>
                               </div>

                        </div>
                    </div>
                </div>
            </div>
          </div>
        </div>
    </body>
</html>