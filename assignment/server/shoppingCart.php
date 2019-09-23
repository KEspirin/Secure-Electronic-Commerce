<html>

<body>We assume there is a table in the database, named text.txt
    <br/><br/>

    <?php 
    //open a file named "text.txt";
    $file = fopen("test.txt", "a");
    $anything = "\n producta,10,";
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

</body>

</html>