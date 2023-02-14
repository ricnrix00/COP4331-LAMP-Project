// when entered key is pressed submit form
document.addEventListener('keyup', function (event) {
    if (event.code === 'Enter') {
        verifyLogin();
    }
});

function verifyLogin() {
    let userName = document.getElementById("username").value;
    let pass = document.getElementById("password").value;

    if ((userName == "") || (pass == "")) {
        document.getElementById("missingInfo").innerHTML = "All fields required*";
        document.getElementById("missingInfo").style.color = 'red';
        return;
    }
}