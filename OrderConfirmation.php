<?php
session_start();
$cart = $_SESSION['cart'] ?? [];

$imageMap = [
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
        <a href="Profile.html"><img src="https://cdn.builder.io/api/v1/image/assets/3a8ac60b581045f7adb5757904dc023c/5c2d06a0a77014efc50c9063afe3311802943bf3afc54f3d6c3bf6bad4069969?apiKey=3a8ac60b581045f7adb5757904dc023c&" class="cart-icon" alt="Profile" /></a>
      </div>
    </nav>
  </header>

  <!-- MAIN FORM: user info and payment -->
  <form class="order-confirmation" method="POST" action="saveOrder.php">
    <div style="width: 100%; display: flex; justify-content: center;">
      <h1 class="page-title">Confirm and Pay</h1>
    </div>

    <div class="main-content">
      <div class="content-wrapper">
        <section class="form-section">
          <div class="form-container">
            <h2 class="section-title">Your Info</h2>
            <input type="text" name="firstName" class="input-field" placeholder="First Name" required />
            <input type="text" name="lastName" class="input-field" placeholder="Last Name" required />

            <h2 class="section-title">Shipping Address</h2>
            <input type="text" name="street" class="input-field" placeholder="Street Address" required />
            <input type="text" name="apt" class="input-field" placeholder="Apartment/Suite (Optional)" />
            <input type="text" name="city" class="input-field" placeholder="City" required />
            <input type="text" name="state" class="input-field" placeholder="State" required />
            <input type="text" name="postal" class="input-field" placeholder="Postal Code" required />

            <h2 class="section-title">Contact</h2>
            <input type="tel" name="mobile" class="input-field" placeholder="Mobile Number (Optional)" />

            <div class="divider"></div>

            <h2 class="section-title">Payment Information</h2>
            <input type="text" name="cardNumber" class="input-field" placeholder="Card Number" required />
            <input type="text" name="expiry" class="input-field" placeholder="MM/YY" required />
            <input type="text" name="cvv" class="input-field" placeholder="CVV" required />
          </div>
        </section>
      </div>
    </div>

    <!-- Button to submit this full form -->
    <button type="submit" class="submit-button">Confirm and Pay</button>
  </form>

  <!-- SEPARATE FROM MAIN FORM: Cart item controls -->
  <section class="summary-section" id="order-summary">
    <div class="order-summary">
      <h2 class="summary-title">Order Summary</h2>

      <?php if (!empty($itemCounts)): ?>
        <?php foreach ($itemCounts as $country => $quantity): ?>
          <div class="cart-item">
            <img src="<?= $imageMap[$country] ?? 'images/default.jpg' ?>" alt="<?= $country ?>" class="snack-thumbnail" style="width: 60px; height: 60px;" />
            <p>✔️ <?= htmlspecialchars($country) ?> Box (<?= $quantity ?>)</p>

            <!-- Separate mini forms so they don't validate other inputs -->
            <div class="cart-controls" style="display:inline-flex; gap: 4px;">
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
    </div>
  </section>
</div>
</body>
</html>
