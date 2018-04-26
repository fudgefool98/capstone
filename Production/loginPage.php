<?php
// Start the session
require 'loggedInCheck.php';
?>

<!DOCTYPE html>
<html>
<head>
   <title>Login</title> 
    
    <link href="//netdna.bootstrapcdn.com/bootstrap/3.1.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="//netdna.bootstrapcdn.com/bootstrap/3.1.0/js/bootstrap.min.js"></script>
    <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
    <link rel="stylesheet" type="text/css" href="navbar.css">

    <style>
        body{
            background-image: url("images/Background2.png");
            height: 100%; 
            background-position: center;
            background-repeat: no-repeat;
            background-size: cover;
        }
        html,body{
            position: relative;
            height: 100%;
        }

        .login-container{
            position: relative;
            width: 300px;
            margin: 80px auto;
            padding: 20px 40px 40px;
            text-align: center;
/*            background: #fff;*/
            background: #84CEEB;
            border: 1px solid #ccc;
        }

        #output{
            position: absolute;
            width: 300px;
            top: -75px;
            left: 0;
            color: #fff;
        }

        #output.alert-success{
            background: rgb(25, 204, 25);
        }

        #output.alert-danger{
            background: rgb(228, 105, 105);
        }


        .login-container::before,.login-container::after{
            content: "";
            position: absolute;
            width: 100%;height: 100%;
            top: 3.5px;left: 0;
            background: #fff;
            z-index: -1;
            -webkit-transform: rotateZ(4deg);
            -moz-transform: rotateZ(4deg);
            -ms-transform: rotateZ(4deg);
            border: 1px solid #ccc;

        }

        .login-container::after{
            top: 5px;
            z-index: -2;
            -webkit-transform: rotateZ(-2deg);
             -moz-transform: rotateZ(-2deg);
              -ms-transform: rotateZ(-2deg);

        }


/*
        .avatar{
            width: 125px;
            height: 125px;
            border-radius: 100%;
            border: 2px solid #aaa;
            margin: 10px auto 30px;
        }
*/


        .form-box input{
            width: 100%;
            padding: 10px;
            text-align: center;
            height:40px;
            border: 1px solid #ccc;;
            background: #fafafa;
            transition:0.2s ease-in-out;

        }

        .form-box input:focus{
            outline: 0;
            background: #eee;
        }

        .form-box input[type="text"]{
            border-radius: 5px 5px 0 0;
            text-transform: lowercase;
        }

        .form-box input[type="password"]{
            border-radius: 0 0 5px 5px;
            border-top: 0;
        }

        .form-box button.login{
            margin-top:15px;
            padding: 10px 20px;
        }

        .animated {
          -webkit-animation-duration: 1s;
          animation-duration: 1s;
          -webkit-animation-fill-mode: both;
          animation-fill-mode: both;
        }

        @-webkit-keyframes fadeInUp {
          0% {
            opacity: 0;
            -webkit-transform: translateY(20px);
            transform: translateY(20px);
          }

          100% {
            opacity: 1;
            -webkit-transform: translateY(0);
            transform: translateY(0);
          }
        }

        @keyframes fadeInUp {
          0% {
            opacity: 0;
            -webkit-transform: translateY(20px);
            -ms-transform: translateY(20px);
            transform: translateY(20px);
          }

          100% {
            opacity: 1;
            -webkit-transform: translateY(0);
            -ms-transform: translateY(0);
            transform: translateY(0);
          }
        }

        .fadeInUp {
          -webkit-animation-name: fadeInUp;
          animation-name: fadeInUp;
        }
        
        .image{
            width: 125px;
            height: 125px;
            border-radius: 100%;
            border: 2px solid #aaa;
            margin: 10px auto 30px;
        }

        .lButton{
            background-color: #8880D0;
            margin-bottom: 10px;
        }
        .fandomdb{
            height: 50px;
            width: 250px;
            padding-right: 10px;

        }
    </style>
</head>

<body>
<?php require 'navBar.php'?>
    <div class="container">
	   <div class="login-container">
           <?php
                if(isset($_SESSION['errorMessage'])){
                    echo '<div class="alert alert-danger"><p>';
                    echo $_SESSION["errorMessage"];
                    echo "</p></div>";
                    unset($_SESSION['errorMessage']);
                }
            ?>
            <div id="output"></div>
            <div class="avatar fdb">
                <img class="image" src="images/FandomDBLogo.png" alt="FDBLogo">
            </div>
            <div class="form-box">
                <form action="loginService.php" method="post">
                    <input name="username" type="text" placeholder="username">
                    <input name="password" type="password" placeholder="password">
                    <button class="btn btn-info btn-block login lButton" type="submit" name="submit" >Login</button>
                </form>
                <a href="http://www.fandomdb.com/Production/signupPage.php" class="createAccount">Don't have an Account?</a>
            </div>
        </div>
    </div>
</body>