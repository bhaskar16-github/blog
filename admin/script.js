document.addEventListener("DOMContentLoaded", () => {

    const signUpForm = document.getElementById("signUpForm");
    const signInForm = document.getElementById("signInForm");

    // Sign-up form validation
    signUpForm.addEventListener("submit", (event) => {
        const fName = document.getElementById("fName");
        const lName = document.getElementById("lName");
        const email = document.getElementById("email");
        const password = document.getElementById("password");

        let isValid = true;

        // Validate first name
        if (fName.value.trim() === "") {
            displayError("fNameError", "First Name is required.");
            isValid = false;
        } else {
            clearError("fNameError");
        }

        // Validate last name
        if (lName.value.trim() === "") {
            displayError("lNameError", "Last Name is required.");
            isValid = false;
        } else {
            clearError("lNameError");
        }

        // Validate email format
        if (!isValidEmail(email.value)) {
            displayError("emailError", "Please enter a valid email address.");
            isValid = false;
        } else {
            clearError("emailError");
        }

        // Validate password length
        if (password.value.length < 6) {
            displayError("passwordError", "Password must be at least 6 characters.");
            isValid = false;
        } else {
            clearError("passwordError");
        }

        // Prevent form submission if validation fails
        if (!isValid) {
            event.preventDefault();
        }
    });

    // Sign-in form validation
    signInForm.addEventListener("submit", (event) => {
        const email = document.getElementById("signInEmail");
        const password = document.getElementById("signInPassword");

        let isValid = true;

        // Validate email format
        if (!isValidEmail(email.value)) {
            displayError("signInEmailError", "Please enter a valid email address.");
            isValid = false;
        } else {
            clearError("signInEmailError");
        }

        // Validate password
        if (password.value.trim() === "") {
            displayError("signInPasswordError", "Password is required.");
            isValid = false;
        } else {
            clearError("signInPasswordError");
        }

        // Prevent form submission if validation fails
        if (!isValid) {
            event.preventDefault();
        }
    });

    // Helper function to validate email format
    function isValidEmail(email) {
        const emailPattern = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
        return emailPattern.test(email);
    }

    // Helper function to display error message
    function displayError(elementId, message) {
        const errorElement = document.getElementById(elementId);
        errorElement.innerText = message;
        errorElement.style.display = "block";
    }

    // Helper function to clear error message
    function clearError(elementId) {
        const errorElement = document.getElementById(elementId);
        errorElement.innerText = "";
        errorElement.style.display = "none";
    }
});
const signUpButton=document.getElementById('signUpButton');
const signInButton=document.getElementById('signInButton');
const signInForm=document.getElementById('signIn');
const signUpForm=document.getElementById('signup');

signUpButton.addEventListener('click',function(){
    signInForm.style.display="none";
    signUpForm.style.display="block";
})
signInButton.addEventListener('click', function(){
    signInForm.style.display="block";
    signUpForm.style.display="none";
})
