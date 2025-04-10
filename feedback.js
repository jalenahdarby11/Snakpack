document.addEventListener("DOMContentLoaded", function () {
    // Get form elements
    const form = document.querySelector("form");
    const radioButtons = document.querySelectorAll(".radio-outer");
    const feedbackTextarea = document.querySelector(".feedback-textarea");
    const orderInput = document.querySelector(".order-input");
    const yesNoOptions = document.querySelectorAll(".option-circle");
    const submitButton = document.querySelector(".submit-button");
  
    // Initialize form state
    const formState = {
      productSatisfaction: null,
      serviceSatisfaction: null,
      teamSatisfaction: null,
      improvementFeedback: "",
      orderNumber: "",
      contactPreference: null,
    };
  
    // Add click event listeners to all radio buttons
    radioButtons.forEach((radio, index) => {
      radio.addEventListener("click", function () {
        // Determine which question this radio belongs to
        const questionSection = this.closest(".question-section");
        const questionIndex = Array.from(
          document.querySelectorAll(".question-section"),
        ).indexOf(questionSection);
        const optionIndex = Array.from(
          questionSection.querySelectorAll(".radio-outer"),
        ).indexOf(this);
  
        // Clear previous selections in this question
        questionSection.querySelectorAll(".radio-inner").forEach((inner) => {
          inner.style.backgroundColor = "transparent";
        });
  
        // Mark this option as selected
        this.querySelector(".radio-inner").style.backgroundColor =
          "rgba(82, 185, 188, 1)";
  
        // Update form state
        if (questionIndex === 0) {
          formState.productSatisfaction = optionIndex;
        } else if (questionIndex === 1) {
          formState.serviceSatisfaction = optionIndex;
        } else if (questionIndex === 2) {
          formState.teamSatisfaction = optionIndex;
        }
      });
    });
  
    // Add click event listeners to yes/no options
    yesNoOptions.forEach((option, index) => {
      option.addEventListener("click", function () {
        // Clear previous selections
        yesNoOptions.forEach((opt) => {
          opt.style.backgroundColor = "transparent";
        });
  
        // Mark this option as selected
        this.style.backgroundColor = "rgba(82, 185, 188, 1)";
  
        // Update form state
        formState.contactPreference = index === 0 ? "yes" : "no";
      });
    });
  
    // Add input event listeners to text fields
    feedbackTextarea.addEventListener("input", function () {
      formState.improvementFeedback = this.value;
    });
  
    orderInput.addEventListener("input", function () {
      formState.orderNumber = this.value;
    });
  
    // Form validation function
    function validateForm() {
      let isValid = true;
      let errorMessage = "";
  
      // Check if at least one satisfaction rating is selected
      if (
        formState.productSatisfaction === null &&
        formState.serviceSatisfaction === null &&
        formState.teamSatisfaction === null
      ) {
        isValid = false;
        errorMessage += "Please select at least one satisfaction rating.\n";
      }
  
      // Check if contact preference is selected
      if (formState.contactPreference === null) {
        isValid = false;
        errorMessage += "Please select whether you would like to be contacted.\n";
      }
  
      return { isValid, errorMessage };
    }
  
    // Form submission handler
    form.addEventListener("submit", function (event) {
      event.preventDefault();
  
      const { isValid, errorMessage } = validateForm();
  
      if (!isValid) {
        alert(errorMessage);
        return;
      }
  
      // Simulate form submission
      submitButton.disabled = true;
      submitButton.textContent = "Submitting...";
  
      // Simulate API call with timeout
      setTimeout(() => {
        // Show success message
        alert(
          "Thank you for your feedback! Your response has been submitted successfully.",
        );
  
        // Reset form
        resetForm();
  
        // Re-enable submit button
        submitButton.disabled = false;
        submitButton.textContent = "Submit";
      }, 1500);
    });
  
    // Function to reset the form
    function resetForm() {
      // Clear all selections
      radioButtons.forEach((radio) => {
        radio.querySelector(".radio-inner").style.backgroundColor = "transparent";
      });
  
      yesNoOptions.forEach((option) => {
        option.style.backgroundColor = "transparent";
      });
  
      // Clear text inputs
      feedbackTextarea.value = "";
      orderInput.value = "";
  
      // Reset form state
      formState.productSatisfaction = null;
      formState.serviceSatisfaction = null;
      formState.teamSatisfaction = null;
      formState.improvementFeedback = "";
      formState.orderNumber = "";
      formState.contactPreference = null;
    }
  
    // Add hover effects for better UX
    const allClickableElements = [...radioButtons, ...yesNoOptions, submitButton];
  
    allClickableElements.forEach((element) => {
      element.addEventListener("mouseenter", function () {
        this.style.cursor = "pointer";
        if (this === submitButton) {
          this.style.backgroundColor = "rgba(236, 167, 44, 0.9)";
        } else {
          this.style.borderColor = "rgba(82, 185, 188, 1)";
        }
      });
  
      element.addEventListener("mouseleave", function () {
        if (this === submitButton) {
          this.style.backgroundColor = "rgba(236, 167, 44, 1)";
        } else {
          this.style.borderColor = "rgba(123, 123, 123, 1)";
        }
      });
    });
  
    // Add focus styles for accessibility
    const focusableElements = [feedbackTextarea, orderInput, submitButton];
  
    focusableElements.forEach((element) => {
      element.addEventListener("focus", function () {
        this.style.outline = "2px solid rgba(82, 185, 188, 1)";
      });
  
      element.addEventListener("blur", function () {
        this.style.outline = "none";
      });
    });
  });
  