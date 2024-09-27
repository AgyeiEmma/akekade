document.addEventListener('DOMContentLoaded', function() {
    const form = document.getElementById('registerForm');
    const fullNameInput = document.getElementById('fullName');
    const emailInput = document.getElementById('email');
    const passwordInput = document.getElementById('password');
    const confirmPasswordInput = document.getElementById('confirmPassword');
    const countryInput = document.getElementById('country');
    const cityInput = document.getElementById('city');
    const contactNumberInput = document.getElementById('contactNumber');

    form.addEventListener('submit', function(event) {
        let isValid = true;

        // Full Name validation
        if (fullNameInput.value.trim() === '') {
            showError(fullNameInput, 'Full name is required');
            isValid = false;
        } else {
            hideError(fullNameInput);
        }

        // Email validation
        const emailRegex = /^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/;
        if (!emailRegex.test(emailInput.value)) {
            showError(emailInput, 'Please enter a valid email address');
            isValid = false;
        } else {
            hideError(emailInput);
        }

        // Password validation
        if (passwordInput.value.length < 8) {
            showError(passwordInput, 'Password must be at least 8 characters long');
            isValid = false;
        } else {
            hideError(passwordInput);
        }

        // Confirm Password validation
        if (confirmPasswordInput.value !== passwordInput.value) {
            showError(confirmPasswordInput, 'Passwords do not match');
            isValid = false;
        } else {
            hideError(confirmPasswordInput);
        }

        // Country validation
        if (countryInput.value.trim() === '') {
            showError(countryInput, 'Country is required');
            isValid = false;
        } else {
            hideError(countryInput);
        }

        // City validation
        if (cityInput.value.trim() === '') {
            showError(cityInput, 'City is required');
            isValid = false;
        } else {
            hideError(cityInput);
        }

        // Contact Number validation
        const phoneRegex = /^\+?[1-9]\d{1,14}$/;
        if (!phoneRegex.test(contactNumberInput.value)) {
            showError(contactNumberInput, 'Please enter a valid phone number');
            isValid = false;
        } else {
            hideError(contactNumberInput);
        }

        if (!isValid) {
            event.preventDefault();
        }
    });

    function showError(input, message) {
        const errorElement = input.nextElementSibling;
        if (errorElement && errorElement.classList.contains('error-message')) {
            errorElement.textContent = message;
        } else {
            const error = document.createElement('div');
            error.className = 'error-message';
            error.textContent = message;
            input.parentNode.insertBefore(error, input.nextSibling);
        }
    }

    function hideError(input) {
        const errorElement = input.nextElementSibling;
        if (errorElement && errorElement.classList.contains('error-message')) {
            errorElement.remove();
        }
    }
});