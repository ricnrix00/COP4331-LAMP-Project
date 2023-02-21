// when entered key is pressed submit form
document.addEventListener('keyup', function (event) {
    if (event.code === 'Enter') {
        verifyEditContact();
    }
});

function verifyEditContact() {
    let fname = document.getElementById("firstName");
    let lname = document.getElementById("lastName");
    let phoneNumber = document.getElementById("phoneNumber");
    let email = document.getElementById("email");

    // checks that all fields were filled out
    if ((fname.value == "") || (lname.value == "") || (phoneNumber.value == "") || 
        (email.value == "")) {
        document.getElementById("formCorrection").innerHTML = "All fields required*";
        document.getElementById("formCorrection").style.color = 'red';
    }

}