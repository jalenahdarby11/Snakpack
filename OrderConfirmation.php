<?php
session_start();

// Store form data if submitted
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  $_SESSION['firstName'] = $_POST['firstName'] ?? '';
  $_SESSION['lastName'] = $_POST['lastName'] ?? '';
  $_SESSION['street'] = $_POST['street'] ?? '';
  $_SESSION['apt'] = $_POST['apt'] ?? '';
  $_SESSION['city'] = $_POST['city'] ?? '';
  $_SESSION['state'] = $_POST['state'] ?? '';
  $_SESSION['postal'] = $_POST['postal'] ?? '';
  $_SESSION['mobile'] = $_POST['mobile'] ?? '';

  // After storing, redirect to confirmation
  header("Location: OrderConfirmed.php");
  exit();
}

// For page display purposes
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
  <title>Order Confirmation</title>
  <link rel="stylesheet" href="OrderConfirmation.css">
</head>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Order Confirmation</title>
  <link rel="stylesheet" href="OrderConfirmation.css">
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


    <form class="order-confirmation" method="POST" action="OrderConfirmation.php">

    


    <div style="width: 100%; display: flex; justify-content: center;">
      <h1 class="page-title">Confirm and Pay</h1>
    </div>
    
    
    <div class="main-content">
      <div class="content-wrapper">
        <!-- Form Section -->
        <section class="form-section">
          <div class="form-container">
            <h2 class="section-title">Your Info</h2>
            <label for="firstName" class="visually-hidden">First Name</label>
            <input type="text" id="firstName" class="input-field" placeholder="First Name" required>
            <label for="lastName" class="visually-hidden">Last Name</label>
            <input type="text" id="lastName" class="input-field" placeholder="Last Name" required>
            <h2 class="section-title">Shipping Address</h2>
            <label for="street" class="visually-hidden">Street Address</label>
            <input type="text" id="street" class="input-field" placeholder="Street Address" required>
            <label for="apt" class="visually-hidden">Apartment/Suite</label>
            <input type="text" id="apt" class="input-field" placeholder="Apartment/Suite (Optional)">
            <label for="city" class="visually-hidden">City</label>
            <input type="text" id="city" class="input-field" placeholder="City" required>
            <label for="state" class="visually-hidden">State</label>
            <input type="text" id="state" class="input-field" placeholder="State" required>
            <label for="postal" class="visually-hidden">Postal Code</label>
            <input type="text" id="postal" class="input-field" placeholder="Postal Code" required>
            <h2 class="section-title">Contact</h2>
            <label for="mobile" class="visually-hidden">Mobile Number</label>
            <input type="tel" id="mobile" class="input-field" placeholder="Mobile Number (Optional)">
            <div class="divider"></div>
            <h2 class="section-title">Payment Information</h2>
            <div class="payment-section">
              <div class="card-input">
                <img src="https://cdn.builder.io/api/v1/image/assets/3a8ac60b581045f7adb5757904dc023c/0054688d81a7b4137c8818968f672be26545c12c24e0966f95738e991beb8424?apiKey=3a8ac60b581045f7adb5757904dc023c&" alt="Credit card" class="payment-icon">
                <span>Card Number</span>
              </div>
            </div>
            <div class="divider-text">or</div>
            <button type="button" class="apple-pay">
              <div class="apple-pay-button">
                <span>Pay with</span>
                <span>Pay</span>
              </div>
            </button>
          </div>
        </section>
        <!-- Summary Section -->
        <section class="summary-section">
  <div class="order-summary">
    <h2 class="summary-title">Order Summary</h2>

    <?php if (!empty($itemCounts)): ?>
      <?php foreach ($itemCounts as $country => $quantity): ?>
        <div class="cart-item">
          <img src="<?php echo $imageMap[$country] ?? 'images/default.jpg'; ?>" alt="<?php echo $country; ?> Box" class="snack-thumbnail">
          <p>✔️ <?php echo htmlspecialchars($country); ?> Box (<?php echo $quantity; ?>)</p>

          <form action="updateCart.php" method="post" style="display:inline;">
            <input type="hidden" name="country" value="<?php echo $country; ?>">
            <input type="hidden" name="action" value="add">
            <button type="submit" class="cart-button">➕</button>
          </form>
          <form action="updateCart.php" method="post" style="display:inline;">
            <input type="hidden" name="country" value="<?php echo $country; ?>">
            <input type="hidden" name="action" value="remove">
            <button type="submit" class="cart-button">➖</button>
          </form>
        </div>
      <?php endforeach; ?>
    <?php else: ?>
      <p>Your cart is empty.</p>
    <?php endif; ?>
  </div>
</section>


      </div>
    </div>



    <button  type="submit"  class="submit-button">
      <a href="OrderConfirmed.php">Confirm and Pay</a>
  </button>
    
  </form>
</body>
</html>
