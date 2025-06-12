//validation.js

// Username: 4-12 characters, letters and numbers only
const usernameRegex = /^[a-zA-Z0-9]{4,12}$/;

//Password: 6-20 characters, at least one letter and one number
const passwordRegex = /^(?=.*[A-Za-z])(?=.*\d)[A-Za-z\d]{6,20}$/;

// Validate Login Form
function validateLoginForm(event) {
    const username = document.getElementById('username');
    const password = document.getElementById('password');

    if (!usernameRegex.test(username.value)) {
        alert("Username must be 4-12 characters and contain only letters and numbers.");
        event.preventDefault();
        return false;
    }

    if (!passwordRegex.test(password.value)) {
        alert("Password must be 6-20 characters, include at least one letter and one number.");
        event.preventDefault();
        return false;
    }

    return true;
}

function validateRegisterForm(event) {
    const username = document.getElementById('newuser');
    const password = document.getElementById('newpass');
    const confirm = document.getElementById('confirmpass');

    if (!usernameRegex.test(username.value)) {
        alert("Username must be 4-12 characters and contain only letters and numbers.");
        event.preventDefault();
        return false;
    }

    if (!passwordRegex.test(password.value)) {
        alert("Password must be 6-20 characters, include at least one letter and one number.");
        event.preventDefault();
        return false;
    }

    if (password.value != confirm.value) {
        alert("Passwords do not match.");
        event.preventDefault();
        return false;
    }

    return true;    
}

