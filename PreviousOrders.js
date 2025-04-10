/**
 * Previous Orders Page JavaScript
 * Handles all interactive functionality for the previous orders page
 */

// Initialize the page when DOM is fully loaded
document.addEventListener("DOMContentLoaded", () => {
    // Original script functionality
    initializeOriginalFunctionality();
  
    // Initialize new functionality
    initializeEmailSubscription();
    initializeOrderDetailsToggle();
    initializeFeedbackButton();
    initializeNavigation();
  });
  
  /**
   * Initialize the original functionality from the provided script
   */
  function initializeOriginalFunctionality() {
    const state = {};
    let nodesToDestroy = [];
    let pendingUpdate = false;
  
    function destroyAnyNodes() {
      // destroy current view template refs before rendering again
      nodesToDestroy.forEach((el) => el.remove());
      nodesToDestroy = [];
    }
  
    // Function to update data bindings and loops
    function update() {
      if (pendingUpdate === true) {
        return;
      }
      pendingUpdate = true;
  
      document.querySelectorAll("[data-el='div-1']").forEach((el) => {
        el.setAttribute("space", 11);
      });
  
      destroyAnyNodes();
  
      pendingUpdate = false;
    }
  
    // Update with initial state on first load
    update();
  }
  
  /**
   * Initialize email subscription functionality
   */
  function initializeEmailSubscription() {
    const emailInput = document.querySelector(".email-input");
  
    if (emailInput) {
      // Convert to input field if it's not already
      if (emailInput.tagName !== "INPUT") {
        const placeholder = emailInput.textContent;
        const parentElement = emailInput.parentElement;
  
        // Create form element
        const form = document.createElement("form");
        form.className = "subscription-form";
        form.addEventListener("submit", handleSubscriptionSubmit);
  
        // Create input element
        const input = document.createElement("input");
        input.type = "email";
        input.placeholder = placeholder;
        input.className = "email-input";
        input.required = true;
  
        // Create submit button
        const button = document.createElement("button");
        button.type = "submit";
        button.className = "subscribe-button";
        button.textContent = "Subscribe";
  
        // Replace the original element
        form.appendChild(input);
        form.appendChild(button);
        parentElement.replaceChild(form, emailInput);
      }
    }
  }
  
  /**
   * Handle subscription form submission
   * @param {Event} event - The form submission event
   */
  function handleSubscriptionSubmit(event) {
    event.preventDefault();
    const email = event.target.querySelector('input[type="email"]').value;
  
    // Here you would typically send this to a server
    console.log(`Subscription requested for: ${email}`);
  
    // Show success message
    const successMessage = document.createElement("div");
    successMessage.className = "subscription-success";
    successMessage.textContent = "Thank you for subscribing!";
  
    event.target.innerHTML = "";
    event.target.appendChild(successMessage);
  }
  
  /**
   * Initialize order details toggle functionality
   */
  function initializeOrderDetailsToggle() {
    const descriptionContainer = document.querySelector(
      ".product-description-container",
    );
    const descriptionText = document.querySelector(".description-text");
  
    if (descriptionContainer && descriptionText) {
      // Create toggle button
      const toggleButton = document.createElement("button");
      toggleButton.className = "toggle-description";
      toggleButton.textContent = "Show Less";
      toggleButton.setAttribute("aria-expanded", "true");
  
      // Add toggle functionality
      toggleButton.addEventListener("click", () => {
        const isExpanded = toggleButton.getAttribute("aria-expanded") === "true";
  
        if (isExpanded) {
          // Collapse
          descriptionText.classList.add("collapsed");
          toggleButton.textContent = "Show More";
          toggleButton.setAttribute("aria-expanded", "false");
        } else {
          // Expand
          descriptionText.classList.remove("collapsed");
          toggleButton.textContent = "Show Less";
          toggleButton.setAttribute("aria-expanded", "true");
        }
      });
  
      // Add the toggle button to the container
      descriptionContainer.appendChild(toggleButton);
    }
  
    // Make order number section expandable
    const orderHeader = document.querySelector(".order-header");
    const orderActions = document.querySelector(".order-actions");
  
    if (orderHeader && orderActions) {
      orderHeader.addEventListener("click", (event) => {
        // Don't toggle if clicking on links
        if (event.target.tagName === "A") return;
  
        orderActions.classList.toggle("expanded");
      });
    }
  }
  
  /**
   * Initialize customer feedback button functionality
   */
  function initializeFeedbackButton() {
    const feedbackButton = document.querySelector(".feedback-button");
  
    if (feedbackButton) {
      feedbackButton.addEventListener("click", () => {
        // Create modal for feedback
        const modal = document.createElement("div");
        modal.className = "feedback-modal";
  
        const modalContent = document.createElement("div");
        modalContent.className = "feedback-modal-content";
  
        const closeButton = document.createElement("button");
        closeButton.className = "close-modal";
        closeButton.innerHTML = "&times;";
        closeButton.addEventListener("click", () => {
          document.body.removeChild(modal);
        });
  
        const title = document.createElement("h2");
        title.textContent = "Share Your Feedback";
  
        const form = document.createElement("form");
        form.innerHTML = `
          <div class="form-group">
            <label for="rating">Rating:</label>
            <div class="star-rating">
              <span class="star" data-rating="1">★</span>
              <span class="star" data-rating="2">★</span>
              <span class="star" data-rating="3">★</span>
              <span class="star" data-rating="4">★</span>
              <span class="star" data-rating="5">★</span>
            </div>
          </div>
          <div class="form-group">
            <label for="feedback-text">Your Feedback:</label>
            <textarea id="feedback-text" rows="4" required></textarea>
          </div>
          <button type="submit" class="submit-feedback">Submit Feedback</button>
        `;
  
        // Add star rating functionality
        form.addEventListener("submit", (e) => {
          e.preventDefault();
          const feedbackText = form.querySelector("#feedback-text").value;
          const rating =
            form.querySelector(".star.selected")?.dataset.rating || 0;
  
          console.log(`Feedback submitted: ${rating} stars, "${feedbackText}"`);
  
          // Replace form with thank you message
          modalContent.innerHTML = "";
          const thankYou = document.createElement("div");
          thankYou.className = "feedback-thank-you";
          thankYou.innerHTML = `
            <h2>Thank You!</h2>
            <p>Your feedback has been submitted successfully.</p>
            <button class="close-thank-you">Close</button>
          `;
  
          thankYou
            .querySelector(".close-thank-you")
            .addEventListener("click", () => {
              document.body.removeChild(modal);
            });
  
          modalContent.appendChild(thankYou);
        });
  
        // Add star rating functionality
        form.querySelectorAll(".star").forEach((star) => {
          star.addEventListener("click", () => {
            const rating = star.dataset.rating;
  
            // Clear all selected stars
            form.querySelectorAll(".star").forEach((s) => {
              s.classList.remove("selected");
            });
  
            // Select stars up to the clicked one
            form
              .querySelectorAll(
                `.star[data-rating="${rating}"], .star[data-rating="${rating}"] ~ .star`,
              )
              .forEach((s) => {
                if (parseInt(s.dataset.rating) <= parseInt(rating)) {
                  s.classList.add("selected");
                }
              });
          });
        });
  
        modalContent.appendChild(closeButton);
        modalContent.appendChild(title);
        modalContent.appendChild(form);
        modal.appendChild(modalContent);
  
        document.body.appendChild(modal);
      });
    }
  }
  
  /**
   * Initialize navigation functionality
   */
  function initializeNavigation() {
    // Make navigation links interactive
    const navLinks = document.querySelectorAll(".nav-link, .footer-link");
  
    navLinks.forEach((link) => {
      link.addEventListener("click", (event) => {
        event.preventDefault();
        console.log(`Navigating to: ${link.textContent}`);
  
        // Here you would typically handle navigation
        // For now, just add an active class
        navLinks.forEach((l) => l.classList.remove("active"));
        link.classList.add("active");
      });
    });
  }
  