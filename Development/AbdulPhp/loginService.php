<?php

    if ($_SERVER['REQUEST_METHOD'] == "POST"){
        // Run your function
        Login();
    }
    function Login(){
        if(empty($_POST['username'])){
            $this->HandleError("Username field is emtpy");
            return false;
        }
        if(empty($_POST['password'])){
            $this->HandleError("Password field is empty");
        }
        //pull the values from the fields and into variables
        $username = $_POST['username'];
        $password = $_POST['password'];

        $userCheck = DBCheck($username, $password);
        //if the connection cannot be made redirect to the error page.
        
        if($userCheck === TRUE){
             //Start a session
            session_start();
            //save session
            $_SESSION['login'] = true;
            $_SESSION['name'] = $username;
            header('Location: mainAnon.html');
            exit;
        }else {
        	//throw error 
        }
    }
    function DBCheck($username,$password){
       
        $servername = "localhost";
        $usrname = "root";
        $passwordDB = "";
        $dbname = "fandom";
        $link = new mysqli($servername, $usrname, $passwordDB, $dbname);

        if($link -> connect_error) {
            die("Connection failed: " . $link->connect_error);
            return false;
        }
        
        $user = mysqli_real_escape_string($link, $username);
        $password = mysqli_real_escape_string($link, $password);
        
        $userQuery = "SELECT passwordHash FROM User WHERE email = '$username'";
        
        $results = mysqli_query($link, $userQuery) or die(mysqli_error());
        
        if(is_null($results)){
            echo("DBCheck failed: 76 <br>");
            print "Error: " . $userQuery . "<br>" . $link->error;
            return false;
        }
        while($row = mysqli_fetch_assoc($results)){
            foreach($row as $cname => $cvalue){
                
                if(!is_null($cvalue)){
                    $result = $cvalue;
                    print "$cname is: $result\t <br>";
                }
            }
            print "\r\n";
        } 
        
        $passwordVerification = password_verify($password, $result);
        
        if($passwordVerification === FALSE){
            return false;
        }
        
       return true;
    }

?>