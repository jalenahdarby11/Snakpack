// Wait for the DOM to be fully loaded before executing JavaScript
document.addEventListener("DOMContentLoaded", function () {
    // Get references to key elements
    const confirmationPage = document.querySelector(".order-confirmation-page");
    const confirmationTitle = document.querySelector(".confirmation-title");
    const confirmationMessage = document.querySelector(".confirmation-message");
    const returnHomeButton = document.querySelector(".return-home-button");
    const successIcon = document.querySelector(".success-icon");
  
    // Add animation classes to elements when page loads
    function animateElements() {
      // Add fade-in animation to elements
      confirmationTitle.classList.add("animate-fade-in");
      confirmationMessage.classList.add("animate-fade-in");
      successIcon.classList.add("animate-bounce");
  
      // Delay the button animation
      setTimeout(() => {
        returnHomeButton.classList.add("animate-fade-in");
      }, 500);
    }
  
    // Handle the return home button click
    function setupReturnHomeButton() {
      if (returnHomeButton) {
        returnHomeButton.addEventListener("click", function (e) {
          e.preventDefault();
  
          // Add exit animation
          confirmationPage.classList.add("animate-fade-out");
  
          // Simulate navigation after animation completes
          setTimeout(() => {
            // In a real application, this would navigate to the home page
            // For now, we'll just log a message
            console.log("Navigating to home page...");
  
            // For demo purposes, you could redirect to a homepage
            // window.location.href = 'index.html';
  
            // For this example, we'll just reload the current page
            window.location.href = 'HomePage.html';
          }, 300);
        });
      }
    }
  
    // Simulate loading order details (in a real app, this would fetch from an API)
    function loadOrderDetails() {
      // Simulate API call delay
      setTimeout(() => {
        console.log("Order details loaded successfully");
  
        // You could populate order details here if there was a section for them
        // For example:
        // const orderNumber = generateOrderNumber();
        // document.querySelector('.order-number').textContent = orderNumber;
      }, 800);
    }
  
    // Generate a random order number (for demonstration purposes)
    function generateOrderNumber() {
      return "ORD-" + Math.floor(100000 + Math.random() * 900000);
    }
  
    // Add hover effect to the return home button
    function setupButtonEffects() {
      if (returnHomeButton) {
        returnHomeButton.addEventListener("mouseenter", function () {
          this.style.backgroundColor = "rgba(245, 183, 67, 1)";
          this.style.transform = "scale(1.02)";
        });
  
        returnHomeButton.addEventListener("mouseleave", function () {
          this.style.backgroundColor = "rgba(236, 167, 44, 1)";
          this.style.transform = "scale(1)";
        });
  
        // Add focus styles for accessibility
        returnHomeButton.addEventListener("focus", function () {
          this.style.outline = "3px solid rgba(0, 0, 0, 0.3)";
          this.style.backgroundColor = "rgba(245, 183, 67, 1)";
        });
  
        returnHomeButton.addEventListener("blur", function () {
          this.style.outline = "none";
          this.style.backgroundColor = "rgba(236, 167, 44, 1)";
        });
      }
    }
  
    // Initialize all functionality
    function init() {
      animateElements();
      setupReturnHomeButton();
      loadOrderDetails();
      setupButtonEffects();
  
      console.log("Order confirmation page initialized");
    }
  
    // Start the application
    init();
  });
  