<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>How It Works</title>
    <link rel="stylesheet" href="HowItWorks.css">
</head>
<body>
    <section class="section-wrapper">
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

  <h2 class="how-it-works-title">How it Works</h2>
  <section class="steps-container">
  <div class="step">
    <div class="step-icon-container">
      <img src="start-icon.png" alt="Start">
    </div>
    <div class="step-title">START</div>
    <div class="step-description">Start your subscription today to enjoy a new box delivered every month—pause or cancel anytime. Or, share the experience and gift a box to someone special! You can't go wrong!</div>
  </div>

  <div class="step">
    <div class="step-icon-container">
      <img src="ship-icon.png" alt="Ship">
    </div>
    <div class="step-title">SHIP</div>
    <div class="step-description">Your first box will be shipped by the date provided during sign-up. After that, all future boxes will be sent out by the 15th of each month.</div>
  </div>

  <div class="step">
    <div class="step-icon-container">
      <img src="snack-icon.png" alt="Snack">
    </div>
    <div class="step-title">SNACK</div>
    <div class="step-description">Receive your box of Yums and embark on an unforgettable flavor adventure! Need a break? Cancel anytime with a simple, one-step process.</div>
  </div>
</section>

<a href="php/index.php" class="get-started-button">Get Started</a>

<section class="text-section">
  <h2>About Us</h2>
  <p>Welcome to <strong>Snakpack</strong>, where we turn every snack into a global adventure! At Snakpack, we believe food is a universal language that connects people to cultures, stories, and experiences around the world. Our subscription service delivers carefully curated snack boxes from different countries each month, packed with delicious treats, unique flavors, and fun cultural insights. 
  We go beyond just snacks—our boxes include physical infographics, themed stickers, and recipes that immerse you in the traditions of each country. Whether you're a food lover exploring new flavors, a traveler longing for familiar tastes, or someone curious about the world, Snakpack is your ticket to a global journey from the comfort of home. 
  Personalized to your taste buds and dietary needs, our user-friendly website makes discovering and enjoying international snacks seamless and exciting. Join us as we celebrate diversity, culture, and connection—one snack at a time!</p>
  
  <h2>Mission Statement</h2>
  <p>At Snakpack, our mission is to connect people to the world through snacks, delivering curated boxes that celebrate diverse cultures, flavors, and stories. We aim to inspire curiosity and delight with every bite, offering a personalized, interactive experience that brings global culinary traditions right to your doorstep</p>
</section>

    
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
    </section>
</body>
</html>
