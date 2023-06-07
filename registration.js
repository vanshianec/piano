const form = document.getElementById('registration-form')

form.addEventListener("submit", (event) => {
    event.preventDefault();

    const email = document.getElementById("email");
    const password = document.getElementById("password");
    const confirmPassword = document.getElementById("confirm-password");
    const emailError = document.getElementById('email-error');
    const passwordError = document.getElementById('password-error');
    const confirmPasswordError = document.getElementById('confirm-password-error');
    let errors = false;

    if (email.value === "") {
        emailError.display = 'block';
        emailError.innerText = 'Имейлът не може да бъде празен';
        errors = true;
    } else {
        emailError.display = 'none';
        emailError.innerText = ''
    }

    if (password.value.length < 6) {
        passwordError.display = 'block';
        passwordError.innerText = 'Паролата трябва да бъде поне 6 символа';
        errors = true;
    } else {
        passwordError.display = 'none';
        passwordError.innerText = '';
    }

    if (password.value !== confirmPassword.value) {
        confirmPasswordError.display = 'block';
        confirmPasswordError.innerText = 'Паролите трябва да съвпадат'
        errors = true;
    } else {
        confirmPasswordError.display = 'none';
        confirmPasswordError.innerText = '';
    }

    if (!errors) {
        form.submit();
    }
});
