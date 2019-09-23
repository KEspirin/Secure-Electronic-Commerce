
function hash() {
    // get user input
    var input = document.getElementById('password').value;

    // call sha256 hash function
    var hash = SHA256.hash(input);

    document.getElementById('hashpw').value = hash;
}

function register(){
    window.open("./register.html","_self");
}

