<?php
session_start();

unset($_SESSION['login']);

echo "You have logged out, you cannot access to the <a href='http://titan.csit.rmit.edu.au/~s3711351/assignment/client/shoppingCart.php'>content page</a> right now";

echo "<br/><br/>If you try to access to the content page without login successful, you will be redirect to <a href='http://titan.csit.rmit.edu.au/~s3711351/assignment/client/index.html'>index.html</a> page";

?>