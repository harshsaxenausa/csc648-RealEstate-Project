// form validation for register.php

function validate(e) {

    // validate emails match
    if (document.getElementById("email").value.toString() !== document.getElementById("confirm_email").value.toString()) {
        alert('email not the same, change way to notify user of this error');
        e.preventDefault();
        return false;
    }


    // validate passwords match
    if (document.getElementById("confirm_password").value.toString() !== document.getElementById("confirm_password").value.toString()) {
        alert('pass not the same, change way to notify user of this error');
        e.preventDefault();
        return false;
    }


}
