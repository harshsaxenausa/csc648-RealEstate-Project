// form validation for register.php
window.addEventListener('load', () => {
    document.getElementById('form').onsubmit = validate;

    function validate(e) {

        if (document.getElementById("email_register").value.split('@')[1] !== 'mail.sfsu.edu') {
            alert('you must register with an SFSU email address');
            e.preventDefault();
            return false;
        }

        // validate emails match
        if (document.getElementById("email_register").value !== document.getElementById("email_confirm_register").value) {
            alert('emails do not match, please reverify your email');
            e.preventDefault();
            return false;
        }


        // validate passwords match
        if (document.getElementById("password_register").value !== document.getElementById("password_confirm_register").value) {
            alert('passwords do not match, please re-enter your password');
            e.preventDefault();
            return false;
        }


    }

})
