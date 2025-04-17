<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Top Snacks Around the World</title>
    <link rel="stylesheet" href="../css/articleLayout.css">
    <link href = "../css/style.css" rel = "stylesheet">
</head>
<body>
<header class="nav-header">
  <div class="nav-container">
    <img src="https://cdn.builder.io/api/v1/image/assets/3a8ac60b581045f7adb5757904dc023c/9e595b5f1fcde182a7dfc4c426d1f05c6b2789f1?placeholderIfAbsent=true" alt="Logo" class="main-logo" />
    <nav class="navigation-bar">
      <div class="nav-links">
        <a href="HomePage.html" class="nav-link">Home</a>
        <a href="HowItWorks.html" class="nav-link">How It Works</a>
        <a href="Countries.php" class="nav-link">Countries</a>
        <a href="GetStartedQ1.html" class="nav-link">Get Started</a>
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
    <h1 class="heading main-heading article">
        Food is a universal language, and every culture has its own unique snacks that reflect their traditions and flavors. Whether you're traveling the world or exploring your own city, here are 10 snacks you absolutely need to try.
    </h1>

    <p class="article-meta">
        By Jane Smith | March 16, 2025<br>
        <span class="publisher">Published by SnackPack</span>
    </p>

    <h2 class="heading subheading article">1. <strong>Pocky (Japan)</strong></h2>
    <img src="../imgs/articleImgs/article1/pocky.png" alt="Pocky snack from Japan">
    <p class="article-text article">A delicious biscuit stick coated in chocolate or various flavors like strawberry, matcha, and almond. Perfect for sharing or snacking on the go.</p>

    <h2 class="heading subheading article">2. <strong>Churros (Spain)</strong></h2>
    <img src="../imgs/articleImgs/article1/churro.png" alt="Churros from Spain with chocolate dip">
    <p class="article-text article">Crispy, golden dough fried to perfection, often sprinkled with sugar and served with warm chocolate dipping sauce. A must-try snack in Spain!</p>

    <h2 class="heading subheading article">3. <strong>Knafeh (Middle East)</strong></h2>
    <img src="../imgs/articleImgs/article1/Knafeh.png" alt="Middle Eastern Knafeh dessert">
    <p class="article-text article">A sweet, creamy dessert made with shredded pastry soaked in syrup. Popular in countries like Lebanon, Syria, and Jordan.</p>

    <h2 class="heading subheading article">4. <strong>Samosas (India)</strong></h2>
    <img src="../imgs/articleImgs/article1/samosa.png" alt="Indian samosas filled with potatoes and peas">
    <p class="article-text article">Fried or baked pastries filled with savory fillings like spiced potatoes, peas, or meat. A popular street food snack in India and Pakistan.</p>

    <h2 class="heading subheading article">5. <strong>Biltong (South Africa)</strong></h2>
    <img src="../imgs/articleImgs/article1/biltong.png" alt="South African biltong dried meat">
    <p class="article-text article">Dried cured meat, usually beef or game, flavored with various spices. It's a popular snack for those on the go in South Africa.</p>

    <h2 class="heading subheading article">6. <strong>Chips (England)</strong></h2>
    <img src="../imgs/articleImgs/article1/crisps.png" alt="English chips">
    <p class="article-text article">Crisps, as they're known in England, are a classic snack found in every corner shop, with flavors ranging from sea salt to roast chicken.</p>

    <h2 class="heading subheading article">7. <strong>Pastel de Nata (Portugal)</strong></h2>
    <img src="../imgs/articleImgs/article1/pastel.png" alt="Portuguese custard tart Pastel de Nata">
    <p class="article-text article">A flaky pastry tart filled with rich egg custard, often topped with cinnamon. It's a favorite treat with coffee across Portugal.</p>

    <h2 class="heading subheading article">8. <strong>Arepas (Venezuela/Colombia)</strong></h2>
    <img src="../imgs/articleImgs/article1/arepa.png" alt="Arepas from Venezuela and Colombia">
    <p class="article-text article">Cornmeal cakes that can be grilled, baked, or fried and filled with meats, cheese, or avocado. A versatile and delicious staple.</p>

    <h2 class="heading subheading article">9. <strong>Tim Tams (Australia)</strong></h2>
    <img src="../imgs/articleImgs/article1/timtam.png" alt="Australian Tim Tam chocolate biscuits">
    <p class="article-text article">Chocolate-coated biscuits with a creamy filling in the center. Aussies love the “Tim Tam Slam” – biting off the ends and sipping coffee through the biscuit!</p>

    <h2 class="heading subheading article">10. <strong>Takoyaki (Japan)</strong></h2>
    <img src="../imgs/articleImgs/article1/tak.png" alt="Japanese Takoyaki octopus balls">
    <p class="article-text article">Savory round balls filled with minced octopus, tempura scraps, pickled ginger, and green onion, cooked in special molds and topped with sauces and bonito flakes.</p>
    <footer class="main-footer">
      <div class="footer-content">
        <h3 class="newsletter-title">Subscribe for the latest updates:</h3>
        <input type="email" placeholder="Email Address" class="email-input" />

        <nav class="footer-nav">
          <a href="FAQs.php">FAQ</a>
          <a href="ContactUs.php">Contact Us</a>
          <a href="HowItWorks.php">How it Works</a>
          <a href="Countries.php">Countries</a>
          <a href="GetStartedQ1.php">Get Started</a>
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

