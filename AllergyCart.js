// Quantity control functionality
document.addEventListener("DOMContentLoaded", function () {
    const quantityControls = document.querySelectorAll(".quantity-controls");
  
    quantityControls.forEach((control) => {
      const plusBtn = control.querySelector(".plus-btn");
      const minusBtn = control.querySelector(".minus-btn");
      const quantityDisplay = control.querySelector(".quantity");
      let quantity = 1;
  
      plusBtn.addEventListener("click", () => {
        quantity++;
        quantityDisplay.textContent = quantity;
      });
  
      minusBtn.addEventListener("click", () => {
        if (quantity > 1) {
          quantity--;
          quantityDisplay.textContent = quantity;
        }
      });
    });
  
    // Email validation for footer subscription
    const emailInput = document.querySelector(".email-input");
    emailInput.addEventListener("input", function () {
      const email = this.value;
      const emailPattern = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
  
      if (emailPattern.test(email)) {
        this.setCustomValidity("");
      } else {
        this.setCustomValidity("Please enter a valid email address");
      }
    });
  });
  