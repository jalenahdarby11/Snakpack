document.addEventListener("DOMContentLoaded", function () {
    // Form elements
    const cardNumberInput = document.querySelector(".card-number");
    const cvcInput = document.querySelector(".cvc-field");
    const expirationInput = document.querySelector(".expiration-field");
    const submitButton = document.querySelector(".submit-button");
    const addGiftCardButton = document.querySelector(".add-gift-card");
    const giftCardForm = document.querySelector(".gift-card-form");
  
    // Initialize the page
    initPage();
  
    function initPage() {
      // Add event listeners
      if (cardNumberInput) {
        cardNumberInput.addEventListener("input", formatCardNumber);
        cardNumberInput.addEventListener("blur", validateCardNumber);
      }
  
      if (cvcInput) {
        cvcInput.addEventListener("input", formatCVC);
        cvcInput.addEventListener("blur", validateCVC);
      }
  
      if (expirationInput) {
        expirationInput.addEventListener("input", formatExpirationDate);
        expirationInput.addEventListener("blur", validateExpirationDate);
      }
  
      if (submitButton) {
        submitButton.addEventListener("click", handleSubmit);
      }
  
      if (addGiftCardButton) {
        addGiftCardButton.addEventListener("click", toggleGiftCardForm);
      }
  
      // Initially hide the form (optional)
      // if (giftCardForm) {
      //   giftCardForm.style.display = 'none';
      // }
    }
  
    // Format and validation functions
    function formatCardNumber(e) {
      let value = e.target.value.replace(/\D/g, "");
      let formattedValue = "";
  
      for (let i = 0; i < value.length; i++) {
        if (i > 0 && i % 4 === 0) {
          formattedValue += " ";
        }
        formattedValue += value[i];
      }
  
      // Limit to 16 digits (plus spaces)
      if (value.length > 16) {
        formattedValue = formattedValue.substring(0, 19);
      }
  
      e.target.value = formattedValue;
    }
  
    function validateCardNumber() {
      const value = cardNumberInput.value.replace(/\s/g, "");
      const isValid = /^\d{16}$/.test(value);
  
      if (!isValid) {
        showError(cardNumberInput, "Please enter a valid 16-digit card number");
      } else {
        clearError(cardNumberInput);
      }
  
      return isValid;
    }
  
    function formatCVC(e) {
      let value = e.target.value.replace(/\D/g, "");
  
      // Limit to 4 digits
      if (value.length > 4) {
        value = value.substring(0, 4);
      }
  
      e.target.value = value;
    }
  
    function validateCVC() {
      const value = cvcInput.value;
      const isValid = /^\d{3,4}$/.test(value);
  
      if (!isValid) {
        showError(cvcInput, "Please enter a valid 3-4 digit CVC code");
      } else {
        clearError(cvcInput);
      }
  
      return isValid;
    }
  
    function formatExpirationDate(e) {
      let value = e.target.value.replace(/\D/g, "");
      let formattedValue = "";
  
      if (value.length > 0) {
        // Format as MM
        formattedValue = value.substring(0, Math.min(2, value.length));
  
        // Add slash and YYYY
        if (value.length > 2) {
          formattedValue += "/" + value.substring(2, Math.min(6, value.length));
        }
      }
  
      e.target.value = formattedValue;
    }
  
    function validateExpirationDate() {
      const value = expirationInput.value;
      const isFormatValid = /^\d{2}\/\d{4}$/.test(value);
  
      if (!isFormatValid) {
        showError(expirationInput, "Please enter a valid date in MM/YYYY format");
        return false;
      }
  
      // Check if date is in the future
      const [month, year] = value.split("/");
      const expirationDate = new Date(parseInt(year), parseInt(month) - 1);
      const currentDate = new Date();
  
      // Set current date to beginning of month for comparison
      currentDate.setDate(1);
      currentDate.setHours(0, 0, 0, 0);
  
      if (expirationDate < currentDate) {
        showError(expirationInput, "The expiration date has passed");
        return false;
      }
  
      clearError(expirationInput);
      return true;
    }
  
    function handleSubmit(e) {
      e.preventDefault();
  
      // Validate all fields
      const isCardValid = validateCardNumber();
      const isCvcValid = validateCVC();
      const isExpirationValid = validateExpirationDate();
  
      if (isCardValid && isCvcValid && isExpirationValid) {
        // Show success message
        showSuccessMessage("Gift card added successfully!");
  
        // Reset form (optional)
        // resetForm();
      } else {
        // Show general error message
        showGeneralError("Please correct the errors in the form");
      }
    }
  
    function toggleGiftCardForm() {
      if (giftCardForm) {
        // Toggle form visibility with animation
        if (
          giftCardForm.style.display === "none" ||
          getComputedStyle(giftCardForm).display === "none"
        ) {
          giftCardForm.style.display = "block";
          giftCardForm.style.opacity = "0";
          setTimeout(() => {
            giftCardForm.style.opacity = "1";
            giftCardForm.style.transition = "opacity 0.3s ease-in-out";
          }, 10);
        } else {
          giftCardForm.style.opacity = "0";
          giftCardForm.style.transition = "opacity 0.3s ease-in-out";
          setTimeout(() => {
            giftCardForm.style.display = "none";
          }, 300);
        }
      }
    }
  
    // Helper functions
    function showError(element, message) {
      clearError(element);
  
      const errorElement = document.createElement("div");
      errorElement.className = "error-message";
      errorElement.textContent = message;
      errorElement.style.color = "red";
      errorElement.style.fontSize = "12px";
      errorElement.style.marginTop = "5px";
  
      element.parentNode.appendChild(errorElement);
      element.style.borderColor = "red";
    }
  
    function clearError(element) {
      const parent = element.parentNode;
      const errorElement = parent.querySelector(".error-message");
  
      if (errorElement) {
        parent.removeChild(errorElement);
      }
  
      element.style.borderColor = "";
    }
  
    function showSuccessMessage(message) {
      // Remove any existing messages
      const existingMessage = document.querySelector(".message-container");
      if (existingMessage) {
        existingMessage.remove();
      }
  
      // Create success message
      const messageContainer = document.createElement("div");
      messageContainer.className = "message-container success-message";
      messageContainer.textContent = message;
      messageContainer.style.backgroundColor = "rgba(75, 181, 67, 0.9)";
      messageContainer.style.color = "white";
      messageContainer.style.padding = "15px";
      messageContainer.style.borderRadius = "5px";
      messageContainer.style.position = "fixed";
      messageContainer.style.top = "20px";
      messageContainer.style.left = "50%";
      messageContainer.style.transform = "translateX(-50%)";
      messageContainer.style.zIndex = "1000";
      messageContainer.style.boxShadow = "0 4px 8px rgba(0,0,0,0.1)";
  
      document.body.appendChild(messageContainer);
  
      // Remove after 3 seconds
      setTimeout(() => {
        messageContainer.style.opacity = "0";
        messageContainer.style.transition = "opacity 0.5s ease-out";
        setTimeout(() => {
          if (messageContainer.parentNode) {
            messageContainer.parentNode.removeChild(messageContainer);
          }
        }, 500);
      }, 3000);
    }
  
    function showGeneralError(message) {
      // Similar to success message but with different styling
      const existingMessage = document.querySelector(".message-container");
      if (existingMessage) {
        existingMessage.remove();
      }
  
      const messageContainer = document.createElement("div");
      messageContainer.className = "message-container error-message";
      messageContainer.textContent = message;
      messageContainer.style.backgroundColor = "rgba(220, 53, 69, 0.9)";
      messageContainer.style.color = "white";
      messageContainer.style.padding = "15px";
      messageContainer.style.borderRadius = "5px";
      messageContainer.style.position = "fixed";
      messageContainer.style.top = "20px";
      messageContainer.style.left = "50%";
      messageContainer.style.transform = "translateX(-50%)";
      messageContainer.style.zIndex = "1000";
      messageContainer.style.boxShadow = "0 4px 8px rgba(0,0,0,0.1)";
  
      document.body.appendChild(messageContainer);
  
      // Remove after 3 seconds
      setTimeout(() => {
        messageContainer.style.opacity = "0";
        messageContainer.style.transition = "opacity 0.5s ease-out";
        setTimeout(() => {
          if (messageContainer.parentNode) {
            messageContainer.parentNode.removeChild(messageContainer);
          }
        }, 500);
      }, 3000);
    }
  
    function resetForm() {
      if (cardNumberInput) cardNumberInput.value = "";
      if (cvcInput) cvcInput.value = "";
      if (expirationInput) expirationInput.value = "";
  
      // Clear any error messages
      const errorMessages = document.querySelectorAll(".error-message");
      errorMessages.forEach((message) => {
        message.parentNode.removeChild(message);
      });
  
      // Reset border colors
      if (cardNumberInput) cardNumberInput.style.borderColor = "";
      if (cvcInput) cvcInput.style.borderColor = "";
      if (expirationInput) expirationInput.style.borderColor = "";
    }
  
    // Add history table interactivity
    const historyRows = document.querySelectorAll(
      ".history-row, .history-row-alt",
    );
    historyRows.forEach((row) => {
      row.addEventListener("mouseover", function () {
        this.style.backgroundColor = "rgba(229, 231, 228, 1)";
        this.style.cursor = "pointer";
      });
  
      row.addEventListener("mouseout", function () {
        if (this.classList.contains("history-row")) {
          this.style.backgroundColor = "rgba(239, 241, 238, 1)";
        } else {
          this.style.backgroundColor = "";
        }
        this.style.cursor = "default";
      });
  
      row.addEventListener("click", function () {
        // Could show more details about the transaction
        console.log("Transaction details:", this.textContent.trim());
      });
    });
  });
  