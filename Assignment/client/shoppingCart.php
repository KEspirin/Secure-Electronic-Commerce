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

    <?php
        echo "<h3>";
        echo $_SESSION['user'];
        echo "'s Shpping Cart</h3>";
    ?>

    <FORM ACTION="../server/shoppingCart.php" method="POST">
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
                <td><input min="0" type="number" id="aquantity" name="aquantity" style="width:30px" value="0"></td>
                <td>
                    <p id="atotal"> 0</p>
                    <input type="hidden" id="asubtotal" name="asubtotal" value=0>
                </td>
            </tr>

            <tr>
                <td><input type="hidden" id="bname" name="bname" value="productb">Product B</td>
                <td><input type="hidden" id="bprice" name="bprice" value="15">$15</td>
                <td><input min="0" type="number" id="bquantity" name="bquantity" style="width:30px" value="0">
                </td>
                <td>
                    <p id="btotal"> 0</p>
                    <input type="hidden" id="bsubtotal" name="bsubtotal" value=0>
                </td>
            </tr>
            <tr>
                <td><input type="hidden" id="cname" name="cname" value="productc">Product C</td>
                <td><input type="hidden" id="cprice" name="cprice" value="20">$20</td>
                <td><input min="0" type="number" id="cquantity" name="cquantity" style="width:30px" value="0">
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

            <tr>
                <td></td>
                <td></td>
                <td></td>
                <td><button type="submit">Submit</button></td>
            </tr>
        </table>

    </FORM>

    <script>
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
    </script>

</body>

</html>