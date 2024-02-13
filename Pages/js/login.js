function validateLoginForm(event) {
    event.preventDefault();

    var username = document.getElementById('username').value;
    var password = document.getElementById('password').value;

    var loginErrorDiv = document.getElementById('loginError');

   
    if (username === '' || password === '') {
        loginErrorDiv.innerHTML = 'All fields are required.';
    } else {
       
        if (username === 'user' && password === 'password') {
            alert('Login successful!');
            loginErrorDiv.innerHTML = '';
        } else {
            loginErrorDiv.innerHTML = 'Invalid username or password.';
        }
    }
}

function showForgotPassword() {
    var forgotPasswordContainer = document.getElementById('forgotPasswordContainer');
    forgotPasswordContainer.style.display = 'block';
}

function recoverPassword() {
    var forgotEmail = document.getElementById('forgotEmail').value;

   
    alert('Password recovery email sent to ' + forgotEmail);
}
