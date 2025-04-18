<?php
session_start();
$order = $_SESSION['order'] ?? null;

$imageMap = [
    "Costa Rica" => "img/officalSnakpack.png",
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

          <a href="PreviousOrders.php">
            <button class="home-button" tabindex="0">Track your Order</button>
          </a>
        </div>
      </div>
    </div>
  </div>

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