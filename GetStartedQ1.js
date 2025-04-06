// Quiz state management
let selectedFlavors = new Set();

// DOM Elements
document.addEventListener("DOMContentLoaded", () => {
  const flavorOptions = document.querySelectorAll(".flavor-option");
  const nextButton = document.querySelector(".next-button");
  const emailInput = document.querySelector(".email-input");
  const navLinks = document.querySelectorAll(".nav-link");

  // Handle flavor selection
  flavorOptions.forEach((option) => {
    option.addEventListener("click", () => {
      const flavorText = option.querySelector(".flavor-text").textContent;
      const checkbox = option.querySelector(".checkbox");

      if (selectedFlavors.has(flavorText)) {
        selectedFlavors.delete(flavorText);
        checkbox.style.backgroundColor = "rgba(245, 245, 245, 1)";
        option.setAttribute("aria-checked", "false");
      } else {
        selectedFlavors.add(flavorText);
        checkbox.style.backgroundColor = "#52B9BC";
        option.setAttribute("aria-checked", "true");
      }

      // Enable/disable next button based on selection
      nextButton.disabled = selectedFlavors.size === 0;
      nextButton.style.opacity = selectedFlavors.size === 0 ? "0.5" : "1";
    });

    // Add accessibility attributes
    option.setAttribute("role", "checkbox");
    option.setAttribute("aria-checked", "false");
    option.setAttribute("tabindex", "0");

    // Handle keyboard interaction
    option.addEventListener("keypress", (e) => {
      if (e.key === "Enter" || e.key === " ") {
        e.preventDefault();
        option.click();
      }
    });
  });

  // Handle next button click
  nextButton.addEventListener("click", () => {
    if (selectedFlavors.size > 0) {
      // Here you would typically handle the next step of the quiz
      console.log("Selected flavors:", Array.from(selectedFlavors));
    }
  });

  // Email subscription validation and handling
  emailInput.addEventListener("input", (e) => {
    const email = e.target.value;
    const isValid = /^[^\s@]+@[^\s@]+\.[^\s@]+$/.test(email);
    emailInput.style.borderColor = isValid ? "#52B9BC" : "red";
  });

  emailInput.addEventListener("keypress", (e) => {
    if (e.key === "Enter") {
      e.preventDefault();
      const email = e.target.value;
      if (/^[^\s@]+@[^\s@]+\.[^\s@]+$/.test(email)) {
        // Here you would typically handle the subscription
        console.log("Subscribing email:", email);
        showSubscriptionMessage("Thank you for subscribing!");
      } else {
        showSubscriptionMessage("Please enter a valid email address", true);
      }
    }
  });

  // Smooth scrolling for navigation links
  navLinks.forEach((link) => {
    link.addEventListener("click", (e) => {
      e.preventDefault();
      const targetId = link.getAttribute("href").slice(1);
      const targetElement = document.getElementById(targetId);
      if (targetElement) {
        targetElement.scrollIntoView({
          behavior: "smooth",
          block: "start",
        });
      }
    });
  });
});

// Helper function to show subscription messages
function showSubscriptionMessage(message, isError = false) {
  const existingMessage = document.querySelector(".subscription-message");
  if (existingMessage) {
    existingMessage.remove();
  }

  const messageElement = document.createElement("div");
  messageElement.className = "subscription-message";
  messageElement.textContent = message;
  messageElement.style.cssText = `
    position: fixed;
    bottom: 20px;
    right: 20px;
    padding: 10px 20px;
    border-radius: 5px;
    background-color: ${isError ? "#ff4444" : "#52B9BC"};
    color: white;
    font-family: Poppins, sans-serif;
    animation: fadeIn 0.3s ease-in-out;
  `;

  document.body.appendChild(messageElement);

  setTimeout(() => {
    messageElement.style.animation = "fadeOut 0.3s ease-in-out";
    setTimeout(() => messageElement.remove(), 300);
  }, 3000);
}

// Add necessary CSS animations
const style = document.createElement("style");
style.textContent = `
  @keyframes fadeIn {
    from { opacity: 0; transform: translateY(20px); }
    to { opacity: 1; transform: translateY(0); }
  }

  @keyframes fadeOut {
    from { opacity: 1; transform: translateY(0); }
    to { opacity: 0; transform: translateY(20px); }
  }
`;
document.head.appendChild(style);
