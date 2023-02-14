function verifyRegistration()
{
    let fname = document.getElementById("firstName");
    let lname = document.getElementById("lastName");
    let email = document.getElementById("email");
    let userName = document.getElementById("username");
    let pass = document.getElementById("password");
    let phone = document.getElementById("phone");

    if ((fname.value == "") || (lname.value == "") || (email.value == "") || 
        (userName.value == "") || (pass.value == "") || (phone.value == "")) {
        document.getElementById("formCorrection").innerHTML = "All fields required*";
		document.getElementById("formCorrection").style.color = 'red';
        return;
    }
    if (!email.checkValidity())
    {
        document.getElementById("formCorrection").innerHTML = "Provide email with correct format: example@example.com*";
		document.getElementById("formCorrection").style.color = 'red';
    }
    if (!phone.checkValidity())
    {
        document.getElementById("formCorrection").innerHTML = "Provide phone number with correct format: 1234567890*";
		document.getElementById("formCorrection").style.color = 'red';
    }


}