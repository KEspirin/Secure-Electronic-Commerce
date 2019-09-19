
function hash() {
    // get user input
    var input = document.getElementById('password').value;

    // call sha256 hash function
    var hash = SHA256.hash(input);

    document.getElementById('hashpw').value = hash;
}


function validate() {
    username = document.getElementById('username').value;
    password = document.getElementById('password').value;
    if (username == "") {
        document.getElementById('submitbtn').disabled = true;
        document.getElementById('namevalid').innerHTML = "Username must be filled out";
    } else {
        document.getElementById('submitbtn').disabled = false;
        document.getElementById('namevalid').innerHTML = "";
    }

    if (password.length < 6) {
        document.getElementById('submitbtn').disabled = true;
        document.getElementById('pwvalid').innerHTML = "Password need to be at least 6-digit long";
    } else {
        document.getElementById('submitbtn').disabled = false;
        document.getElementById('pwvalid').innerHTML = "";
    }
}
