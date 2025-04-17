<?php
session_start();
$cart = $_SESSION['cart'] ?? [];

$imageMap = [
  "Costa Rica" => "img/officalSnakpack.png",
  "Brazil" => "https://cdn.builder.io/api/v1/image/assets/3a8ac60b581045f7adb5757904dc023c/419e01420e1294eb51dd8aef8ee00e66dd39ad43?placeholderIfAbsent=true",
  "India" => "https://cdn.builder.io/api/v1/image/assets/3a8ac60b581045f7adb5757904dc023c/59098eb45873caf5cd4414286e2adce48870a497?placeholderIfAbsent=true",
  "France" => "https://cdn.builder.io/api/v1/image/assets/3a8ac60b581045f7adb5757904dc023c/c55f27baa6005b5b93dfd6bf5c0a32c09132849d?placeholderIfAbsent=true"
];

$itemCounts = array_count_values($cart);
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Order Confirmation</title>
  <link rel="stylesheet" href="OrderConfirmation.css"/>
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

  <!-- MAIN FORM: user info and payment -->
  <div class="main-content">

<!-- Left side: Form for User Info + Payment -->
<div class="order-confirmation">
  <form class="form-section" method="POST" action="saveOrder.php">
    
    <h1 class="page-title">Confirm and Pay</h1>

    <!-- Your Info -->
    <h2>Your Info</h2>
    <input type="text" name="firstName" class="input-field" placeholder="First Name" required>
    <input type="text" name="lastName" class="input-field" placeholder="Last Name" required>
    <input type="text" name="userEmail" class="input-field" placeholder="Email" required>

    <!-- Shipping -->
    <h2>Shipping Address</h2>
    <input type="text" name="street" class="input-field" placeholder="Street Address" required>
    <input type="text" name="apt" class="input-field" placeholder="Apartment/Suite (Optional)">
    <input type="text" name="city" class="input-field" placeholder="City" required>
    <input type="text" name="state" class="input-field" placeholder="State" required>
    <input type="text" name="postal" class="input-field" placeholder="Postal Code" required>

    <!-- Contact -->
    <h2>Contact</h2>
    <input type="tel" name="mobile" class="input-field" placeholder="Mobile Number (Optional)">

    <!-- Payment Info -->
    <h2>Payment Information</h2>
    <input type="text" name="cardNumber" class="input-field" placeholder="Card Number" required>
    <input type="text" name="expiry" class="input-field" placeholder="MM/YY" required>
    <input type="text" name="cvv" class="input-field" placeholder="CVV" required>

    <!-- Submit button -->
    <button type="submit" class="submit-button">Confirm and Pay</button>

  </form>
</div>

<!-- Right side: Order Summary -->
<div class="summary-section">
  <div class="order-summary">
    <h2>Order Summary</h2>

    <?php if (!empty($itemCounts)): ?>
      <?php foreach ($itemCounts as $country => $quantity): ?>
        <div class="cart-item">
          <img src="<?= $imageMap[$country] ?? 'images/default.jpg' ?>" alt="<?= $country ?>" class="snack-thumbnail" style="width: 60px; height: 60px;">
          <p>✔️ <?= htmlspecialchars($country) ?> Box (<?= $quantity ?>)</p>

          <!-- Cart controls -->
          <div class="cart-controls">
            <form action="updateCart.php" method="post" style="display:inline;">
              <input type="hidden" name="country" value="<?= $country ?>">
              <input type="hidden" name="action" value="add">
              <button type="submit" class="cart-button">➕</button>
            </form>
            <form action="updateCart.php" method="post" style="display:inline;">
              <input type="hidden" name="country" value="<?= $country ?>">
              <input type="hidden" name="action" value="remove">
              <button type="submit" class="cart-button">➖</button>
            </form>
          </div>

        </div>
      <?php endforeach; ?>
    <?php else: ?>
      <p>Your cart is empty.</p>
    <?php endif; ?>

  </div> <!-- End order-summary -->
</div> <!-- End summary-section -->

</div> <!-- End main-content -->


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
        <img src="https://cdn.builder.io/api/v1/image/assets/3a8ac60b581045f7adb5757904dc023c/f89c283ce0c3abb2b61c851f7c23923b94294c89cca304d45ab82668cd0e2860" alt="Social icons" class="footer-logo-secondary" />
      </div>
      </div>
    </footer>

</body>
</html>