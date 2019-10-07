<?php include('rsa.php');?>

<?php
    session_start();
?>

<html>

<body>
    <?php
    
    //Receive input from clint side
    $username = $_POST['username'];
    $password = $_POST['encrypted'];
    
    //check if the input exist
    $exist = 0;
    

    //read the file line by line
    $file = fopen("../database/database.txt","r");
        while(!feof($file))  {

            // get a line without the last “newline” character
            $line = explode(",",trim(fgets($file)),2);

            //compare the content of the input and the line 
            if($line[0] == $username && $username != ""){
                
                $privateKey = get_rsa_privatekey('private.key');
                $decrypted = rsa_decryption($password, $privateKey);
                $split_value = explode("&", $decrypted);
                $timestamp = time();

                if($line[1] == $split_value[0] && $timestamp - $split_value[1] <= 150000){
                    $exist = 1;
                }
            }
        }
        fclose($file);

        if($exist == 1){
            echo "login Sucessful! <br/><br/>Go <a href='http://titan.csit.rmit.edu.au/~s3711351/Lab9/client'>back</a> to register, login or check the users.txt";
        }else{
            echo "Invalid username or password <br/><br/>Please try again via <a href='./client/login.html'>login.html</a><br/><br/> or go <a href='http://titan.csit.rmit.edu.au/~s3711351/Lab9/client'>back</a> to register, try again or check the users.txt";
        }
    ?>
</body>

</html>