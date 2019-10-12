<?php

session_start();

if (!isset($_SESSION['login'])) {
    header('Location: index.html');
}
?>

<html>

<head>
    <style>
        td {
            padding-left: 50px;
            padding-right: 50px;
        }
    </style>
</head>

<body>

    <h3><?php echo $_SESSION['user'] ?>'s Shpping Cart</h3>
    <form action="../server/logout.php" method="POST"><button type="submit">Logout</button></form>

    <FORM ACTION="../server/shoppingCartServer.php" method="POST">


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
                <td>
                    <input min="0" type="number" id="aquantity" name="aquantity" style="width:30px" value="0">
                </td>
                <td>
                    <p id="atotal"> 0</p>
                    <input type="hidden" id="asubtotal" name="asubtotal" value=0>
                </td>
            </tr>

            <tr>
                <td><input type="hidden" id="bname" name="bname" value="productb">Product B</td>
                <td><input type="hidden" id="bprice" name="bprice" value="15">$15</td>
                <td>
                    <input min="0" type="number" id="bquantity" name="bquantity" style="width:30px" value="0">
                </td>
                <td>
                    <p id="btotal"> 0</p>
                    <input type="hidden" id="bsubtotal" name="bsubtotal" value=0>
                </td>
            </tr>
            <tr>
                <td><input type="hidden" id="cname" name="cname" value="productc">Product C</td>
                <td><input type="hidden" id="cprice" name="cprice" value="20">$20</td>
                <td>
                    <input min="0" type="number" id="cquantity" name="cquantity" style="width:30px" value="0">
                </td>
                <td>
                    <p id="ctotal"> 0</p>
                    <input type="hidden" id="csubtotal" name="csubtotal" value=0>
                </td>
            </tr>

            <tr>
                <td>
                    <p>Total</p>
                </td>
                <td></td>
                <td>
                    <p id="totalquantity">0</p>
                    <input type="hidden" id="totalnumber" name="totalnumber" value=0>
                </td>
                <td>
                    <p id="total">0</p>
                    <input type="hidden" id="totalvalue" name="totalvalue" value=0>
                </td>
            </tr>

            <tr></tr>

            <tr>
                <td>Your DES Key:</td>
                <td colspan="3"><textarea id="DES_Encryption_Key" name="DES_Encryption_Key" placeholder="Please Enter Your DES Key Here" cols="50" rows="1" style="resize:none"></textarea></td>
            </tr>

            <tr>
                <td>Credit Card Number:</td>
                <td colspan="3">
                    <textarea id="creditCard" name="creditCard" placeholder="Credit Card info" cols="50" rows="1" style="resize:none"></textarea>
                </td>
            </tr>

            <tr>
                <td></td>
                <td></td>
                <td></td>
                <td><button type="submit" onclick="encryption()">Submit</button></td>
            </tr>
        </table>

    </FORM>

    <script type="text/javascript" src="js/des.js"></script>
    <script type="text/javascript" src="js/rsa.js"></script>
    <script type="text/javascript">
        // call the encryption methods, order matters
        function encryption(){
            DES_encryption();
            RSA_encryption();
        }

        // to automaticaly update the shopping cart quantity and price
        function update() {
            var atotal = document.getElementById("aquantity").value * 10;
            var btotal = document.getElementById("bquantity").value * 15;
            var ctotal = document.getElementById("cquantity").value * 20;
            var quantity = Number(document.getElementById("aquantity").value) + Number(document.getElementById("bquantity").value) + Number(document.getElementById("cquantity").value);
            var total = Number(atotal) + Number(btotal) + Number(ctotal);

            document.getElementById("atotal").innerHTML = atotal;
            document.getElementById("asubtotal").value = atotal;

            document.getElementById("btotal").innerHTML = btotal;
            document.getElementById("bsubtotal").value = btotal;

            document.getElementById("ctotal").innerHTML = ctotal;
            document.getElementById("csubtotal").value = ctotal;

            document.getElementById("totalquantity").innerHTML = quantity;
            document.getElementById("totalnumber").value = quantity;

            document.getElementById("total").innerHTML = total;
            document.getElementById("totalvalue").value = total;
        }

        function DES_encryption() {
            let plaintext = document.getElementById("creditCard").value;
            var key = document.getElementById("DES_Encryption_Key").value;

            // javascript des encryption api
            var encrypted = javascript_des_encryption(key, message);

            document.getElementById("creditCard").value = encrypted;

        }

        function RSA_encryption() {

            var DES_Encryption_Key = document.getElementById("DES_Encryption_Key").value;
            var pubilc_key = "-----BEGIN PUBLIC KEY-----MIIBIjANBgkqhkiG9w0BAQEFAAOCAQ8AMIIBCgKCAQEAzdxaei6bt/xIAhYsdFdW62CGTpRX+GXoZkzqvbf5oOxw4wKENjFX7LsqZXxdFfoRxEwH90zZHLHgsNFzXe3JqiRabIDcNZmKS2F0A7+Mwrx6K2fZ5b7E2fSLFbC7FsvL22mN0KNAp35tdADpl4lKqNFuF7NT22ZBp/X3ncod8cDvMb9tl0hiQ1hJv0H8My/31w+F+Cdat/9Ja5d1ztOOYIx1mZ2FD2m2M33/BgGY/BusUKqSk9W91Eh99+tHS5oTvE8CI8g7pvhQteqmVgBbJOa73eQhZfOQJ0aWQ5m2i0NUPcmwvGDzURXTKW+72UKDz671bE7YAch2H+U7UQeawwIDAQAB-----END PUBLIC KEY-----";
            // Encrypt with the public key...
            var encrypt = new JSEncrypt();
            encrypt.setPublicKey(pubilc_key);
            var encrypted = encrypt.encrypt(DES_Encryption_Key);

            document.getElementById("DES_Encryption_Key").value = encrypted;
        }



    </script>

</body>

</html>