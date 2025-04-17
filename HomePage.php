<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home Page</title>
    <link rel="stylesheet" href="home-page.css">
</head>
<body>

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


    <section class="subscription-page">

    <div class="decorative-bg">
    <img src="chip-bag.png" class="snack1" alt="chip bag" />
    <img src="airplane-doodle.png" class="snack2" alt="airplane" />
    </div>
      
      <h1 class="main-title">Taste the World in Every Bite</h1>
      
      <section class="hero-section">
      <div class="hero-text-column">
        <h2 class="hero-heading">Try our Box of the Month from <span class="costa-rica-text">Costa Rica</span></h2>
        <div class="cta-buttons">
          <a href="index.php" class="cta-button">Get Started</a>
          <a href="HowItWorks.php" class="cta-button">How it Works</a>
        </div>
      </div>

      <div class="hero-image-container">
        <img src="img/officalSnakpack.png" alt="Costa Rica Snack Box" class="hero-image">
      </div>
    </section>

    
      <section class="features-section">
        <h2 class="features-title">What comes in a SnakPack?</h2>
        <div class="features-grid">
          <article class="feature-card">
            <img src="snakpackBack.png" alt="Diverse selection of international snacks" class="feature-image">
            <h3 class="feature-title">Global Goodies for Every Craving</h3>
            <p class="feature-description">Experience the taste of a new country every month.</p>
          </article>
          
          <article class="feature-card">
            <img src="snakpackTop.png" alt="Educational content about featured country" class="feature-image">
            <h3 class="feature-title">Learn as you snack</h3>
            <p class="feature-description">Discover new facts about the country every month.</p>
          </article>
          
          <article class="feature-card">
            <img src="snakpackFront.png" alt="Variety of unique snack flavors" class="feature-image">
            <h3 class="feature-title">Find your new favorite snacks</h3>
            <p class="feature-description">Find your newest addiction and explore new flavors you can't get enough of.</p>
          </article>
        </div>
      </section>
    
      <section class="testimonials-section">
        <h2 class="testimonials-title">What our customers are saying...</h2>
        <div class="testimonials-grid">
          <div class="testimonial-card">
            <p class="testimonial-text">"I look forward to my snack box every month! It's like traveling the world from my couch. I love trying new flavors I'd never find in stores nearby. Highly recommend for adventurous snackers!"</p>
            <p class="testimonial-author">— Vincent<br><span class="author-location">Orlando, Florida</span></p>
          </div>
          
          <div class="testimonial-card">
            <p class="testimonial-text">"I was worried it would be all chips and candy, but every box is so thoughtfully curated! From savory to sweet, every snack is unique and fresh. The quality is top-notch, too!"</p>
            <p class="testimonial-author">— Alex<br><span class="author-location">Barcelona, Spain</span></p>
          </div>
        </div>
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

</body>
</html>
