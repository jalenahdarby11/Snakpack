<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Gift Cards</title>
  <link rel="stylesheet" href="giftcards.css">
</head>
<body>

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
      <h1 class="page-title">Gift Card Balance</h1>

      <section class="balance-display">
        <p class="balance-label">Your Gift Card Balance</p>
        <p class="balance-amount">Total: $0.00</p>
      </section>

      <section class="transaction-history">
        <h2 class="section-title">Gift Card History</h2>
        <div class="transaction-table">
          <div class="table-header">
            <span class="header-cell">Date</span>
            <span class="header-cell">Description</span>
            <div class="amount-columns">
              <span class="header-cell">Amount</span>
              <span class="header-cell">Closing Balance</span>
            </div>
          </div>
          <div class="transaction-row">
            <span class="date-cell">February 15, 2000</span>
            <span class="description-cell">Gift Card Applied to: UK SnakPack</span>
            <span class="amount-cell">-$30.00</span>
            <span class="balance-cell">$0.00</span>
          </div>
          <div class="transaction-row">
            <span class="date-cell">January 13, 2012</span>
            <span class="description-cell">Gift Card Applied to: Greece SnakPack</span>
            <span class="amount-cell">-$30.00</span>
            <span class="balance-cell">$0.00</span>
          </div>
          <div class="transaction-row">
            <span class="date-cell">January 30, 2024</span>
            <span class="description-cell">Gift Card Applied to: Greece SnakPack</span>
            <span class="amount-cell">-$30.00</span>
            <span class="balance-cell">$0.00</span>
          </div>
        </div>
      </section>

      <section class="add-card-section">
        <h2 class="section-title">Add Gift Card</h2>
        <h3 class="subsection-title">Add Gift Card</h3>
        <form class="gift-card-form">
          <div class="card-number-input">
            <label for="cardNumber" class="visually-hidden">Card Number</label>
            <img
              loading="lazy"
              src="https://cdn.builder.io/api/v1/image/assets/3a8ac60b581045f7adb5757904dc023c/0054688d81a7b4137c8818968f672be26545c12c24e0966f95738e991beb8424?apiKey=3a8ac60b581045f7adb5757904dc023c&"
              alt="Card Icon"
              class="input-icon"
            />
            <input type="text" id="cardNumber" class="card-input" placeholder="0123 4567 8910" pattern="[0-9\s]{13,19}" required />
          </div>
          <div class="card-details">
            <div class="cvc-wrapper">
              <label for="cvc" class="visually-hidden">CVC</label>
              <div class="input-group">
                <img
                  loading="lazy"
                  src="https://cdn.builder.io/api/v1/image/assets/3a8ac60b581045f7adb5757904dc023c/b286329d30d9b2bad13bb365389050b35fc3d92810625e625af97b1dc622c7d8?apiKey=3a8ac60b581045f7adb5757904dc023c&"
                  alt="CVC Icon"
                  class="input-icon"
                />
                <input type="text" id="cvc" class="security-input" placeholder="234" pattern="[0-9]{3,4}" required />
              </div>
            </div>
            <div class="expiry-wrapper">
              <label for="expiry" class="visually-hidden">Expiration Date</label>
              <div class="input-group">
                <img
                  loading="lazy"
                  src="https://cdn.builder.io/api/v1/image/assets/3a8ac60b581045f7adb5757904dc023c/671073e16f9f2bf5891eb4562370f8761ac4a0f5fcc07e7f4266b98539ca4dc0?apiKey=3a8ac60b581045f7adb5757904dc023c&"
                  alt="Calendar Icon"
                  class="input-icon"
                />
                <input type="text" id="expiry" class="expiry-input" placeholder="02/2035" pattern="(0[1-9]|1[0-2])\/[0-9]{4}" required />
              </div>
            </div>
          </div>
          <a href="FormSubmitted.html">
          <button type="submit" class="submit-button">Submit</button>
        </a>
        </form>
      </section>
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
