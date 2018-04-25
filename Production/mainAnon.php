<!--
<?php
require 'db_credentials.php';
require 'loggedInCheck.php';
require 'dbConnUserForNav.php';
?>
-->
<!DOCTYPE html>
<html lang="en">
    <head>
    <title>FandomDB</title>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
        <link href="//netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
        <script src="//netdna.bootstrapcdn.com/bootstrap/3.0.0/js/bootstrap.min.js"></script>
        <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
        <link rel="stylesheet" type="text/css" href="navbar.css">

        <style>
            p {

                font-size: 15px;
                font-weight: 400;
                color: darkslategray;
                margin-bottom: 15px;

            }
            h1, h2, h3, h4, h5, h6 {
                font-weight: 700;
                color: #515769;
                line-height: 1.4;
                margin: 0 0 15px;
            }
            h1 > a, h2 > a, h3 > a, h4 > a, h5 > a, h6 > a {
                color: #515769;
            }
            .margin-b-20 {
                margin-bottom: 20px !important;
            }

            .margin-b-40 {
                margin-bottom: 40px !important;
            }

            .margin-b-50 {
                margin-bottom: 40px !important;
            }
             a:hover {
                color: #999caa;
                text-decoration: none;
            }
            
            .link:active, .link:focus, .link:hover {
                color: white;
            }
            .text-uppercase {
                text-transform: uppercase;
            }
            .link {
                font-size: 13px;
                font-weight: 600;
                color: #5680E9;
            }

            .slogan{
                font-size: 20pt;
            }
            #fandomdb{
/*                text-align: center;*/
                max-width: 100%;
            }

        </style>

    </head>
    <body>  
        
        <?php
            require 'navBar.php';
        ?>
        
        <div class="container latest-product-section">
                <div class="row text-center margin-b-40">
                    <div class="col-sm-6 col-sm-offset-3">
                        <p class="slogan">A Platform for the fans by the fans! Start creating and reading about your favorite Fandoms today!</p>
                        
                        <h3>Latest Products</h3>
                    </div>
                </div>
                <!--// end row -->

                <div class="row">
                    <!-- Latest Products -->
                    <div class="col-sm-4 sm-margin-b-50">
                        <div class="margin-b-20">
                            <img class="img-responsive" src="https://images.pexels.com/photos/288477/pexels-photo-288477.jpeg?w=940&h=650&auto=compress&cs=tinysrgb" alt="Latest Products Image">
                        </div>
                        <h4><a href="#">Content Title</a> <span class="text-uppercase margin-l-20">Fandom Tag</span></h4>
                        <p>Lorem ipsum dolor sit amet consectetur adipiscing elit sed tempor incdidunt ut laboret dolor magna ut consequat siad esqudiat dolor</p>
                        <a class="link" href="#">Read More</a>
                    </div>
                    <!-- End Latest Products -->

                    <!-- Latest Products -->
                    <div class="col-sm-4 sm-margin-b-50">
                        <div class="margin-b-20">
                            <img class="img-responsive" src="https://images.pexels.com/photos/288477/pexels-photo-288477.jpeg?w=940&h=650&auto=compress&cs=tinysrgb" alt="Latest Products Image">
                        </div>
                        <h4><a href="#">Content Title</a> <span class="text-uppercase margin-l-20">Fandom Tag</span></h4>
                        <p>Lorem ipsum dolor sit amet consectetur adipiscing elit sed tempor incdidunt ut laboret dolor magna ut consequat siad esqudiat dolor</p>
                        <a class="link" href="#">Read More</a>
                    </div>
                    <!-- End Latest Products -->

                    <!-- Latest Products -->
                    <div class="col-sm-4 sm-margin-b-50">
                        <div class="margin-b-20">
                            <img class="img-responsive" src="https://images.pexels.com/photos/288477/pexels-photo-288477.jpeg?w=940&h=650&auto=compress&cs=tinysrgb" alt="Latest Products Image">
                        </div>
                        <h4><a href="#">Content Title</a> <span class="text-uppercase margin-l-20">Fandom Tag</span></h4>
                        <p>Lorem ipsum dolor sit amet consectetur adipiscing elit sed tempor incdidunt ut laboret dolor magna ut consequat siad esqudiat dolor</p>
                        <a class="link" href="#">Read More</a>
                    </div>
                    <!-- End Latest Products -->
                </div>
                <!--// end row -->
            </div>
    </body>
</html>
