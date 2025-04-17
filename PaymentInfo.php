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
    <header class="header-section">
      <img src="https://cdn.builder.io/api/v1/image/assets/3a8ac60b581045f7adb5757904dc023c/d77088e823072b38e66701426a98af2216e9d7d8dfe2959ab2c7373573abca0e?apiKey=3a8ac60b581045f7adb5757904dc023c&" alt="Company Logo" class="logo">
      <nav class="nav-container">
        <div class="nav-links">
          <a href="HowItWorks.html">How It Works</a>
          <a href="Countries.html">Countries</a>
          <a href="GetStartedQ1.html">Get Started</a>
        </div>
        <div class="nav-icons">

      
          
          <a href="ShoppingCart.html">
            <img src="https://cdn.builder.io/api/v1/image/assets/3a8ac60b581045f7adb5757904dc023c/4b3c434ba154a80e5951ca4ebea5375461b10912552515a383f969138bbdbb50?apiKey=3a8ac60b581045f7adb5757904dc023c&" 
              alt="Shopping Cart" 
              class="social-icon" />
          </a>

          <a href="Profile.html">
            <img src="https://cdn.builder.io/api/v1/image/assets/3a8ac60b581045f7adb5757904dc023c/5c2d06a0a77014efc50c9063afe3311802943bf3afc54f3d6c3bf6bad4069969?apiKey=3a8ac60b581045f7adb5757904dc023c&" 
          alt="Profile Icon" 
          class="cart-icon" />
          </a>

        
          
        </div>
      </nav>
    </header>





    <main class="main-content">
      <h1 class="page-title">Payment Info</h1>
      <section class="card-section">
        <h2 class="section-title">Current Card in Use</h2>
        <p class="card-type">Credit Card</p>
        <form class="card-input">
          <div class="card-number-group">
            <img src="creditcard.png" alt="Credit Card" class="card-icon">
            <label for="cardNumber" class="visually-hidden">Card Number</label>
            <input type="text" id="cardNumber" value="0123 4567 8910" readonly>
          </div>
        </form>
        <div class="security-group">
          <div class="input-group">
            <label for="cvc" class="input-label">CVC</label>
            <div class="input-field">
              <img src="CV.png" alt="CVC Icon" class="security-icon">
              <input type="text" id="cvc" value="000" readonly>
            </div>
          </div>
          <div class="input-group">
            <label for="expiry" class="input-label">Date</label>
            <div class="input-field">
              <img src="date.png" alt="Calendar Icon" class="security-icon">
              <input type="text" id="expiry" value="11/1111" readonly>
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
    <footer class="footer">
      <div class="footer-content">
        <div class="subscribe-group">
          <h2 class="subscribe-text">Subscribe for the latest updates:</h2>
          <form>
            <label for="email" class="visually-hidden">Email Address</label>
            <input type="email" id="email" class="email-input" placeholder="Email Address">
          </form>
        </div>
        <nav class="footer-links">
          <a href="FAQs.html">FAQ</a>
          <a href="ContactUs.html">Contact Us</a>
          <a href="HowItWorks.html">How it Works</a>
          <a href="Countries.html">Countries</a>
          <a href="GetStartedQ1.html">Get Started</a>
        </nav>
      </div>
    </footer>
  </div>
</body>
</html>
