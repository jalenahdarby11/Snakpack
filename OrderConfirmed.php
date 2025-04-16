<?php
session_start();
$order = $_SESSION['order'] ?? null;

$imageMap = [
    "Brazil" => "https://cdn.builder.io/api/v1/image/assets/3a8ac60b581045f7adb5757904dc023c/419e01420e1294eb51dd8aef8ee00e66dd39ad43?placeholderIfAbsent=true",
    "India" => "https://cdn.builder.io/api/v1/image/assets/3a8ac60b581045f7adb5757904dc023c/59098eb45873caf5cd4414286e2adce48870a497?placeholderIfAbsent=true",
    "France" => "https://cdn.builder.io/api/v1/image/assets/3a8ac60b581045f7adb5757904dc023c/c55f27baa6005b5b93dfd6bf5c0a32c09132849d?placeholderIfAbsent=true"
];
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <title>Order Confirmed</title>
  <link rel="stylesheet" href="OrderConfirmed.css">
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
              alt="Shopping Cart" class="social-icon" />
          </a>
          <a href="Profile.html">
            <img src="https://cdn.builder.io/api/v1/image/assets/3a8ac60b581045f7adb5757904dc023c/5c2d06a0a77014efc50c9063afe3311802943bf3afc54f3d6c3bf6bad4069969?apiKey=3a8ac60b581045f7adb5757904dc023c&" 
              alt="Profile Icon" class="cart-icon" />
          </a>
        </div>
      </nav>
    </header>

    <div class="order-confirmation">
      <div class="confirmation-container">
        <div class="content-wrapper">
          <img
            loading="lazy"
            src="https://cdn.builder.io/api/v1/image/assets/3a8ac60b581045f7adb5757904dc023c/967f72f294f6d127529d47a90349d52e490ab79cbc802dc5aa1e724d81ae2258?apiKey=3a8ac60b581045f7adb5757904dc023c&"
            class="confirmation-icon"
            alt="Order confirmation checkmark"
          />
          <h1 class="confirmation-title">Order Confirmed!</h1>
          <p class="confirmation-message">
            Check your email for confirmation and shipping updates!
          </p>

          <?php if ($order): ?>
            <h2 class="section-title">Shipping To:</h2>
            <p><?= htmlspecialchars($order['firstName'] . ' ' . $order['lastName']) ?></p>
            <p><?= htmlspecialchars($order['street']) ?></p>
            <p><?= htmlspecialchars($order['city'] . ', ' . $order['state']) ?></p>
            <p><?= htmlspecialchars($order['zip']) ?></p>

            <h2 class="section-title">Items:</h2>
            <?php
              $counts = array_count_values($order['cart']);
              foreach ($counts as $country => $qty):
            ?>
              <div class="cart-item">
                <img src="<?= $imageMap[$country] ?? 'images/default.jpg' ?>" alt="<?= $country ?>" class="snack-thumbnail"/>
                <p><?= htmlspecialchars($country) ?> Box (x<?= $qty ?>)</p>
              </div>
            <?php endforeach; ?>
          <?php else: ?>
            <p>No recent order found.</p>
          <?php endif; ?>

          <a href="HomePage.html">
            <button class="home-button" tabindex="0">Return Home</button>
          </a>
        </div>
      </div>
    </div>
  </div>
</body>
</html>
