document.addEventListener('DOMContentLoaded', function() {
   const fullname = document.getElementById('fullname');
   const username = document.getElementById('username');
   const gender = document.getElementById('gender');
   const email = document.getElementById('email');
   const password = document.getElementById('password');
   const confirm_password = document.getElementById('confirm_password');
   const phonenumber = document.getElementById('phonenumber');
   const form = document.getElementById('form');
   const error = document.getElementById('error');

   form.addEventListener('submit', (e) => {
       e.preventDefault();
       validateInputs();
   });

   const setError = (element, message) => {
       const inputControl = element.parentElement;
       const errorDisplay = inputControl.querySelector('.error');
       errorDisplay.innerText = message;
       inputControl.classList.add('error');
       inputControl.classList.remove('success');
   };

   const setSuccess = (element) => {
       const inputControl = element.parentElement;
       const errorDisplay = inputControl.querySelector('.error');
       errorDisplay.innerText = '';
       inputControl.classList.add('success');
       inputControl.classList.remove('error');
   };

   const isValidEmail = (email) => {
       const re = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
       return re.test(String(email).toLowerCase());
   };

   const validateInputs = () => {
       const fullnameValue = fullname.value.trim();
       const usernameValue = username.value.trim();
       const genderValue = gender.value.trim();
       const emailValue = email.value.trim();
       const passwordValue = password.value.trim();
       const confirm_passwordValue = confirm_password.value.trim();
       const phonenumberValue = phonenumber.value.trim();

       if (fullnameValue === '') {
           setError(fullname, 'Full Name is required');
       } else {
           setSuccess(fullname);
       }

       if (usernameValue === '') {
           setError(username, 'Username is required');
       } else {
           setSuccess(username);
       }

       if (genderValue === '') {
           setError(gender, 'Gender is required');
       } else {
           setSuccess(gender);
       }

       if (emailValue === '') {
           setError(email, 'Email is required');
       } else if (!isValidEmail(emailValue)) {
           setError(email, 'Provide a valid email address');
       } else {
           setSuccess(email);
       }

       if (passwordValue === '') {
           setError(password, 'Password is required');
       } else if (passwordValue.length < 8) {
           setError(password, 'Password must be at least 8 characters');
       } else {
           setSuccess(password);
       }

       if (confirm_passwordValue === '') {
           setError(confirm_password, 'Please confirm your password');
       } else if (confirm_passwordValue !== passwordValue) {
           setError(confirm_password, "Password doesn't match!");
       } else {
           setSuccess(confirm_password);
       }

       if (phonenumberValue === '') {
           setError(phonenumber, 'Phone number is required');
       } else {
           setSuccess(phonenumber);
       }
   };
});