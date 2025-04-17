<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Settings</title>
  <link rel="stylesheet" href="settings.css" />
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

  <h1 class="page-title">Settings</h1>

  <div class="options-grid-top">
    <div class="options-row">
      <div class="option-column">
        <div class="option-card">
          <div class="option-content" tabindex="0" role="button">
            <span class="option-title">Change Address</span>
            <a href="ChangeAddress.html">
              <img src="https://cdn.builder.io/api/v1/image/assets/3a8ac60b581045f7adb5757904dc023c/e64a37b06ca9614ed18c1311508ae38d192f757def8ca85109d0e952455fb2b6?apiKey=3a8ac60b581045f7adb5757904dc023c&" alt="Change address icon" class="option-icon" />
            </a>
          </div>
        </div>
      </div>
      <div class="option-column">
        <div class="option-card">
          <div class="option-content" tabindex="0" role="button">
            <span class="option-title">Feedback</span>
            <a href="Feedback.html">
              <img src="https://cdn.builder.io/api/v1/image/assets/3a8ac60b581045f7adb5757904dc023c/e67b10e280fd8acd07ba5697609a1b540cb1a4fb4a8df2d16f4c09cff3a2ddc4?apiKey=3a8ac60b581045f7adb5757904dc023c&" alt="Feedback icon" class="option-icon" />
            </a>
          </div>
        </div>
      </div>
      <div class="option-column">
        <div class="option-card">
          <div class="option-content" tabindex="0" role="button">
            <span class="option-title">Payment Information</span>
            <a href="PaymentInfo.html">
              <img src="https://cdn.builder.io/api/v1/image/assets/3a8ac60b581045f7adb5757904dc023c/6d50c94c0b86ec3e72ed7289c8b14a5fd7527de68b0813f41227ad2cd311881e?apiKey=3a8ac60b581045f7adb5757904dc023c&" alt="Payment information icon" class="option-icon" />
            </a>
          </div>
        </div>
      </div>
    </div>
  </div>

  <div class="options-grid-top">
    <div class="options-row">
      <div class="option-column">
        <div class="option-card">
          <div class="option-content" tabindex="0" role="button">
            <span class="option-title">Gift Cards</span>
            <a href="GiftCards.html">
              <img src="https://cdn.builder.io/api/v1/image/assets/3a8ac60b581045f7adb5757904dc023c/071dddd56793132a1d18c2805633c79b139fcdb15e67d7376c1d4c02d47aa401?apiKey=3a8ac60b581045f7adb5757904dc023c&" alt="Gift cards icon" class="option-icon" />
            </a>
          </div>
        </div>
      </div>
      <div class="option-column">
        <div class="option-card">
          <div class="option-content" tabindex="0" role="button">
            <span class="option-title">Previous Orders</span>
            <a href="PreviousOrders.php">
              <img src="https://cdn.builder.io/api/v1/image/assets/3a8ac60b581045f7adb5757904dc023c/5af9bda6ba0ccf0d79c361164c8c9969146848b076901036bccc2f3769bddc47?apiKey=3a8ac60b581045f7adb5757904dc023c&" alt="Previous orders icon" class="option-icon" />
            </a>
          </div>
        </div>
      </div>
      <div class="option-column">
        <div class="option-card">
          <div class="option-content" tabindex="0" role="button">
            <span class="option-title">Contact Us</span>
            <a href="ContactUs.html">
              <img src="https://cdn.builder.io/api/v1/image/assets/3a8ac60b581045f7adb5757904dc023c/3c11867e3b36a6085f251be52f6fc734ff999ea338d60dc89efcbbb96c176cf2?apiKey=3a8ac60b581045f7adb5757904dc023c&" alt="Contact us icon" class="option-icon" />
            </a>
          </div>
        </div>
      </div>
    </div>
  </div>

  </div> <!-- CLOSE .countries-container -->

<footer class="main-footer">
  <div class="footer-content">
    <div class="newsletter-section">
      <h3 class="newsletter-title">Subscribe for the latest updates:</h3>
      <input type="email" placeholder="Email Address" class="email-input" />
    </div>

    <nav class="footer-nav">
      <a href="FAQs.php">FAQ</a>
      <a href="ContactUs.php">Contact Us</a>
      <a href="HowItWorks.php">How it Works</a>
      <a href="Countries.php">Countries</a>
      <a href="GetStarted.php">Get Started</a>
    </nav>

    <div class="footer-brand">
      <img src="https://cdn.builder.io/api/v1/image/assets/3a8ac60b581045f7adb5757904dc023c/cbd4135796799d7f054c96872430269efb61968628230f9302caf2d546dbcd09?apiKey=3a8ac60b581045f7adb5757904dc023c&" alt="Primary footer logo" class="footer-logo" />
    </div>

    <div class="footer-socials">
       <img src="https://cdn.builder.io/api/v1/image/assets/3a8ac60b581045f7adb5757904dc023c/f89c283ce0c3abb2b61c851f7c23923b94294c89cca304d45ab82668cd0e2860" alt="Social icons" class="footer-logo-secondary" />
    </div>

  </div>
</footer>

</body>
</html>

