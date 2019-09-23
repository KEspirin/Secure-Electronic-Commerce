
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