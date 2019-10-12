<?php
include('des.php');
?>
<html>

<body>

    <?php

    $ciphertext = $_POST['ciphertext'];
    $key = $_POST['DES_Encryption_Key'];
    $plaintext = php_des_decryption($key, $ciphertext);
    
    $file = fopen("../database/database.txt", "a");
    fwrite($file, $plaintext . "\n");

    echo "<h1>Lab 7 Server: PHP DES test</h1>
    <p>Received encrypted Message:</p>";
    echo $ciphertext . "<br/><br/>";
    echo "<p>Pre-set decryption key:<p>" . $key . "<br/>";
    echo "<p>Recovered plaintext message:<p>" . $plaintext . "<br/>";
    echo "The recovered message is added to the ../datebase/database.txt. <br/><br/>
    Go <a href='http://titan.csit.rmit.edu.au/~s3711351/Lab7/'>back</a> to check the database.txt";
    ?>


</body>

</html>