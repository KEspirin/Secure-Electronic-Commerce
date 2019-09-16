<?php
include('rsa.php');
?>
<html>

<body>

    <?php

    $ciphertext = $_POST['ciphertext'];
    $privateKey = get_rsa_privatekey('private.key');
    $plaintext = rsa_decryption($ciphertext, $privateKey);
    $file = fopen("../database/database.txt", "a");
    fwrite($file, $plaintext . "\n");

    echo "<h1>Lab 8 Server: PHP RSA test</h1>
    <p>Received encrypted Message:</p>";
    echo $ciphertext . "<br/><br/>";
    echo "<p>Recovered plaintext message:<p>" . $plaintext . "<br/>";
    echo "The recovered message is added to the ../datebase/database.txt. <br/><br/>
    Go <a href='http://titan.csit.rmit.edu.au/~s3711351/Lab8/'>back</a> to check the database.txt";
    ?>


</body>

</html>