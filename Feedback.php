<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Feedback Form</title>
  <link rel="stylesheet" href="feedback.css">
</head>
<body>
  <div class="feedback-container">
    <nav class="header-nav">
      <div class="logo-wrapper">
        <img src="https://cdn.builder.io/api/v1/image/assets/3a8ac60b581045f7adb5757904dc023c/d77088e823072b38e66701426a98af2216e9d7d8dfe2959ab2c7373573abca0e?apiKey=3a8ac60b581045f7adb5757904dc023c&" alt="Company Logo" class="logo">
      </div>
      <div class="nav-container">
        <div class="nav-links">
          <a href="HowItWorks.html">How It Works</a>
          <a href="Countries.html">Countries</a>
          <a href="GetStartedQ1.html">Get Started</a>
        </div>
        <div class="nav-icons">
          <img src="https://cdn.builder.io/api/v1/image/assets/3a8ac60b581045f7adb5757904dc023c/4b3c434ba154a80e5951ca4ebea5375461b10912552515a383f969138bbdbb50?apiKey=3a8ac60b581045f7adb5757904dc023c&" alt="Profile" class="profile-icon">
          <img src="https://cdn.builder.io/api/v1/image/assets/3a8ac60b581045f7adb5757904dc023c/5c2d06a0a77014efc50c9063afe3311802943bf3afc54f3d6c3bf6bad4069969?apiKey=3a8ac60b581045f7adb5757904dc023c&" alt="Menu" class="menu-icon">
        </div>
      </div>
    </nav>

    <main class="main-content">
      <h1 class="page-title">Customer Feedback Survey</h1>
      <form>
        <div class="rating-labels">
          <span>Very Satisfied</span>
          <span>Satisfied</span>
          <span>Neutral</span>
          <span>Unsatisfied</span>
          <span>Very Unsatisfied</span>
        </div>

        <div class="rating-group">
          <label class="rating-question">How satisfied are you with our product?</label>
          <div class="rating-options" role="radiogroup">
            <div class="rating-option" role="radio" tabindex="0">
              <div class="radio-circle"></div>
            </div>
            <div class="rating-option" role="radio" tabindex="0">
              <div class="radio-circle"></div>
            </div>
            <div class="rating-option" role="radio" tabindex="0">
              <div class="radio-circle"></div>
            </div>
            <div class="rating-option" role="radio" tabindex="0">
              <div class="radio-circle"></div>
            </div>
            <div class="rating-option" role="radio" tabindex="0">
              <div class="radio-circle"></div>
            </div>
          </div>
        </div>

        <label for="feedback" class="feedback-text">Tell us how we can improve</label>
        <textarea id="feedback" class="feedback-textarea" aria-label="Feedback text"></textarea>

        <label for="order" class="feedback-text">If this is about a specific order, please type in the order number</label>
        <input type="text" id="order" class="order-input" aria-label="Order number">

        <label class="feedback-text">Would you like a representative to contact you?</label>
        <div class="contact-options">
          <div class="radio-option">
            <input type="radio" id="contact-yes" name="contact" class="visually-hidden">
            <label for="contact-yes">Yes</label>
          </div>
          <div class="radio-option">
            <input type="radio" id="contact-no" name="contact" class="visually-hidden">
            <label for="contact-no">No</label>
          </div>
        </div>

        <button  type="submit"  class="submit-button">
          <a href="FormSubmitted.html">Submit</a>
      </button>

      </form>
    </main>

    <footer class="footer">
      <div class="footer-content">
        <form class="subscribe-section">
          <label for="email" class="subscribe-text">Subscribe for the latest updates:</label>
          <input type="email" id="email" class="email-input" placeholder="Email Address" aria-label="Email Address">
        </form>
        <nav class="footer-links">
          <a href="FAQs.html">FAQ</a>
          <a href="ContactUs.html">Contact Us</a>
          <a href="HowItWorks.html">How it Works</a>
          <a href="Countries.html">Countries</a>
          <a href="GetStartedQ1.html">Get Started</a>
        </nav>
        <img src="https://cdn.builder.io/api/v1/image/assets/3a8ac60b581045f7adb5757904dc023c/cbd4135796799d7f054c96872430269efb61968628230f9302caf2d546dbcd09?apiKey=3a8ac60b581045f7adb5757904dc023c&" alt="Footer Logo" class="footer-logo">
      </div>
    </footer>
  </div>
</body>
</html>
