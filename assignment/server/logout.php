<?php
session_start();

unset($_SESSION['login']);

echo "You have logged out, you cannot access to the <a href='http://titan.csit.rmit.edu.au/~s3711351/assignment/client/shoppingCart.php'>content page</a> right now";

echo "<br/><br/>Go <a href='http://titan.csit.rmit.edu.au/~s3711351/assignment/'>back</a>";

?>