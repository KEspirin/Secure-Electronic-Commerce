<?php
session_start();

if (!isset($_SESSION['login'])) {
    header('Location: ../client/login.html');
}
include('des.php');
include('rsa.php');

// decrypt the des key
$encDesKey = $_POST['DES_Encryption_Key'];
$privateKey = get_rsa_privatekey('private.key');
$desKey = rsa_decryption($encDesKey, $privateKey);

// decrypt the credit card number
$encCCNO = $_POST['creditCard'];
$CCNO = php_des_decryption($desKey, $encCCNO);

//open a file named "text.txt";
$file = fopen("../database/orders.txt", "a");

$anything = "\nClient: " . $_SESSION['user'] . "\n";
fwrite($file, $anything);

$anything = "Order Quantity Information:\n";
fwrite($file, $anything);

$anything = "Product A: " . $_POST['aquantity'] . " ($10 each)\n";
fwrite($file, $anything);

$anything = "Product B: " . $_POST['bquantity'] . " ($15 each)\n";
fwrite($file, $anything);

$anything = "Product C: " . $_POST['cquantity'] . " ($20 each)\n";
fwrite($file, $anything);

$anything = "Total Price: " . $_POST['totalvalue'] . "\n";
fwrite($file, $anything);

$anything = "Credit Card Number: " . $CCNO . "\n";
fwrite($file, $anything);

$anything = "---------------------------------------------------------------------------";
fwrite($file, $anything);

//close the "$file"
fclose($file); 

?>

<html>

<body>
    <h3>Confirmation of Your Order</h3>

    <br />

    <table cellspacing="30">
        <tr>
            <td>Products</td>
            <td>Price</td>
            <td>Quantity</td>
            <td>Subtotal</td>
        </tr>


        <tr>
            <td>Product A</td>
            <td>$10</td>
            <td><?php echo $_POST['aquantity']; ?></td>
            <td><?php echo $_POST['asubtotal']; ?></td>
        </tr>

        <tr>
            <td>Product B</td>
            <td>$15</td>
            <td><?php echo $_POST['bquantity']; ?></td>
            <td><?php echo $_POST['bsubtotal']; ?></td>
        </tr>
        <tr>
            <td>Product C</td>
            <td>$20</td>
            <td><?php echo $_POST['cquantity']; ?></td>
            <td><?php echo $_POST['csubtotal']; ?></td>
        </tr>

        <tr>
            <td>
                <p>Total</p>
            </td>
            <td></td>
            <td><?php echo $_POST['totalnumber']; ?></td>
            <td><?php echo $_POST['totalvalue']; ?></td>
        </tr>
    </table>
    <br><br>
    <p>Received Encrypted DES Key:</p>
    <textarea readonly cols="80" rows="10"><?php echo $_POST['DES_Encryption_Key']; ?></textarea><br>
    <span>Recovered DES Key:<?php echo $desKey; ?></span><br>
    <span>Received Encrypted Credit Card Number:<?php echo $_POST['creditCard']; ?></span><br>
    <span>Recovered Credit Card Number:<?php echo $CCNO; ?></span><br>
    <!-- <p>You can now go to <a href="../database/orders.txt">database</a> to check this order information.</p> -->

    <form action="logout.php" method="POST"><button type="submit">Logout</button></form>

</body>

</html>