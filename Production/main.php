<?php
    session_start();
?>

<DOCTYPE html>
<html>
    <head>
    <title>Home</title>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

        <style>
            body{
                background-color: #C1C8E4;
            }
            .navColor{
                background-color: #84CEEB;
                border-color:#C1C8E4;
                font-size: 14pt;
            }
            .fandomdb{
                height: 50px;
                width: 250px;
                padding-right: 10px;

            }
            .fandomdb:hover {
                opacity: 0.9;
                filter: alpha(opacity=100);
            }
            .menuDiv{
                height: 55px;
            }
            .rightNavWords {
                font-size: 12pt;
            }

        </style>

    </head>
    <body>  
        <!-- NAV BAR -->
        <nav class="navbar navbar-inverse navColor menuDiv">
            <div class="container-fluid ">
                <div class="navbar-header">
                    <a  href="http://ec2-54-208-194-246.compute-1.amazonaws.com/CapstoneProject/mainAnon.html">
                        <img class="fandomdb" src="../images/FandomDBCropped.png" alt="FDB">
                    </a>
                </div>
                <ul class="nav navbar-nav">
                    <li><a href="#">Fandoms</a></li>
                    <li><a href="../Development/AbdulPhp/writeArticle.php" class="navWords">Write Article(testing)</a></li>
                    <li><a href="#" class="navWords">Creators</a></li>
                </ul>
                <ul class="nav navbar-nav navbar-right">
                    <li><a href="userProfile.php" class="rightNavWords"><span class="glyphicon glyphicon-log-in"></span> Account</a></li>
                    <li><a href="../Development/AbdulPhp/logout.php" class="rightNavWords"><span class="glyphicon glyphicon-log-in"></span> Logout</a></li>
                </ul> 
            </div>
        </nav>
    </body>

    </html>
</DOCTYPE>