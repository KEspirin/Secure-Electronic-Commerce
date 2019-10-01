<?php

session_start();

if(!isset($_SESSION['login'])){
    header('Location: login.html');
}
    
?>
    
<html>
    
<body>
<?php
    echo "<h2>Lab 10 content</h2>";
    echo "Hi! ";
    echo $_SESSION['user'];
    echo "\n Here is the content...";

    echo "<form action=\"../server/logout.php\" method=\"POST\"><button type=\"submit\">Logout</button></form>";

    ?>
</body>

</html>