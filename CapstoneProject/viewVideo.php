<?php 
    session_start();
?>

<!DOCTYPE html>
<html>
    <head>
        <title>Content Page</title>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
        <script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
        <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
        <link rel="stylesheet" type="text/css" href="userPage.css">
        <style>
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
            .image{
                height: auto;
                width: auto;
                display: block;
                margin-left: auto;
                margin-right: auto;
                
            }
            .articleLinks{
                width: 220px;
                
            }
            .authorDiv{
                background-color: #5680E9;
            }
            .text{
                text-align: center;
            }
            .caption{
                margin-top: 20px;
                text-align: center;
            }
        </style>
    </head>
    <body>
         <!-- Static navbar -->
        <nav class="navbar navbar-inverse navColor menuDiv">
          <div class="container-fluid ">
            <div class="navbar-header">
            <a  href="http://ec2-54-208-194-246.compute-1.amazonaws.com/CapstoneProject/mainAnon.html">
                <img class="fandomdb" src="../images/FandomDBCropped.png" alt="FDB">
            </a>
            </div>
            <ul class="nav navbar-nav">
              <li><a href="#">Fandoms</a></li>
                <li><a href="#" class="navWords">Creators</a></li>
            </ul>
                <ul class="nav navbar-nav navbar-right">
<!--                    link will take user to their profile IF logged in. This will not appear if user is not logged in-->
                  <li><a href="#" class="navWords"><span class="glyphicon glyphicon-user"></span> Profile</a></li>
                </ul> 
          </div>
        </nav>

        <section class="banner-section">
        </section>
        <section class="post-content-section">
            <div class="container">
                <div class="row">
                    <?php
                        if(isset($_SESSION['articleErrorMessage'])){
                            echo '<div class="alert alert-danger"><p>';
                            echo $_SESSION["articleErrorMessage"];
                            echo "</p></div>";
                            unset($_SESSION['articleErrorMessage']);
                        }
                    ?>
                    <div class="col-lg-9 col-md-9 col-sm-12">
                        <div class="col-lg-12 col-md-12 col-sm-12 post-title-block">
                            
<!--                            Title will be populated from php fetched from create content pages-->
                            <h1 class="text-center">Title</h1>
                            <ul class="list-inline text-center">
                                
<!--                                Auther Name, Fandom, and Date will be fetched from php of create content as well-->
                                <li class="text">Author Name</li>|
                                <li class="text">Specific Fandom</li>|
                                <li class="text">Date</li>
                            </ul>
                        </div>
                        <div class="image-block">
                            <div>
<!--                  the video will go here from whatever the creator uploads from content creation page-->
                                 <video class="img-responsive image" autoplay controls>
                                     <source src="../media/test.mp4" type="video/mp4">
                                </video>
                            </div>
                        </div>
                        <div>
<!--                    Words from the create content page is here. Caption... if there is not caption or article from the creator                          this should be left blank-->
                            <p class="lead caption">Video Caption Here!</p>
                        </div>
                     </div>
                    <div class="col-lg-3  col-md-3 col-sm-12">
                        <div class="well authorDiv">
                            <h2>About Author</h2>
                            <img src="" class="img-rounded" />
<!--                            a little blurb from the authurs bio here-->
                            <p>Authur info goes here</p>
                            
<!--                            button below should take you to the users profile-->
                            <a href="http://ec2-54-208-194-246.compute-1.amazonaws.com/Development/JordanPhp/userProfile.php" class="btn btn-default">Read more</a>
                        </div>
                        <div class="well authorDiv">
                            
<!--                            more content from the creator-->
                            <h3>More by This Author</h3>
                            <div class="input-group">
                                <div class="list-group articleLinks">
                                    <a class="list-group-item" href="#"> <h4 class="list-group-item-heading">Content Title Here</h4> <p class="list-group-item-text"></p> </a>
                                    <a class="list-group-item" href="#"> <h4 class="list-group-item-heading">Content Title Here</h4> <p class="list-group-item-text"></p> </a>
                                    <a class="list-group-item" href="#"> <h4 class="list-group-item-heading">Content Title Here</h4> <p class="list-group-item-text"></p> </a>
                                </div>
                            </div>
                        </div>
                        <div class="well authorDiv">
<!--                            more content within this fandom-->
                            <h3>More in This Fandom</h3>
                            <div class="input-group">
                                <div class="list-group articleLinks">
                                    <a class="list-group-item" href="#"> <h4 class="list-group-item-heading">Content Title Here</h4> <p class="list-group-item-text"></p> </a>
                                    <a class="list-group-item" href="#"> <h4 class="list-group-item-heading">Content Title Here</h4> <p class="list-group-item-text"></p> </a>
                                    <a class="list-group-item" href="#"> <h4 class="list-group-item-heading">Content Title Here</h4> <p class="list-group-item-text"></p> </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div> <!-- /container -->
        </section>
      
    </body>
</html>