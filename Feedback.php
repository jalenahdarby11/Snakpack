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
  <header class="nav-header">
      <div class="nav-container">
              <img src="https://cdn.builder.io/api/v1/image/assets/3a8ac60b581045f7adb5757904dc023c/9e595b5f1fcde182a7dfc4c426d1f05c6b2789f1?placeholderIfAbsent=true" alt="Logo" class="main-logo" />
              <nav class="navigation-bar">
                <div class="nav-links">
                    <a href="HomePage.php" class="nav-link">Home</a>
                  <a href="HowItWorks.php" class="nav-link">How It Works</a>
                  <a href="Countries.php" class="nav-link">Countries</a>
                  <a href="php/index.php" class="nav-link">Get Started</a>
                </div>
                <div class="nav-icons">

                    <a href="OrderConfirmation.php">
                  <img src="https://cdn.builder.io/api/v1/image/assets/3a8ac60b581045f7adb5757904dc023c/edadf950090628a4467326f5ac2e7e6a6c82bdb8?placeholderIfAbsent=true" alt="User Icon" class="nav-icon" />
                </a>

                <?php session_start(); ?>
                <a href="<?php echo isset($_SESSION['userEmail']) ? 'Profile2.php' : 'Profile.php'; ?>">
                    <img src="https://cdn.builder.io/api/v1/image/assets/3a8ac60b581045f7adb5757904dc023c/81178d926783336ee4924fea04237c405ade17aa?placeholderIfAbsent=true" alt="Profile Icon" class="nav-icon menu-icon" />
                </a>

        </div>
      </nav>
    </div>
  </header>

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

        <button type="submit" class="submit-button">Submit</button>


      </form>
    </main>

    <footer class="main-footer">
      <div class="footer-content">
        <h3 class="newsletter-title">Subscribe for the latest updates:</h3>
        <input type="email" placeholder="Email Address" class="email-input" />

        <nav class="footer-nav">
          <a href="FAQs.php">FAQ</a>
          <a href="ContactUs.php">Contact Us</a>
          <a href="HowItWorks.php">How it Works</a>
          <a href="Countries.php">Countries</a>
          <a href="php/index.php">Get Started</a>
        </nav>

        <div class="footer-brand">
        <img src="https://cdn.builder.io/api/v1/image/assets/3a8ac60b581045f7adb5757904dc023c/cbd4135796799d7f054c96872430269efb61968628230f9302caf2d546dbcd09" alt="Footer logo" class="footer-logo" />
      </div>
      <div class="social-icon">
        <img src="https://cdn.builder.io/api/v1/image/assets/3a8ac60b581045f7adb5757904dc023c/f89c283ce0c3abb2b61c851f7c23923b94294c89cca304d45ab82668cd0e2860" alt="Social icons" class="footer-image" />
      </div>
      </div>
    </footer>
  </div>
</body>
</html>
