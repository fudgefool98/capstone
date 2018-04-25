<?php
    session_start();
?>

<!DOCTYPE html>
<html>
    <head>
        <title>Edit Profile</title>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
        <script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
        <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
        <link rel="stylesheet" type="text/css" href="userPage.css">
        <link rel="stylesheet" type="text/css" href="navbar.css">
        <style>
            .textAreaStyle{
                border-radius: 5pt;
                border-color: lightgray;
            }

            .blankUserPic{
                width: 250px;
                height: 250px;
                border-color: lightgray;
                border-radius: 15%;
            }
            .userStatus{
                border: 5pt;
                border-color: #5680E9;
                color: #5680E9;
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
<!--        Left of the page that holds photo and upload photo-->
        <div class="container">
        <h1>Edit Profile</h1>
        <hr>
        <div class="row">
          <!-- left column -->
          <div class="col-md-3">
            <div class="text-center">
              <img class="blankUserPic" src="images/blankUser.png" class="avatar img-circle" alt="avatar">
              <h6>Upload a different photo...</h6>
              <input type="file" class="form-control">
            </div>
          </div>

          <!-- edit form column -->
          <div class="col-md-9 personal-info">
            <div class="alert alert-info alert-dismissable">
              <a class="panel-close close" data-dismiss="alert">×</a> 
              <i class="fa fa-coffee"></i>
                These Changes will show on your<strong> Profile</strong>. Passwords are <strong>only</strong> visable to you, and <strong>cannot</strong> be seen by other users.
            </div>
               <?php
                if(isset($_SESSION['errorMessage'])){
                    echo '<div class="alert alert-danger"><p>';
                    echo $_SESSION["errorMessage"];
                    echo "</p></div>";
                    unset($_SESSION['errorMessage']);
                }
              
              if(isset($_SESSION['firstName'])){
                    echo '<div class="alert alert-danger"><p>';
                    echo $_SESSION["firstName"];
                    echo "</p></div>";
                    unset($_SESSION['firstName']);
                }
            ?>
              
            <h3>Account Settings</h3>
              <hr>
            <form class="form-horizontal" action="editProfileService.php" role="form" method="post">
              <div class="form-group">
                <label class="col-lg-3 control-label">Email:</label>
                <div class="col-lg-8">
                  <input class="form-control" type="text" placeholder="email@yourcompany.com" name="email">
                </div>
              </div>
              <div class="form-group">
                <label class="col-lg-3 control-label">Username:</label>
                <div class="col-lg-8">
                  <input class="form-control" type="text" placeholder="username" name="username">
                </div>
              </div>
              <div class="form-group">
                <label class="col-lg-3 control-label">Password:</label>
                <div class="col-lg-8">
                  <input class="form-control" type="password" placeholder="password" name="password">
                </div>
              </div>
              <div class="form-group">
                <label class="col-lg-3 control-label">Confirm Password:</label>
                <div class="col-lg-8">
                  <input class="form-control" type="password" placeholder="confirm password" name="confirmPassword">
                </div>
                  <br>
                  <br>
                  <br>
                  <br>
              </div>
            
            <h3>Profile Setting</h3> 
              <hr>
              <div class="form-group">
                <label class="col-md-3 control-label">First Name:</label>
                <div class="col-md-8">
                  <input class="form-control" type="text" placeholder="First Name" name="fname">
                </div>
              </div>
              <div class="form-group">
                <label class="col-md-3 control-label">Last Name:</label>
                <div class="col-md-8">
                  <input class="form-control" type="text" placeholder="Last Name" name="lname">
                </div>
              </div>
              <div class="form-group">
                <label class="col-md-3 control-label">About:</label>
                <div class="col-md-8">
                    <textarea rows="5" cols="50" name="about" placeholder="Tell everyone a little bit about you!" class="textAreaStyle"></textarea>
                </div>
                  <br>
                  <br>
                  <br>
                  <br>
              </div>
                
              <h3>Social Media</h3> 
              <hr>
                <div class="form-group">
                    <label class="col-md-3 control-label">Twitter:</label>
                    <div class="col-md-8">
                      <input class="form-control" type="password" placeholder="Twitter" name="twitter">
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-md-3 control-label">Facebook:</label>
                    <div class="col-md-8">
                      <input class="form-control" type="password" placeholder="Facebook" name="facebook">
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-md-3 control-label">Instagram:</label>
                    <div class="col-md-8">
                      <input class="form-control" type="password" placeholder="Instagram" name="instagram">
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-md-3 control-label">Snapchat:</label>
                    <div class="col-md-8">
                      <input class="form-control" type="password" placeholder="Snapchat" name="snapchat">
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-md-3 control-label">Tumblr:</label>
                    <div class="col-md-8">
                      <input class="form-control" type="password" placeholder="Tumblr" name="tumblr">
                    </div>
                </div>
                  <br>
                  <br>
                  <br>
                  <br>
              <div class="form-group">
                <label class="col-md-3 control-label"></label>
                <div class="col-md-8">
                    <button type="submit" class="btn btn-primary" formaction=" editProfileService.php">Save Changes</button>
                  <span></span>
                  <input type="reset" class="btn btn-default" value="Cancel">
                </div>
              </div>
            </form> <!-- end form -->
          </div> <!--end edit form colum-->
          </div>
        </div>
        <hr>
    </body>
</html>