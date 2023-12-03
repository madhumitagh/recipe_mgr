document.addEventListener('DOMContentLoaded', function() {
   const fullname = document.getElementById('fullname');
   const username = document.getElementById('username');
   const genderElem = document.getElementById('gender');
   var gender = document.getElementsByName('gender');
   const email = document.getElementById('email');
   const password = document.getElementById('password');
   const confirm_password = document.getElementById('confirm_password');
   const phonenumber = document.getElementById('phonenumber');
   const form = document.getElementById('form');
   const ack = document.getElementById("ack");
   var submit = document.getElementById("Submit");

   form.addEventListener('input', (e) => {
       e.preventDefault();
       validateInputs();
   });
//    form.addEventListener('submit', (e) => {
//         e.preventDefault();
//         validateInputs();
//     });

   const setError = (element, message) => {
       const inputControl = element.parentElement;
       const errorDisplay = inputControl.querySelector('.error');
       errorDisplay.style.color = "red";
       errorDisplay.innerText = message;
       inputControl.classList.add('error');
       inputControl.classList.remove('success');
       submit.disabled = true;

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
       var error = false; 
       var fullnameValue = fullname.value.trim();
       var usernameValue = username.value.trim();
       var genderValue = "";
       var emailValue = email.value.trim();
       var passwordValue = password.value;
       var confirm_passwordValue = confirm_password.value;
       var phonenumberValue = phonenumber.value.trim();

       for (i = 0; i < gender.length; i++) {
         if (gender[i].checked) {
            genderValue = gender[i].value;
         }
       }

       if (fullnameValue === '') {
           setError(fullname, 'Full Name is required');
           error = true;
       } else {
           setSuccess(fullname);
       }

       if (usernameValue === '') {
           setError(username, 'Username is required');
           error = true;
       } else {
           setSuccess(username);
       }

       if (genderValue === '') {
           setError(genderElem, 'Gender is required');
           error = true;
       } else {
           setSuccess(genderElem);
       }

       if (emailValue === '') {
           setError(email, 'Email is required');
           error = true;
       } else if (!isValidEmail(emailValue)) {
           setError(email, 'Provide a valid email address');
           error = true;
       } else {
           setSuccess(email);
       }

       if (passwordValue === '') {
           setError(password, 'Password is required');
           error = true;
       } else if (passwordValue.length < 8) {
           setError(password, 'Password must be at least 8 characters');
           error = true;
       } else {
           setSuccess(password);
       }

       if (confirm_passwordValue === '') {
           setError(confirm_password, 'Please confirm your password');
           error = true;
       } else if (confirm_passwordValue != passwordValue) {
           setError(confirm_password, "Password doesn't match!");
           error = true;
       } else {
           setSuccess(confirm_password);
       }

       if (phonenumberValue === '') {
           setError(phonenumber, 'Phone number is required');
           error = true;
       } else {
           setSuccess(phonenumber);
       }

       if (!ack.checked) {
        setError(ack, "Please Acknowledge to proceed");
        error = true;
       } else {
        setSuccess(ack);
       }

       if (error == false) {
        submit.disabled = false;
       }
   };
});