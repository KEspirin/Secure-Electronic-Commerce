<html>
<body>
<?php echo $_POST['entered']; ?>



<div style="background-color:lightgreen">

            <table width="100%">
                <tr>
                    <td>Products</td>
                    <td>Price</td>
                    <td>Quantity</td>
                    <td>Subtotal</td>
                </tr>
            </table>

        </div>

        <table width="100%">
            <tr>
                <td width="29%">Product A</td>
                <td width="17%">$10</td>
                <td width="30%"><p><?php echo $_POST['aquantity']; ?></p></td>
                <td>
                    <p id="atotal"><?php echo $_POST['asubtotal']; ?></p>
                </td>
            </tr>
            <tr>
                <td>Product B</td>
                <td>$15</td>
                <td><?php echo $_POST['bquantity']; ?>
                </td>
                <td>
                    <p id="btotal"><?php echo $_POST['bsubtotal']; ?></p>
                </td>
            </tr>
            <tr>
                <td>Product C</td>
                <td>$20</td>
                <td><?php echo $_POST['cquantity']; ?>
                </td>
                <td>
                    <p id="ctotal"><?php echo $_POST['csubtotal']; ?></p>
                </td>
            </tr>


        </table>

        <div style="background-color:lightgreen">
            <table width="90%">
                <tr>
                    <td width="53%">
                        <p>Total</p>
                    </td>
                    <td width="32%">
                        <p id="totalquantity"><?php echo $_POST['totalnumber']; ?></p>
                    </td>
                    <td>
                        <p id="total"><?php echo $_POST['totalvalue']; ?></p>
                    </td>
                </tr>
            </table>
        </div>





</body>
</html>
