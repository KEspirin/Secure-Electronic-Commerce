<html>

<body>
    <?php
    
    //Receive input from clint side
    $username = $_POST['username'];
    $password = $_POST['password'];
    
    //check if the input exist
    $exist = 0;           
    
    //read the file line by line
    $file = fopen("users.txt","r");
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
            echo "login Sucessful! <br/><br/>Go <a href='http://titan.csit.rmit.edu.au/~s3711351/Lab5/'>back</a> to register, login or check the users.txt";
        }else{
            echo "Invalid username or password <br/><br/>Please try again via <a href='login.html'>login.html</a><br/><br/> or go <a href='http://titan.csit.rmit.edu.au/~s3711351/Lab5/'>back</a> to register, try again or check the users.txt";
        }
    ?>
</body>

</html>