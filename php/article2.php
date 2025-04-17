<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>How Travel and Snacks Go Hand-in-Hand</title>
  <link rel="stylesheet" href="../css/articleLayout.css">
  <link href = "../css/style.css" rel = "stylesheet">

</head>
<body>
<header class="nav-header">
  <div class="nav-container">
    <img src="https://cdn.builder.io/api/v1/image/assets/3a8ac60b581045f7adb5757904dc023c/9e595b5f1fcde182a7dfc4c426d1f05c6b2789f1?placeholderIfAbsent=true" alt="Logo" class="main-logo" />
    <nav class="navigation-bar">
      <div class="nav-links">
        <a href="../HomePage.php" class="nav-link">Home</a>
        <a href="../HowItWorks.php" class="nav-link">How It Works</a>
        <a href="../Countries.php" class="nav-link">Countries</a>
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
<div class="snakarticle">
  <article class="article">
    <header>
      <h1 class="heading main-heading article">How Travel and Snacks Go Hand-in-Hand</h1>
      <p class="article-meta">
        By John Smith | November 29, 2025<br>
        <span class="publisher">Published by SnackPack</span>
      </p>
      <p class="article-text article">
        Traveling is all about exploring new cultures and experiences, and for many people, food plays a major part. Here's how snacks can be the perfect travel companion and how they can make your journey even more special.
      </p>
    </header>

    <section>
      <img src="../imgs/articleImgs/article2/travel.png" alt="Person enjoying snacks while traveling">
      <h2 class="heading subheading article">Whether you're hopping on a plane to a new destination or road-tripping across your own country, snacks are essential for any trip.</h2>
      <p class="article-text article">
        But they’re more than just sustenance—they’re a part of the cultural experience.
      </p>
    </section>

    <section>
      <img src="../imgs/articleImgs/article2/assort.png" alt="Assortment of local snacks from different countries">
      <h2 class="heading subheading article">The Cultural Experience of Snacks</h2>
      <p class="article-text article">
        While traveling, local snacks are a great way to learn about a culture. From sushi rolls in Japan to empanadas in Argentina, trying regional snacks can be a great introduction to a new place.
      </p>
    </section>

    <section>
      <img src="../imgs/articleImgs/article2/air.png" alt="Healthy snacks prepared for air travel">
      <h2 class="heading subheading article">Packing Snacks for Your Trip</h2>
      <p class="article-text article">
        Packing snacks for your trip can also make your travel more comfortable. Healthy options like nuts, granola bars, and dried fruits can keep you energized during long flights or road trips. Don't forget the chocolate or savory treats for moments of indulgence!
      </p>
    </section>

    <section>
      <h2 class="heading subheading article">Snack Pairings for Your Surroundings</h2>
      <p class="article-text article">
        Some snacks are perfect for pairing with your surroundings. Imagine enjoying some Italian biscotti with a hot coffee in a Venetian café or munching on Turkish delight while cruising down the Bosphorus.
      </p>
    </section>
    </div>
    <footer class="main-footer">
      <div class="footer-content">
        <h3 class="newsletter-title">Subscribe for the latest updates:</h3>
        <input type="email" placeholder="Email Address" class="email-input" />

        <nav class="footer-nav">
          <a href="FAQs.php">FAQ</a>
          <a href="../ContactUs.php">Contact Us</a>
          <a href="../HowItWorks.php">How it Works</a>
          <a href="../Countries.php">Countries</a>
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
  </article>
</body>
</html>
