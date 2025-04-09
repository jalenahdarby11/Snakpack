document.addEventListener('DOMContentLoaded', function() {
    const form = document.getElementById('contactForm');
    const problemDescription = document.getElementById('problemDescription');
    const orderNumber = document.getElementById('orderNumber');
    const phoneNumber = document.getElementById('phoneNumber');
    const emailInput = document.getElementById('emailInput');
    const submitButton = document.getElementById('submitButton');
    const successMessage = document.getElementById('successMessage');

    // Error message elements
    const problemError = document.getElementById('problemError');
    const orderError = document.getElementById('orderError');
    const phoneError = document.getElementById('phoneError');
    const emailError = document.getElementById('emailError');

    // Validation patterns
    const phonePattern = /^\+?[\d\s-]{10,}$/;
    const emailPattern = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;

    // Clear error messages
    function clearErrors() {
        const errorElements = document.querySelectorAll('.error-message');
        errorElements.forEach(element => {
            element.style.display = 'none';
            element.textContent = '';
        });
    }

    // Show error message
    function showError(element, message) {
        element.textContent = message;
        element.style.display = 'block';
    }

    // Validate form
    function validateForm() {
        let isValid = true;
        clearErrors();

        // Validate problem description
        if (!problemDescription.value.trim()) {
            showError(problemError, 'Please explain your problem');
            isValid = false;
        }

        // Validate contact information (either phone or email required)
        if (phoneNumber.value || emailInput.value) {
            if (phoneNumber.value && !phonePattern.test(phoneNumber.value)) {
                showError(phoneError, 'Please enter a valid phone number');
                isValid = false;
            }
            if (emailInput.value && !emailPattern.test(emailInput.value)) {
                showError(emailError, 'Please enter a valid email address');
                isValid = false;
            }
        } else {
            showError(phoneError, 'Please provide either phone number or email');
            showError(emailError, 'Please provide either phone number or email');
            isValid = false;
        }

        return isValid;
    }

    // Handle form submission
    form.addEventListener('submit', async function(e) {
        e.preventDefault();

        if (!validateForm()) {
            return;
        }

        // Disable submit button and show loading state
        submitButton.disabled = true;
        submitButton.textContent = 'Submitting...';

        try {
            // Simulate API call with timeout
            await new Promise(resolve => setTimeout(resolve, 1500));

            // Show success message
            successMessage.textContent = 'Thank you! We will contact you soon.';
            successMessage.style.display = 'block';

            // Reset form
            form.reset();

            // Hide success message after 5 seconds
            setTimeout(() => {
                successMessage.style.display = 'none';
            }, 5000);

        } catch (error) {
            showError(submitButton, 'An error occurred. Please try again.');
        } finally {
            // Re-enable submit button
            submitButton.disabled = false;
            submitButton.textContent = 'Submit';
        }
    });

    // Real-time validation for email
    emailInput.addEventListener('input', function() {
        if (this.value && !emailPattern.test(this.value)) {
            showError(emailError, 'Please enter a valid email address');
        } else {
            emailError.style.display = 'none';
        }
    });

    // Real-time validation for phone
    phoneNumber.addEventListener('input', function() {
        if (this.value && !phonePattern.test(this.value)) {
            showError(phoneError, 'Please enter a valid phone number');
        } else {
            phoneError.style.display = 'none';
        }
    });

    // Clear error messages when user starts typing
    problemDescription.addEventListener('input', function() {
        problemError.style.display = 'none';
    });

    orderNumber.addEventListener('input', function() {
        orderError.style.display = 'none';
    });
});
