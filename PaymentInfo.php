<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Payment Info</title>
  <link rel="stylesheet" href="PaymentInfo.css">
</head>
<body>
  <div class="countries-container">
  <header class="nav-header">
      <div class="nav-container">
              <img src="https://cdn.builder.io/api/v1/image/assets/3a8ac60b581045f7adb5757904dc023c/9e595b5f1fcde182a7dfc4c426d1f05c6b2789f1?placeholderIfAbsent=true" alt="Logo" class="main-logo" />
              <nav class="navigation-bar">
                <div class="nav-links">
                    <a href="HomePage.php" class="nav-link">Home</a>
                  <a href="HowItWorks.php" class="nav-link">How It Works</a>
                  <a href="Countries.php" class="nav-link">Countries</a>
                  <a href="index.php" class="nav-link">Get Started</a>
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
      <h1 class="page-title">Payment Info</h1>
      <section class="card-section">
  <h2 class="section-title">Current Card in Use</h2>
  <p class="card-type">Credit Card</p>

  <div class="card-input">
    <img src="creditcard.png" alt="Credit Card" class="card-icon" />
    <label for="cardNumber" class="visually-hidden">Card Number</label>
    <input type="text" id="cardNumber" value="0123 4567 8910" readonly />
  </div>

  <div class="security-row">
    <div class="input-group">
      <label for="cvc" class="input-label">CVC</label>
      <div class="input-field">
        <img src="CV.png" alt="CVC Icon" class="security-icon" />
        <input type="text" id="cvc" value="000" readonly />
      </div>
    </div>

    <div class="input-group">
      <label for="expiry" class="input-label">Date</label>
      <div class="input-field">
        <img src="date.png" alt="Calendar Icon" class="security-icon" />
        <input type="text" id="expiry" value="11/1111" readonly />
      </div>
    </div>
  </div>
</section>

      <div class="divider">
        <div class="divider-line"></div>
        <span>or</span>
        <div class="divider-line"></div>
      </div>
      <button class="apple-pay">
        <span>Pay with</span>
        <span>Pay</span>
      </button>
      <a href="FormSubmitted.html">
      <button class="submit-button">Submit</button>
      </a>
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
          <a href="index.php">Get Started</a>
        </nav>

        <div class="footer-brand">
        <img src="https://cdn.builder.io/api/v1/image/assets/3a8ac60b581045f7adb5757904dc023c/cbd4135796799d7f054c96872430269efb61968628230f9302caf2d546dbcd09" alt="Footer logo" class="footer-logo" />
      </div>
      <div class="social-icon">
        <img src="https://cdn.builder.io/api/v1/image/assets/3a8ac60b581045f7adb5757904dc023c/f89c283ce0c3abb2b61c851f7c23923b94294c89cca304d45ab82668cd0e2860" alt="Social icons" class="footer-logo-secondary" />
      </div>
      </div>
    </footer>
  </div>
</body>
</html>
