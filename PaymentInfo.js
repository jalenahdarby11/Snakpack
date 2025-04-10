document.addEventListener("DOMContentLoaded", function () {
    // DOM Elements
    const submitButton = document.querySelector(".submit-button");
    const applePayButton = document.querySelector(".apple-pay-button");
    const cardNumberInputs = document.querySelectorAll(".card-number-text");
    const cvcInputs = document.querySelectorAll(".detail-value");
    const dateInputs = document.querySelectorAll(".detail-value:nth-of-type(2)");
    const changeCardSection = document.querySelector(".change-card-section");
    const currentCardSection = document.querySelector(".current-card-section");
    const divider = document.querySelector(".divider");
  
    // Card input masks and validation patterns
    const cardNumberPattern = /^(\d{0,4})(\d{0,4})(\d{0,4})(\d{0,4})$/;
    const cvcPattern = /^\d{0,3}$/;
    const datePattern = /^(\d{0,2})(\d{0,4})$/;
  
    // Initialize interactive elements
    initializeCardInputs();
    initializeButtons();
  
    /**
     * Initialize card input fields with event listeners
     */
    function initializeCardInputs() {
      // Make card number fields interactive
      document.querySelectorAll(".card-display").forEach((cardDisplay) => {
        const cardNumberText = cardDisplay.querySelector(".card-number-text");
  
        // Make the card number field editable
        if (cardDisplay.closest(".change-card-section")) {
          cardNumberText.contentEditable = true;
          cardNumberText.addEventListener("input", handleCardNumberInput);
          cardNumberText.addEventListener("focus", function () {
            this.classList.add("editing");
          });
          cardNumberText.addEventListener("blur", function () {
            this.classList.remove("editing");
            validateCardNumber(this);
          });
        }
      });
  
      // Make CVC and date fields interactive
      document
        .querySelectorAll(".change-card-section .detail-value")
        .forEach((detailValue) => {
          detailValue.contentEditable = true;
  
          if (detailValue.closest(".card-detail-group:first-child")) {
            // CVC field
            detailValue.addEventListener("input", handleCvcInput);
            detailValue.addEventListener("focus", function () {
              this.classList.add("editing");
            });
            detailValue.addEventListener("blur", function () {
              this.classList.remove("editing");
              validateCvc(this);
            });
          } else {
            // Date field
            detailValue.addEventListener("input", handleDateInput);
            detailValue.addEventListener("focus", function () {
              this.classList.add("editing");
              if (this.textContent === "dd/yyyy") {
                this.textContent = "";
              }
            });
            detailValue.addEventListener("blur", function () {
              this.classList.remove("editing");
              validateDate(this);
              if (this.textContent === "") {
                this.textContent = "dd/yyyy";
              }
            });
          }
        });
    }
  
    /**
     * Initialize button behaviors
     */
    function initializeButtons() {
      // Submit button
      if (submitButton) {
        submitButton.addEventListener("click", handleSubmit);
  
        // Add hover effect
        submitButton.addEventListener("mouseenter", function () {
          this.style.backgroundColor = "rgba(236, 167, 44, 0.8)";
        });
  
        submitButton.addEventListener("mouseleave", function () {
          this.style.backgroundColor = "rgba(236, 167, 44, 1)";
        });
      }
  
      // Apple Pay button
      if (applePayButton) {
        applePayButton.addEventListener("click", handleApplePay);
  
        // Add hover effect
        applePayButton.addEventListener("mouseenter", function () {
          const content = this.querySelector(".apple-pay-content");
          content.style.backgroundColor = "rgba(0, 0, 0, 0.8)";
        });
  
        applePayButton.addEventListener("mouseleave", function () {
          const content = this.querySelector(".apple-pay-content");
          content.style.backgroundColor = "rgba(0, 0, 0, 1)";
        });
      }
  
      // Email subscription button
      const emailButton = document.querySelector(".email-button");
      if (emailButton) {
        emailButton.addEventListener("click", function () {
          const email = prompt("Please enter your email address:");
          if (email && isValidEmail(email)) {
            alert("Thank you for subscribing!");
          } else if (email) {
            alert("Please enter a valid email address.");
          }
        });
      }
  
    
    }
  
    /**
     * Handle card number input with formatting
     */
    function handleCardNumberInput(e) {
      let input = this.textContent.replace(/\D/g, "");
  
      // Limit to 16 digits
      if (input.length > 16) {
        input = input.slice(0, 16);
      }
  
      // Format with spaces
      const matches = input.match(cardNumberPattern);
      if (matches) {
        let formatted = "";
        for (let i = 1; i < matches.length; i++) {
          if (matches[i]) {
            formatted +=
              matches[i] + (i < 4 && matches[i].length === 4 ? " " : "");
          }
        }
        this.textContent = formatted.trim();
      }
  
      // Position cursor correctly
      placeCaretAtEnd(this);
    }
  
    /**
     * Handle CVC input with validation
     */
    function handleCvcInput(e) {
      let input = this.textContent.replace(/\D/g, "");
  
      // Limit to 3 digits
      if (input.length > 3) {
        input = input.slice(0, 3);
      }
  
      this.textContent = input;
      placeCaretAtEnd(this);
    }
  
    /**
     * Handle date input with formatting
     */
    function handleDateInput(e) {
      let input = this.textContent.replace(/\D/g, "");
  
      // Limit to 6 digits (MM/YYYY)
      if (input.length > 6) {
        input = input.slice(0, 6);
      }
  
      // Format with slash
      const matches = input.match(datePattern);
      if (matches) {
        let month = matches[1] || "";
        let year = matches[2] || "";
  
        // Validate month (01-12)
        if (month.length === 1 && parseInt(month) > 1) {
          month = "0" + month;
        } else if (
          month.length === 2 &&
          (parseInt(month) < 1 || parseInt(month) > 12)
        ) {
          month = "12";
        }
  
        this.textContent = month + (year ? "/" + year : "");
      } else {
        this.textContent = input;
      }
  
      placeCaretAtEnd(this);
    }
  
    /**
     * Validate card number
     */
    function validateCardNumber(element) {
      const cardNumber = element.textContent.replace(/\s/g, "");
  
      if (cardNumber.length < 16) {
        element.classList.add("invalid");
        return false;
      } else {
        element.classList.remove("invalid");
        return true;
      }
    }
  
    /**
     * Validate CVC
     */
    function validateCvc(element) {
      const cvc = element.textContent;
  
      if (cvc.length < 3) {
        element.classList.add("invalid");
        return false;
      } else {
        element.classList.remove("invalid");
        return true;
      }
    }
  
    /**
     * Validate date
     */
    function validateDate(element) {
      const date = element.textContent;
  
      if (date === "dd/yyyy") {
        element.classList.add("invalid");
        return false;
      }
  
      const parts = date.split("/");
      if (parts.length !== 2 || parts[0].length !== 2 || parts[1].length !== 4) {
        element.classList.add("invalid");
        return false;
      }
  
      const month = parseInt(parts[0]);
      const year = parseInt(parts[1]);
      const currentYear = new Date().getFullYear();
  
      if (month < 1 || month > 12 || year < currentYear) {
        element.classList.add("invalid");
        return false;
      }
  
      element.classList.remove("invalid");
      return true;
    }
  
    /**
     * Handle form submission
     */
    function handleSubmit(e) {
      e.preventDefault();
  
      // Get all input fields from the change card section
      const cardNumber = document.querySelector(
        ".change-card-section .card-number-text",
      );
      const cvc = document.querySelector(
        ".change-card-section .card-detail-group:first-child .detail-value",
      );
      const date = document.querySelector(
        ".change-card-section .card-detail-group:last-child .detail-value",
      );
  
      // Validate all fields
      const isCardValid = validateCardNumber(cardNumber);
      const isCvcValid = validateCvc(cvc);
      const isDateValid = validateDate(date);
  
      if (isCardValid && isCvcValid && isDateValid) {
        // Simulate successful submission
        alert("Payment information updated successfully!");
  
        // Update the current card with the new card info
        const currentCardNumber = document.querySelector(
          ".current-card-section .card-number-text",
        );
        const currentCvc = document.querySelector(
          ".current-card-section .card-detail-group:first-child .detail-value",
        );
        const currentDate = document.querySelector(
          ".current-card-section .card-detail-group:last-child .detail-value",
        );
  
        currentCardNumber.textContent = cardNumber.textContent;
        currentCvc.textContent = cvc.textContent;
        currentDate.textContent = date.textContent;
  
        // Reset the change card form
        cardNumber.textContent = "0123 4567 8910";
        cvc.textContent = "000";
        date.textContent = "dd/yyyy";
  
        // Scroll to top to show the updated card
        window.scrollTo({
          top: currentCardSection.offsetTop - 100,
          behavior: "smooth",
        });
      } else {
        alert("Please correct the highlighted fields before submitting.");
      }
    }
  
    /**
     * Handle Apple Pay button click
     */
    function handleApplePay(e) {
      e.preventDefault();
      alert(
        "Apple Pay is not available in this demo. Please use the regular payment form.",
      );
    }
  
    /**
     * Validate email format
     */
    function isValidEmail(email) {
      const emailPattern = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
      return emailPattern.test(email);
    }
  
    /**
     * Helper function to place caret at the end of contentEditable element
     */
    function placeCaretAtEnd(el) {
      el.focus();
      if (
        typeof window.getSelection != "undefined" &&
        typeof document.createRange != "undefined"
      ) {
        const range = document.createRange();
        range.selectNodeContents(el);
        range.collapse(false);
        const sel = window.getSelection();
        sel.removeAllRanges();
        sel.addRange(range);
      } else if (typeof document.body.createTextRange != "undefined") {
        const textRange = document.body.createTextRange();
        textRange.moveToElementText(el);
        textRange.collapse(false);
        textRange.select();
      }
    }
  
    // Add CSS for validation states
    addValidationStyles();
  
    /**
     * Add CSS styles for validation
     */
    function addValidationStyles() {
      const style = document.createElement("style");
      style.textContent = `
        .card-number-text.editing, .detail-value.editing {
          outline: 2px solid rgba(82, 185, 188, 0.5);
          background-color: rgba(82, 185, 188, 0.05);
        }
  
        .card-number-text.invalid, .detail-value.invalid {
          outline: 2px solid rgba(255, 0, 0, 0.5);
          background-color: rgba(255, 0, 0, 0.05);
        }
  
        .card-display .card-number-text[contenteditable=true],
        .detail-input .detail-value[contenteditable=true] {
          cursor: text;
        }
  
        .card-display .card-number-text[contenteditable=true]:hover,
        .detail-input .detail-value[contenteditable=true]:hover {
          background-color: rgba(0, 0, 0, 0.05);
        }
      `;
      document.head.appendChild(style);
    }
  });
  