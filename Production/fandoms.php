<?php 

//parse out the php and test it
require 'db_credentials.php';
require 'loggedInCheck.php';
require 'dbConnUserForNav.php';

function multipleResultQuery($conn,$query){
    if($result = $conn->query($query)){
        return $result;
    }
    else {
        print "Error: " . $query . "<br>" . $conn->error;
    }
    
}


$fandomListSQL = "SELECT title FROM Fandom";
$fandomList = multipleResultQuery($conn,$fandomListSQL);
$htmlList = '';
while ($row = $fandomList->fetch_row()) {
            $htmlList .= '<dt class="links"><a href="http://ec2-54-208-194-246.compute-1.amazonaws.com/Production/articles.php?title='.$row[0].'">'.$row[0].' </a></dt>';
        }


?>
<!DOCTYPE html>
<html>
<head>
<title>IT4970</title>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    
    <style>

        .navColor{
            background-color: #84CEEB;
            border-color:#84CEEB;
            color: black;
        }
        
        .navWords{
            color: black;
        }
        img{
            height: 50px;
            width: 200px;
            padding-right: 10px;

        }
        .menuDiv{
            height: 51px;
        }
        .pageContent{
            background-color: #C1C8EA;
        }
        h2{
            margin-left: 40px;
        }
        .links{
            margin: 30px;
            float: left;
            height: 75px;
            width: 275px;
        }
        #myInput {
            background-image: url('/css/searchicon.png');
            background-position: 10px 12px;
            background-repeat: no-repeat;
            width: 50%;
            font-size: 16px;
            padding: 12px 20px 12px 40px;
            border: 1px solid #ddd;
/*            margin-bottom: 12px;*/
            margin-left: 40px; 
            margin-top: 20px;
        }

        #myUL {
          list-style-type: none;
          padding: 0;
          margin: 0;
        }

        #myUL li a {
          margin-top: -1px; /* Prevent double borders */
          padding: 12px;
          text-decoration: none;
          font-size: 18px;
          color: black;
          display: block
        }

        #myUL li a:hover:not(.header) {
          color: #8860D0;
        }
        .fullFandomList{
            text-align: center;
            width: 1400px;
        }
        .input{
            text-align: center;
        }

    </style>
    
</head>
<body class="pageContent">   
<?php require 'navBar.php'?>
    <div class="fandoms">
        <h2>Our Fandoms</h2>
        <div class="input">
            <input type="text" id="myInput" onkeyup="myFunction()" placeholder="Search for fandoms..." title="Type in a name">
        </div>
        <div class="fullFandomList">
            <ul id="myUL">
                <li> 
                    <?php echo $htmlList; ?> 
                </li>
            </ul>
        </div>      
    </div>
    
    <script>
        function myFunction() {
            var input, filter, ul, li, a, i;
            input = document.getElementById("myInput");
            filter = input.value.toUpperCase();
            ul = document.getElementById("myUL");
            li = ul.getElementsByTagName("dt");
            for (i = 0; i < li.length; i++) {
                a = li[i].getElementsByTagName("a")[0];
                if (a.innerHTML.toUpperCase().indexOf(filter) > -1) {
                    li[i].style.display = "";
                } else {
                    li[i].style.display = "none";

                }
            }
        }
    </script>
</body>
</html>