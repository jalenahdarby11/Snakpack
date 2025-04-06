document.addEventListener("DOMContentLoaded", () => {
    // Quiz state
    const state = {
      selectedOptions: new Set(),
      currentStep: 1,
      totalSteps: 3,
    };
  
    // DOM Elements
    const form = document.querySelector(".dietary-options");
    const checkboxes = document.querySelectorAll(".checkbox-input");
    const nextButton = document.querySelector(".next-button");
    const emailInput = document.querySelector(".email-input");
  
    // Initialize accessibility attributes
    function initializeAccessibility() {
      // Add role and aria attributes to main sections
      document.querySelector(".quiz-section").setAttribute("role", "form");
      document
        .querySelector(".question-title")
        .setAttribute("id", "dietary-question");
      form.setAttribute("aria-labelledby", "dietary-question");
  
      // Make checkboxes more accessible
      checkboxes.forEach((checkbox, index) => {
        const label = checkbox
          .closest(".checkbox-option")
          .querySelector(".checkbox-label");
        const id = `option-${index + 1}`;
        checkbox.id = id;
        label.setAttribute("for", id);
  
        // Add keyboard handling
        checkbox.addEventListener("keydown", (e) => {
          if (e.key === "Enter" || e.key === " ") {
            e.preventDefault();
            checkbox.click();
          }
        });
      });
    }
  
    // Handle checkbox changes
    function handleCheckboxChange(e) {
      const checkbox = e.target;
      const option = checkbox.closest(".checkbox-option");
  
      if (checkbox.checked) {
        state.selectedOptions.add(checkbox.id);
        option.classList.add("selected");
      } else {
        state.selectedOptions.delete(checkbox.id);
        option.classList.remove("selected");
      }
  
      // Update next button state
      updateNextButtonState();
    }
  
    // Update next button state based on selections
    function updateNextButtonState() {
      nextButton.disabled = state.selectedOptions.size === 0;
      nextButton.setAttribute("aria-disabled", state.selectedOptions.size === 0);
    }
  
    // Handle form submission
    function handleSubmit(e) {
      e.preventDefault();
  
      // Validate selections
      if (state.selectedOptions.size === 0) {
        alert("Please select at least one dietary restriction");
        return;
      }
  
      // Collect selected options
      const selectedPreferences = Array.from(state.selectedOptions).map((id) => {
        const checkbox = document.getElementById(id);
        return checkbox.nextElementSibling.textContent;
      });
  
      // Here you would typically send this data to your backend
      console.log("Selected dietary preferences:", selectedPreferences);
  
      // Show success message
      showSuccessMessage();
    }
  
    // Show success message
    function showSuccessMessage() {
      const message = document.createElement("div");
      message.className = "success-message";
      message.textContent = "Thank you for submitting your preferences!";
      message.setAttribute("role", "alert");
  
      form.innerHTML = "";
      form.appendChild(message);
    }
  
    // Handle email subscription
    function handleEmailSubscription() {
      emailInput.addEventListener("keypress", (e) => {
        if (e.key === "Enter") {
          e.preventDefault();
          const email = emailInput.value.trim();
  
          if (validateEmail(email)) {
            console.log("Subscribing email:", email);
            emailInput.value = "";
            showSubscriptionSuccess();
          } else {
            showSubscriptionError();
          }
        }
      });
    }
  
    // Validate email format
    function validateEmail(email) {
      return /^[^\s@]+@[^\s@]+\.[^\s@]+$/.test(email);
    }
  
    // Show subscription success message
    function showSubscriptionSuccess() {
      const successMessage = document.createElement("div");
      successMessage.className = "subscription-success";
      successMessage.textContent = "Thanks for subscribing!";
      successMessage.setAttribute("role", "alert");
  
      const subscriptionSection = document.querySelector(".subscription-section");
      subscriptionSection.appendChild(successMessage);
  
      setTimeout(() => {
        successMessage.remove();
      }, 3000);
    }
  
    // Show subscription error message
    function showSubscriptionError() {
      emailInput.classList.add("error");
      emailInput.setAttribute("aria-invalid", "true");
  
      setTimeout(() => {
        emailInput.classList.remove("error");
        emailInput.removeAttribute("aria-invalid");
      }, 3000);
    }
  
    // Add smooth scrolling to navigation links
    function initializeSmoothScroll() {
      document.querySelectorAll('a[href^="#"]').forEach((anchor) => {
        anchor.addEventListener("click", function (e) {
          e.preventDefault();
          const target = document.querySelector(this.getAttribute("href"));
          if (target) {
            target.scrollIntoView({
              behavior: "smooth",
            });
          }
        });
      });
    }
  
    // Initialize all event listeners
    function initializeEventListeners() {
      checkboxes.forEach((checkbox) => {
        checkbox.addEventListener("change", handleCheckboxChange);
      });
  
      form.addEventListener("submit", handleSubmit);
      handleEmailSubscription();
      initializeSmoothScroll();
    }
  
    // Add some CSS styles dynamically
    function addDynamicStyles() {
      const styles = `
        .selected {
          transform: scale(1.02);
          transition: transform 0.2s ease;
        }
  
        .success-message {
          text-align: center;
          padding: 20px;
          color: #52B9BC;
          font-size: 24px;
          font-weight: 600;
        }
  
        .subscription-success {
          color: #fff;
          background-color: #52B9BC;
          padding: 10px;
          border-radius: 5px;
          margin-top: 10px;
          text-align: center;
        }
  
        .error {
          border: 2px solid #ff0000;
          animation: shake 0.5s ease-in-out;
        }
  
        @keyframes shake {
          0%, 100% { transform: translateX(0); }
          25% { transform: translateX(-10px); }
          75% { transform: translateX(10px); }
        }
  
        .checkbox-option:focus-within {
          outline: 2px solid #52B9BC;
          outline-offset: 2px;
        }
  
        .next-button:disabled {
          opacity: 0.6;
          cursor: not-allowed;
        }
      `;
  
      const styleSheet = document.createElement("style");
      styleSheet.textContent = styles;
      document.head.appendChild(styleSheet);
    }
  
    // Initialize everything
    function initialize() {
      initializeAccessibility();
      initializeEventListeners();
      addDynamicStyles();
      updateNextButtonState();
    }
  
    // Start the application
    initialize();
  });
  