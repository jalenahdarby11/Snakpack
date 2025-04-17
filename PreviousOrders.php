<?php
session_start();

if (!isset($_SESSION['userEmail'])) {
    echo "Please log in to view your order history.";
    exit();
}

$email = $_SESSION['userEmail'];
$orders = [];

$imageMap = [
  "Costa Rica" => "https://cdn.builder.io/api/v1/image/assets/3a8ac60b581045f7adb5757904dc023c/d55ad91dffacff4abf621e8e67a46e7ea0a16fdc?placeholderIfAbsent=true",
  "Brazil" => "https://cdn.builder.io/api/v1/image/assets/3a8ac60b581045f7adb5757904dc023c/419e01420e1294eb51dd8aef8ee00e66dd39ad43?placeholderIfAbsent=true",
  "India" => "https://cdn.builder.io/api/v1/image/assets/3a8ac60b581045f7adb5757904dc023c/59098eb45873caf5cd4414286e2adce48870a497?placeholderIfAbsent=true",
  "France" => "https://cdn.builder.io/api/v1/image/assets/3a8ac60b581045f7adb5757904dc023c/c55f27baa6005b5b93dfd6bf5c0a32c09132849d?placeholderIfAbsent=true"
];

if (file_exists('orders.json')) {
    $allOrders = json_decode(file_get_contents('orders.json'), true);

    foreach ($allOrders as $order) {
        if (isset($order['email']) && $order['email'] === $email) {
            $orders[] = $order;
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Your Order History</title>
  <link rel="stylesheet" href="PreviousOrders.css">
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

<div class="order-history-container">
<h1>Your Order History</h1>

<?php if (empty($orders)): ?>
  <p>No past orders found.</p>
<?php else: ?>
  <?php foreach ($orders as $order): ?>
    <div class="order-card">
  <h3 style="color:#52B9BC"><?= htmlspecialchars($order['firstName'] . ' ' . $order['lastName']) ?></h3>
  <p><strong>Address:</strong> <?= htmlspecialchars($order['street']) ?>, <?= htmlspecialchars($order['city']) ?>, <?= htmlspecialchars($order['state']) ?></p>
  <p><strong>Email:</strong> <?= htmlspecialchars($order['email']) ?></p>
  <p><strong>Phone:</strong> <?= htmlspecialchars($order['mobile']) ?></p>

  <p><strong>Items:</strong></p>
  <ul style="list-style: none; padding: 0;">
    <?php foreach ($order['cart'] as $item): ?>
      <li style="display: flex; align-items: center; margin-bottom: 10px;">
        <img 
          src="<?= htmlspecialchars($imageMap[$item] ?? 'images/default.jpg') ?>" 
          alt="<?= htmlspecialchars($item) ?>" 
          style="width: 50px; height: 50px; vertical-align: middle; margin-right: 12px;"
        >
        <span><?= htmlspecialchars($item) ?> Box</span>
      </li>
    <?php endforeach; ?>
  </ul>

  <div style="text-align: right; margin-top: 10px;">
    <button class="track-button">Track Order</button>
  </div>
</div>

  <?php endforeach; ?>
<?php endif; ?>
</div>

<div style="text-align: center; margin-top: 30px;">
  <a href="Settings.php">
    <button class="back-button">← Back to Settings</button>
  </a>
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
