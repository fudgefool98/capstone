<?php
session_start();

    if (isset($_SESSION['message']))
{   echo '<div><p>';
    echo $_SESSION["message"];
    echo "</p></div>";
    unset($_SESSION['message']);
}
echo '<div class="form-box">
        <form action="testing.php" method="post">
                            
            <input name="username" type="text" placeholder="Username">
                            
            <button class="btn btn-info btn-block login" type="submit">Create Account</button>
        </form>'
?>