document.addEventListener("DOMContentLoaded", () => {

    const signUpForm = document.getElementById("signUpForm");
    const signInForm = document.getElementById("signInForm");

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
