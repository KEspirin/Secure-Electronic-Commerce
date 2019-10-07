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
            if($line[0] == $username){
                $exist = 1;
                break;
            }
        }
        fclose($file);

        if($exist == 1){
            echo "The user is already exist! <br/><br/>Go 
            <a href='http://titan.csit.rmit.edu.au/~s3711351/Assignment/client/index.html'>back</a> to login.";
        }else{

        //open a file named "database.txt"
            $file = fopen("../database/users.txt","a");
        //insert this input (plus a newline) into the database.txt
            fwrite($file,$username);
            fwrite($file,",");
            fwrite($file,$password."\n");
        //close the "$file"
            fclose($file);

        // create a file named after the username to store shopping cart info
            $shoppingCart = "../database/".$username.".txt";
            $shoppingCartdb = fopen($shoppingCart,"w");
            fclose($shoppingCart);

            
            echo "Registration Succeed! <br/><br/>Go 
            <a href='http://titan.csit.rmit.edu.au/~s3711351/Assignment/client/index.html'>back</a> to login";
        }
    ?>
</body>

</html>