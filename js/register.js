// when entered key is pressed submit form
document.addEventListener('keyup', function (event) {
    if (event.code === 'Enter') {
        verifyRegistration();
    }
});

function verifyRegistration() {
    let fname = document.getElementById("firstName");
    let lname = document.getElementById("lastName");
    let userName = document.getElementById("username");
    let pass = document.getElementById("password");
    let repeatPass = document.getElementById("repeatPassword");

    // checks that all fields were filled out
    if ((fname.value == "") || (lname.value == "") || (userName.value == "") || 
        (pass.value == "") || (repeatPass.value == "")) {
        document.getElementById("formCorrection").innerHTML = "All fields required*";
        document.getElementById("formCorrection").style.color = 'red';
        return;
    }

    if (pass.value != repeatPass.value)
    {
        document.getElementById("formCorrection").innerHTML = "Password don't match*";
        document.getElementById("formCorrection").style.color = 'red';
        return;
    }


}