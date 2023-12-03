document.addEventListener('DOMContentLoaded', function() {
    const form = document.getElementById('registrationForm');
    const fullname = document.getElementById('fullname');
    const username = document.getElementById('username');
    const genderRadios = document.querySelectorAll('input[name="gender"]');
    const email = document.getElementById('email');
    const password = document.getElementById('password');
    const confirmPassword = document.getElementById('confirm_password');
    const phoneNumber = document.getElementById('phonenumber');
    const errorElements = document.querySelectorAll('.error');
             
    function setButtonState(condition) {
        const button = document.getElementById('button');
        button.disabled = !condition; // If condition is true, button is enabled, else disabled
    }   

    form.addEventListener('submit', function(e) {
        // Initially assume there are no errors
        let errorOccurred = false;

        // Full name validation
        if (!fullname.value.trim() || fullname.value.trim().split(/\s+/).length < 2) {
            errorElements[0].innerText = 'Full name must include both first name and last name';
            errorOccurred = true;
        } else {
            errorElements[0].innerText = '';
        }

        // Username validation
        if (!username.value.trim()) {
            errorElements[1].innerText = 'Username is required';
            errorOccurred = true;
        } else {
            errorElements[1].innerText = '';
        }

        // Gender validation
        if (![...genderRadios].some(radio => radio.checked)) {
            errorElements[2].innerText = 'Gender is required';
            errorOccurred = true;
        } else {
            errorElements[2].innerText = '';
        }

        // Email validation
        if (!email.value.trim()) {
            errorElements[3].innerText = 'Email is required';
            errorOccurred = true;
        } else if (!email.value.includes('@')) {
            errorElements[3].innerText = 'Please enter a valid email';
            errorOccurred = true;
        } else {
            errorElements[3].innerText = '';
        }

        // Password validation
        if (password.value.length <= 6) {
            errorElements[4].innerText = 'Password must be longer than 6 characters';
            errorOccurred = true;
        } else if (password.value.length >= 20) {
            errorElements[4].innerText = 'Password must be less than 20 characters';
            errorOccurred = true;
        } else if (password.value.toLowerCase() === 'password') {
            errorElements[4].innerText = 'Password must be atleast 8 characters, 1 uppercase, 1 lowercase, 1 number, 1 special character';
            errorOccurred = true;
        } else {
            errorElements[4].innerText = '';
        }

        // Confirm Password validation
        if (confirmPassword.value !== password.value) {
            errorElements[5].innerText = 'Password does not match';
            errorOccurred = true;
        } else {
            errorElements[5].innerText = '';
        }

        // Phone Number validation
        // Simple validation to check if the field is not empty
        // You can add more complex regex checks to validate phone number formats
        if (!phoneNumber.value.trim()) {
            errorElements[6].innerText = 'Phone number must be in the format of (---) --- ----';
            errorOccurred = true;
        } else {
            errorElements[6].innerText = '';
        

     
        }
        
    });
});