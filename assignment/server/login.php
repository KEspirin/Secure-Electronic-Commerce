<?php
    session_start();
?>


<html>
<body>
    <?php
    
    //Receive input from clint side
    $username = $_POST['username'];
    $password = $_POST['hashpw'];
    
    //check if the input exist
    $exist = 0;           
    
    //read the file line by line
    $file = fopen("../database/users.txt","r");
        while(!feof($file))  {

            // get a line without the last “newline” character
            $line = explode(",",trim(fgets($file)),2);

            //compare the content of the input and the line 
            if($line[0] == $username && $username != "" && $line[1] == $password && $password != ""){
                $exist = 1;
            }
        }
        fclose($file);

        if($exist == 1){
            $_SESSION['login'] = "YES";
            $_SESSION['user'] = $username;
            header('Location: ../client/shoppingCart.php');
            echo "login Sucessful! <br/><br/>Go <a href='http://titan.csit.rmit.edu.au/~s3711351/assignment/client/index.html'>back</a>";
        }else{
            echo "Invalid username or password <br/><br/>Please try again via <a href='../client/index.html'>index.html</a><br/><br/> or go <a href='http://titan.csit.rmit.edu.au/~s3711351/assignment/client/register.html'>register.html</a> to register.";
        }
    ?>
</body>

</html>