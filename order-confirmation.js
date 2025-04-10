// Form Elements
const checkoutForm = document.querySelector(".checkout-form");
const confirmPayButton = document.querySelector(".confirm-pay-button");
const cardInput = document.querySelector(".card-input");
const applePayButton = document.querySelector(".apple-pay-button");

// Input Fields
const inputFields = document.querySelectorAll(".input-field");
const requiredFields = [
  "First Name",
  "Last Name",
  "Street Address",
  "City",
  "State",
  "Postal Code",
];

// Validation Functions
function validateRequired(input) {
  const placeholder = input.placeholder;
  if (requiredFields.includes(placeholder) && !input.value.trim()) {
    showError(input, `${placeholder} is required`);
    return false;
  }
  return true;
}

function validatePostalCode(input) {
  if (input.placeholder === "Postal Code") {
    const postalRegex = /^\d{5}(-\d{4})?$/;
    if (!postalRegex.test(input.value.trim())) {
      showError(input, "Please enter a valid postal code");
      return false;
    }
  }
  return true;
}

function validatePhoneNumber(input) {
  if (input.placeholder === "Mobile Number (Optional)" && input.value.trim()) {
    const phoneRegex = /^\+?[\d\s-]{10,}$/;
    if (!phoneRegex.test(input.value.trim())) {
      showError(input, "Please enter a valid phone number");
      return false;
    }
  }
  return true;
}

// Error Handling
function showError(input, message) {
  removeError(input);
  const errorDiv = document.createElement("div");
  errorDiv.className = "error-message";
  errorDiv.style.color = "red";
  errorDiv.style.fontSize = "12px";
  errorDiv.style.marginTop = "5px";
  errorDiv.textContent = message;
  input.parentNode.insertBefore(errorDiv, input.nextSibling);
  input.style.borderColor = "red";
}

function removeError(input) {
  const existingError = input.nextSibling;
  if (existingError && existingError.className === "error-message") {
    existingError.remove();
  }
  input.style.borderColor = "#000";
}

// Input Formatting
function formatCardNumber(input) {
  let value = input.value.replace(/\D/g, "");
  value = value.replace(/(\d{4})(?=\d)/g, "$1 ");
  input.value = value;
}

// Loading State
function setLoadingState(isLoading) {
  confirmPayButton.disabled = isLoading;
  confirmPayButton.style.opacity = isLoading ? "0.7" : "1";
  confirmPayButton.textContent = isLoading
    ? "Processing..."
    : "Confirm and Pay";
}

// Form Submission
async function handleFormSubmit(event) {
  event.preventDefault();
  let isValid = true;

  // Clear previous errors
  inputFields.forEach((input) => removeError(input));

  // Validate all inputs
  inputFields.forEach((input) => {
    if (!validateRequired(input)) isValid = false;
    if (!validatePostalCode(input)) isValid = false;
    if (!validatePhoneNumber(input)) isValid = false;
  });

  if (!isValid) return;

  try {
    setLoadingState(true);

    // Simulate API call
    await new Promise((resolve) => setTimeout(resolve, 2000));

    // Success handling
    alert("Order placed successfully!");
    checkoutForm.reset();
  } catch (error) {
    alert("An error occurred while processing your order. Please try again.");
  } finally {
    setLoadingState(false);
  }
}

// Payment Method Toggle
function togglePaymentMethod(method) {
  if (method === "card") {
    cardInput.style.display = "flex";
    applePayButton.style.opacity = "0.5";
  } else {
    cardInput.style.display = "none";
    applePayButton.style.opacity = "1";
  }
}

// Event Listeners
document.addEventListener("DOMContentLoaded", () => {
  // Form submission
  checkoutForm.addEventListener("submit", handleFormSubmit);
  confirmPayButton.addEventListener("click", () =>
    checkoutForm.dispatchEvent(new Event("submit")),
  );

  // Input validation and formatting
  inputFields.forEach((input) => {
    input.addEventListener("blur", () => {
      validateRequired(input);
      validatePostalCode(input);
      validatePhoneNumber(input);
    });

    input.addEventListener("input", () => {
      removeError(input);
    });
  });

  // Payment method selection
  applePayButton.addEventListener("click", () => togglePaymentMethod("apple"));
  cardInput.addEventListener("click", () => togglePaymentMethod("card"));

  // Initialize card input formatting
  const cardNumberInput = document.querySelector(".card-number-group input");
  if (cardNumberInput) {
    cardNumberInput.addEventListener("input", (e) =>
      formatCardNumber(e.target),
    );
  }
});

// Price Calculations
const subtotal = 14.99;
const shipping = 4.99;
let taxes = 0;

function updateTotalPrice() {
  const total = subtotal + shipping + taxes;
  document.querySelector(".total-value").textContent = `$${total.toFixed(2)}`;
}

// Initialize prices
updateTotalPrice();
