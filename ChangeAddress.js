document.addEventListener("DOMContentLoaded", function () {
    // Get form elements
    const form = document.querySelector("form");
    const firstNameInput = document.querySelector(".first-name");
    const lastNameInput = document.querySelector(".last-name");
    const streetAddressInput = document.querySelector(".street-address");
    const apartmentInput = document.querySelector(".apartment-suite");
    const cityInput = document.querySelector(".city");
    const stateInput = document.querySelector(".state");
    const postalCodeInput = document.querySelector(".postal-code");
    const mobileNumberInput = document.querySelector(".mobile-number");
    const submitButton = document.querySelector(".submit-button");
  
    // Add input event listeners for real-time validation
    const requiredFields = [
      firstNameInput,
      lastNameInput,
      streetAddressInput,
      cityInput,
      stateInput,
      postalCodeInput,
    ];
  
    requiredFields.forEach((field) => {
      field.addEventListener("input", function () {
        validateField(field);
      });
  
      field.addEventListener("blur", function () {
        validateField(field);
      });
    });
  
    // Add hover effect to submit button
    submitButton.addEventListener("mouseenter", function () {
      this.style.backgroundColor = "rgba(236, 147, 24, 1)";
      this.style.transform = "scale(1.02)";
      this.style.transition = "all 0.3s ease";
    });
  
    submitButton.addEventListener("mouseleave", function () {
      this.style.backgroundColor = "rgba(236, 167, 44, 1)";
      this.style.transform = "scale(1)";
    });
  
    // Form submission handler
    form.addEventListener("submit", function (event) {
      event.preventDefault();
  
      // Validate all required fields
      let isValid = true;
      requiredFields.forEach((field) => {
        if (!validateField(field)) {
          isValid = false;
        }
      });
  
      // Validate postal code format
      if (!validatePostalCode(postalCodeInput.value)) {
        showError(postalCodeInput, "Please enter a valid postal code");
        isValid = false;
      }
  
      // If mobile number is provided, validate its format
      if (
        mobileNumberInput.value &&
        !validatePhoneNumber(mobileNumberInput.value)
      ) {
        showError(mobileNumberInput, "Please enter a valid phone number");
        isValid = false;
      }
  
      // If all validations pass, submit the form
      if (isValid) {
        // Collect form data
        const formData = {
          firstName: firstNameInput.value,
          lastName: lastNameInput.value,
          streetAddress: streetAddressInput.value,
          apartment: apartmentInput.value,
          city: cityInput.value,
          state: stateInput.value,
          postalCode: postalCodeInput.value,
          mobileNumber: mobileNumberInput.value,
        };
  
        // Here you would typically send the data to a server
        console.log("Form submitted with data:", formData);
  
        // Show success message
        showSuccessMessage();
  
        // Reset form
        form.reset();
      }
    });
  
    // Field validation function
    function validateField(field) {
      if (field.value.trim() === "") {
        showError(field, "This field is required");
        return false;
      } else {
        clearError(field);
        return true;
      }
    }
  
    // Postal code validation function
    function validatePostalCode(postalCode) {
      // This is a simple validation - adjust based on your country's format
      const postalCodeRegex = /^[0-9]{5}(-[0-9]{4})?$/;
      return postalCodeRegex.test(postalCode);
    }
  
    // Phone number validation function
    function validatePhoneNumber(phoneNumber) {
      // This is a simple validation - adjust based on your country's format
      const phoneRegex = /^[+]?[(]?[0-9]{3}[)]?[-\s.]?[0-9]{3}[-\s.]?[0-9]{4,6}$/;
      return phoneRegex.test(phoneNumber);
    }
  
    // Show error message function
    function showError(field, message) {
      // Clear any existing error
      clearError(field);
  
      // Add error class to the field
      field.classList.add("error");
      field.style.borderColor = "red";
  
      // Create and append error message
      const errorElement = document.createElement("p");
      errorElement.className = "error-message";
      errorElement.textContent = message;
      errorElement.style.color = "red";
      errorElement.style.fontSize = "14px";
      errorElement.style.marginTop = "5px";
      errorElement.style.marginLeft = "20px";
  
      field.parentNode.appendChild(errorElement);
    }
  
    // Clear error message function
    function clearError(field) {
      field.classList.remove("error");
      field.style.borderColor = "rgba(0, 0, 0, 1)";
  
      const errorElement = field.parentNode.querySelector(".error-message");
      if (errorElement) {
        errorElement.remove();
      }
    }
  
    // Show success message function
    function showSuccessMessage() {
      // Remove any existing success message
      const existingMessage = document.querySelector(".success-message");
      if (existingMessage) {
        existingMessage.remove();
      }
  
      // Create success message element
      const successMessage = document.createElement("div");
      successMessage.className = "success-message";
      successMessage.textContent = "Your address has been updated successfully!";
      successMessage.style.backgroundColor = "rgba(101, 215, 218, 0.2)";
      successMessage.style.color = "rgba(0, 0, 0, 1)";
      successMessage.style.padding = "20px";
      successMessage.style.borderRadius = "10px";
      successMessage.style.marginTop = "20px";
      successMessage.style.textAlign = "center";
      successMessage.style.fontFamily =
        "Poppins, -apple-system, Roboto, Helvetica, sans-serif";
      successMessage.style.fontWeight = "600";
  
      // Add success message to the page
      form.parentNode.insertBefore(successMessage, form.nextSibling);
  
      // Scroll to success message
      successMessage.scrollIntoView({ behavior: "smooth" });
  
      // Remove success message after 5 seconds
      setTimeout(() => {
        successMessage.remove();
      }, 5000);
    }
  
    // Add focus effects to form inputs
    const allInputs = document.querySelectorAll(".form-input");
    allInputs.forEach((input) => {
      input.addEventListener("focus", function () {
        this.style.boxShadow = "0 0 5px rgba(82, 185, 188, 0.5)";
        this.style.transition = "all 0.3s ease";
      });
  
      input.addEventListener("blur", function () {
        this.style.boxShadow = "none";
      });
    });
  
    // Add email subscription functionality
    const emailInput = document.querySelector(".email-input");
    if (emailInput) {
      emailInput.addEventListener("click", function () {
        // If it's not already an input field, replace it with one
        if (this.tagName !== "INPUT") {
          const inputValue = this.textContent;
          const inputField = document.createElement("input");
          inputField.type = "email";
          inputField.className = "email-input";
          inputField.placeholder = "Email Address";
          inputField.value = inputValue !== "Email Address" ? inputValue : "";
  
          // Copy the styles
          const computedStyle = window.getComputedStyle(this);
          inputField.style.borderRadius = computedStyle.borderRadius;
          inputField.style.backgroundColor = computedStyle.backgroundColor;
          inputField.style.padding = computedStyle.padding;
          inputField.style.fontFamily = computedStyle.fontFamily;
          inputField.style.fontSize = computedStyle.fontSize;
          inputField.style.fontWeight = computedStyle.fontWeight;
          inputField.style.width = "100%";
  
          // Replace the div with the input
          this.parentNode.replaceChild(inputField, this);
          inputField.focus();
  
          // Add a subscribe button
          const subscribeButton = document.createElement("button");
          subscribeButton.textContent = "Subscribe";
          subscribeButton.className = "subscribe-button";
          subscribeButton.style.backgroundColor = "rgba(236, 167, 44, 1)";
          subscribeButton.style.color = "white";
          subscribeButton.style.border = "none";
          subscribeButton.style.borderRadius = "100px";
          subscribeButton.style.padding = "10px 20px";
          subscribeButton.style.marginLeft = "10px";
          subscribeButton.style.cursor = "pointer";
          subscribeButton.style.fontFamily =
            "Poppins, -apple-system, Roboto, Helvetica, sans-serif";
  
          inputField.parentNode.insertBefore(
            subscribeButton,
            inputField.nextSibling,
          );
  
          // Handle subscribe button click
          subscribeButton.addEventListener("click", function () {
            if (inputField.value && validateEmail(inputField.value)) {
              alert("Thank you for subscribing!");
              // Here you would typically send the email to a server
            } else {
              alert("Please enter a valid email address");
            }
          });
        }
      });
    }
  
    // Email validation function
    function validateEmail(email) {
      const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
      return emailRegex.test(email);
    }
  });
  