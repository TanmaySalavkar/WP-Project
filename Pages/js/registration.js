function validateForm(event) {
    event.preventDefault();

    var username = document.getElementById('username').value;
    var email = document.getElementById('email').value;
    var password = document.getElementById('password').value;
    var confirmPassword = document.getElementById('confirmPassword').value;

    var errorDiv = document.getElementById('error');

    
    if (username === '' || email === '' || password === '' || confirmPassword === '') {
        errorDiv.innerHTML = 'All fields are required.';
    } else if (password !== confirmPassword) {
        errorDiv.innerHTML = 'Passwords do not match.';
    } else {
      
        alert('Registration successful!');
        errorDiv.innerHTML = '';
    }
}
