<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link type="text/css" rel="stylesheet" href="../css/articleNavigation.css">
    <link rel = "stylesheet" href = "../css/style.css">
    <title>Article Navigation Page</title>
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
    <div class="article-container">
        <div class="row">
            <a id="article1" class="articleBtn" href="quiz1.php">
                <img src="../imgs/quizImgs/perfumeImgs/q6/classic.png" alt="Perfume">
                What Perfume Are You?
            </a>
            <a id="article2" class="articleBtn" href="quiz2.php">
                <img src="../imgs/backgroundImgs/avatar.jpg" alt="Aang and Katara on Appa">
                What Avatar Character Are You?
            </a>
            <a id="article3" class="articleBtn" href="quiz3.php">
                <img src="../imgs/quizImgs/hatImgs/q1/tophat.png" alt="tophat">
                What Hat Are You?
            </a>
        </div>
        <div class="row">
            <a id="article4" class="articleBtn" href="quiz4.php">
                <img src="../imgs/backgroundImgs/airplane.png" alt="airplane">
                Where Is Your Next Vacation?
            </a>
            <a id="article5" class="articleBtn" href="article1.php">
                <img src="../imgs/backgroundImgs/snackWorld.png" alt="cake world">
                Snacking Around the World: Top Snacks Around the World
            </a>
            <a id="article6" class="articleBtn" href="article2.php">
                <img src="../imgs/backgroundImgs/snackHand.png" alt="snack in someone's hand">
                How Travel and Snacks Go Hand-in-Hand
            </a>
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
