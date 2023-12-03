var errorFields = ['fullname', 'username', 'gender', 'email', 'password', 'confirm_password', 'phonenumber'];

errorFields.forEach(function(fieldName) {
    document.getElementById(fieldName + '-error').innerHTML = '';
});
        document.addEventListener('DOMContentLoaded', function() {
            // Add validation function
            function validateForm() {
                var fullname = document.getElementById('fullname').value;
                var username = document.getElementById('username').value;
                var gender = document.querySelector('input[name="gender"]:checked');
                var email = document.getElementById('email').value;
                var password = document.getElementById('password').value;
                var confirmPassword = document.getElementById('confirm_password').value;
                var phoneNumber = document.getElementById('phonenumber').value;

                // Clear previous errors
                var errorElements = document.querySelectorAll('.error');
                errorElements.forEach(function(element) {
                    element.innerHTML = '';
                });

                // Validate each field
                var isValid = true;

                if (fullname.trim() === '') {
                    document.getElementById('fullname-error').innerHTML = 'Please enter your full name';
                    isValid = false;
                }

                if (username.trim() === '') {
                    document.getElementById('username-error').innerHTML = 'Please enter a username';
                    isValid = false;
                }

                if (!gender) {
                    document.getElementById('gender-error').innerHTML = 'Please select a gender';
                    isValid = false;
                }

                if (email.trim() === '' || !email.includes('@')) {
                    document.getElementById('email-error').innerHTML = 'Please enter a valid email address';
                    isValid = false;
                }

                if (password.trim() === '') {
                    document.getElementById('password-error').innerHTML = 'Please enter a password';
                    isValid = false;
                }

                if (confirmPassword.trim() === '' || confirmPassword !== password) {
                    document.getElementById('confirm_password-error').innerHTML = 'Passwords do not match';
                    isValid = false;
                }

                if (phoneNumber.trim() === '') {
                    document.getElementById('phonenumber-error').innerHTML = 'Please enter your phone number';
                    isValid = false;
                }

                return isValid;
            }

            // Attach the validation function to the form submit event
            document.getElementById('registrationForm').addEventListener('submit', function(event) {
                if (!validateForm()) {
                    event.preventDefault(); // Prevent form submission if validation fails
                }
            });
        });
    