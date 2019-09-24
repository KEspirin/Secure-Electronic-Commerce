var pwhash;
var time;

function hash() {
    // get user input
    var input = document.getElementById('password').value;

    // call sha256 hash function
    var hash = SHA256.hash(input);

    pwhash = hash;
}

function getTime() {
    //get current time in Second since Jan 01 1970. (UTC)

    var currentTime = Math.floor(new Date().getTime() / 1000);

    time = currentTime;


}



function encryption() {
    hash();
    getTime();

    var ciphertext = RSA_encryption($pwhash + "&" + $time, pubilc_key);
    document.getElementById('encrypted').value = ciphertext;

}


