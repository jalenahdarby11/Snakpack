<?php
session_start();

// Retrieve user input and cart
$firstName = $_SESSION['firstName'] ?? '';
$lastName = $_SESSION['lastName'] ?? '';
$street = $_SESSION['street'] ?? '';
$apt = $_SESSION['apt'] ?? '';
$city = $_SESSION['city'] ?? '';
$state = $_SESSION['state'] ?? '';
$postal = $_SESSION['postal'] ?? '';
$mobile = $_SESSION['mobile'] ?? '';

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
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
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
        <div class="confirmed-details">
  <h2>Shipping To:</h2>
  <p><?php echo htmlspecialchars("$firstName $lastName"); ?></p>
  <p><?php echo htmlspecialchars($street); ?><?php echo $apt ? ', ' . htmlspecialchars($apt) : ''; ?></p>
  <p><?php echo htmlspecialchars("$city, $state $postal"); ?></p>
  <?php if ($mobile): ?>
    <p>Mobile: <?php echo htmlspecialchars($mobile); ?></p>
  <?php endif; ?>

  <h2>Your Order:</h2>
  <?php if (!empty($itemCounts)): ?>
    <?php foreach ($itemCounts as $country => $qty): ?>
      <div class="order-item" style="display: flex; align-items: center; gap: 10px; margin-bottom: 10px;">
        <img src="<?php echo $imageMap[$country] ?? 'images/default.jpg'; ?>" alt="<?php echo $country; ?>" style="width: 60px; height: 60px; object-fit: cover;" />
        <span>✔️ <?php echo htmlspecialchars($country); ?> Box (x<?php echo $qty; ?>)</span>
      </div>
    <?php endforeach; ?>
  <?php else: ?>
    <p>No items in your order.</p>
  <?php endif; ?>
</div>
        <p class="confirmation-message">
          Check your email for confirmation and shipping updates!
        </p>
        <a href="PreviousOrders.html">
        <button class="home-button" tabindex="0">Track Your Orders
        </button>
        </a>
      </div>
    </div>
  </div>
</body>
</html>
