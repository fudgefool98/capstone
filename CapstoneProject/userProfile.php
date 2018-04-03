<!DOCTYPE html>
<html>
    <head>
        <title>User Profile</title>
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
        <ul class="nav navbar-nav navbar-right">
          <li><a href="#" class="navWords"><span class="glyphicon glyphicon-log-out"></span> Logout</a></li>
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
                <img align="left" class="fb-image-lg" src="../images/FandomDBCropped.png" alt="Profile image example"/>
                <div>
                <img align="left" class="fb-image-profile thumbnail profilePic" src="../images/blankUser.png" alt="Profile image example"/>
                </div>
                <div class="fb-profile-text">
                    <h1>User Profile</h1>
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
<!--                  data needs to loaded into these tabs based on user profile information from "Edit Profile"-->
                  <div class="tabBody">
                    <div id="About" class="tabcontent" style="display:block">
                      <h3>About Me</h3>
                        <hr>
                      <p class="words">London is the capital city of England.</p> <!--this is a placeholder for the time being -->
                    </div>

                    <div id="Articles" class="tabcontent">
                      <h3>Written Articles</h3>
                        <hr>
                      <p class="words">Paris is the capital of France.</p> <!--this is a placeholder for the time being -->
                    </div>

                    <div id="Fandoms" class="tabcontent">
                      <h3>Favorite Fandoms</h3>
                        <hr>
                      <p class="words">Tokyo is the capital of Japan.</p><!--this is a placeholder for the time being -->
                    </div>

                    <div id="Other" class="tabcontent">
                      <h3>Social Meadia</h3>
                        <hr>
                      <ul class="words">Twitter: </ul>
                      <ul class="words">Facebook: </ul>
                      <ul class="words">Instagram: </ul>
                      <ul class="words">Snapchat: </ul>
                      <ul class="words">Tumblr: </ul>
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
                                 <label>Username: </label>
                                  <p></p>
                             </div>
                              <div class="form-group labelColor">
                                  <label for="email">Birthday:</label>
                                  <p></p>
                              </div>
                              <div class="form-group labelColor">
                                  <label for="email">Top Fandom:</label>
                                  <p></p>
                              </div>
                               <div class="form-group labelColor">
                                  <label for="email">Most Recent Article:</label>
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