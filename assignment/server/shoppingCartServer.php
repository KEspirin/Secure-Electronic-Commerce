<?php
session_start();
if (!isset($_SESSION['login'])) {
    header('Location: ../client/index.html');
}

unset($_SESSION['login']);
include('des.php');
include('rsa.php');
?>

<html>

<body>
    <h3>Confirmation of Your Order</h3>

    <?php 
        // decrypt the des key
        $encDesKey = $_POST['DES_Encryption_Key'];
        $privateKey = get_rsa_privatekey('private.key');
        $desKey = rsa_decryption($encDesKey, $privateKey);

        // decrypt the credit card number
        $encCCNO = $_POST['creditCard'];
        $CCNO = php_des_decryption($encCCNO, $desKey);
         


        //open a file named "text.txt";
        $file = fopen("../database/orders.txt", "a");
        $anything = "\n ---------------------------------------------------------------------------";
        fwrite($file,$anything);
        $anything = $_POST['aquantity'];
        fwrite($file,$anything);
        $anything = ",";
        fwrite($file,$anything);
        $anything = $_POST['asubtotal'];
        fwrite($file,$anything);
        $anything = "\n productb,15,";
        fwrite($file,$anything);
        $anything = $_POST['bquantity'];
        fwrite($file,$anything);
        $anything = ",";
        fwrite($file,$anything);
        $anything = $_POST['bsubtotal'];
        fwrite($file,$anything);
        $anything = "\n productc,20,";
        fwrite($file,$anything);
        $anything = $_POST['cquantity'];
        fwrite($file,$anything);
        $anything = ",";
        fwrite($file,$anything);
        $anything = $_POST['csubtotal'];
        fwrite($file,$anything);
        $anything = "\n";
        fwrite($file,$anything);
        //close the "$file"
        fclose($file);
    ?>
    <br/><br/>

    <table cellspacing="30" onchange="update()">
            <tr>
                <td>Products</td>
                <td>Price</td>
                <td>Quantity</td>
                <td>Subtotal</td>
            </tr>


            <tr>
                <td><input type="hidden" id="aname" name="aname" value="producta">Product A</td>
                <td><input type="hidden" id="aprice" name="aprice" value="10">$10</td>
                <td><?php echo $_POST['aquantity']; ?></td>
                <td><?php echo $_POST['asubtotal']; ?></td>
            </tr>

            <tr>
                <td><input type="hidden" id="bname" name="bname" value="productb">Product B</td>
                <td><input type="hidden" id="bprice" name="bprice" value="15">$15</td>
                <td><?php echo $_POST['bquantity']; ?></td>
                <td><?php echo $_POST['bsubtotal']; ?></td>
            </tr>
            <tr>
                <td><input type="hidden" id="cname" name="cname" value="productc">Product C</td>
                <td><input type="hidden" id="cprice" name="cprice" value="20">$20</td>
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
        <textarea readonly><?php echo $_POST['DES_Encryption_Key']; ?></textarea>
        <span>Recovered DES Key:<?php echo $desKey; ?></span><br>
        <span>Received Encrypted Credit Card Number:<?php echo $_POST['creditCard']; ?></span><br>
        <span>Recovered Credit Card Number:<?php echo $CCNO; ?></span><br>
        <p>You can now go to <a href="../database/orders.txt">database</a> to check this order information.</p>







    

</body>

</html>