<?php
require 'db_credentials.php';
require 'loggedInCheck.php';
require 'dbConnUserForNav.php';

?>
<!DOCTYPE html>
<html>
<head>
   <title>FandomDB Create Account</title> 
    
    <link href="//netdna.bootstrapcdn.com/bootstrap/3.1.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="//netdna.bootstrapcdn.com/bootstrap/3.1.0/js/bootstrap.min.js"></script>
    <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
    <style>
     
/*
        #bg{
            position: fixed;
            top: 0;
            left: 0;
            
            min-width: 100%;
            min-height: 100%
        }
*/
      body{
            background-image: url("../../images/Background2.png");
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
            margin: 50px 0px 0px 300px;
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
        
        .logo{
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
           
        p{
            text-align: center;
            font-size: 24;
        }
        .message2{
            text-align: center;
            font-size: 36px;
        }
        
        .message{
             text-align: center;
            font-size: 24px;
            color: #8860D0
        }
        
        .column {
            float: left;
            height: 300px;
        }
        .row:after {
            content: "";
            display: table;
            clear: both;
        }
        .left {
            width: 40%;
            padding: 150px 0px 0px 0px;
        }
        
        .middle{
            width: 10%
            padding: 150px 0px 0px 0px;
            
        }
        
        .right {
            width: 50%;
        }
        
        div.transbox{
            margin: 30px;
            background-color: #ffffff;
            opacity: 0.6;
            filter: alpha(opacity=60);
        }
        
        div.transbox h1{
            margin: 5%;
            font-weight: bold;
            color: #000000
        }

    </style>
</head>

<body id="img">
<!--    <img src="../../images/Background2.png" id="bg" alt="">-->
<?php require 'navBar.php'?>
        <div class="container">
            <div class="row">
                <div class="column left"> 
                    <div class="transbox">
                        <h1 class="message">SHARE YOUR ART</h1>
                        <h1 class="message">CUSTOMIZE YOUR FEED</h1>
                        <h1 class="message">PROVIDE FEEDBACK TO OTHERS</h1>
                        <br>
                        <h1 class="message2">Join the fans just like you - <br>Create An Account Today!</h1>
            
                    </div>
                </div>
            <div class="column right">   
                <div class="login-container">
                    <div id="output"></div>
                        <div class="avatar fdb">
                            <img class="logo" src="../../images/FandomDBLogo.png" alt="FDBLogo">
                        </div>
                    <?php
    if (isset($_SESSION['message']))
{   echo '<div class="alert alert-danger"><p>';
    echo $_SESSION["message"];
    echo "</p></div>";
    unset($_SESSION['message']);
}
    ?>
                        <div class="form-box">
                            <form action="signup.php" method="post">
                            <p class="createAccount">Create an Account:</p>
                            <input name="firstName" type="text" placeholder="First Name">
                            <input name="lastName" type="text" placeholder="Last Name">
                            <input name="username" type="text" placeholder="Username">
                            <input name="email" type="email" placeholder="e-mail">
                            <input name="birthday" placeholder="Birthday" type="text" onfocus="(this.type='date')" onblur="(this.type='text')" id="date">
                            <input name="password" type="password" placeholder="password">
                            <input name="passwordConfirmation" type="password" placeholder="confirm password">
                            <button class="btn btn-info btn-block login" type="submit">Create Account</button>
                        </form>

                            <br>
<!--                            change the below href eventually-->
                            <a href="http://ec2-54-208-194-246.compute-1.amazonaws.com/CapstoneProject/loginPage.html" class="login">Already have an Account?</a>
                        </div>
                </div>
            </div>
            <div class="column middle">
            
            </div>
        </div>
        </div>
</body>