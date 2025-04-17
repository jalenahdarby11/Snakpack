<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Countries</title>
  <link rel="stylesheet" href="countries.css">
</head>

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


  
<main class="main-content">
    <section class="hero-section">
      <div class="hero-content">
        <div class="featured-country">
          <h1 class="country-title">Costa Rica</h1>
          <p class="country-description">
            Costa Rican snacks reflect the country's vibrant culture, tropical
            climate, and love for fresh, flavorful ingredients. This box is
            perfect for those who enjoy fresh, bold flavors and a mix of savory
            and sweet options, making them a great representation of the country's
            rich culinary heritage.
          </p>
          <p id="count-Costa Rica" class="item-counter">🛒 In Cart: 0</p>
          <button class="cta-button" onclick="addToCart('Costa Rica')">Add to Cart</button>

          
        </div>
        <div class="featured-box">
          <h2 class="box-title">Box of the Month</h2>
          <img
            src="img\officalSnakpack.png"
            alt="Featured box"
            class="box-image"
          />
        </div>
      </div>
    </section>
  
  
    <section class="previous-boxes-section">
      <h2 class="section-title">Previous Boxes</h2>
      <div class="boxes-grid">
        <article class="country-card">
          <h3 class="card-title">Brazil</h3>
          <img
            src="https://cdn.builder.io/api/v1/image/assets/3a8ac60b581045f7adb5757904dc023c/419e01420e1294eb51dd8aef8ee00e66dd39ad43?placeholderIfAbsent=true"
            alt="Brazil box"
            class="card-image"
          />
          <p class="card-description">
            Experience the vibrant flavors of Brazil with our handpicked snack
            selection that embodies the country's lively culinary heritage. From
            bold, savory bites inspired by street food to sweet treats infused
            with rich tropical ingredients, each snack offers a taste of Brazil's
            dynamic culture and festive spirit.
          </p>
          <p id="count-Brazil" class="item-counter">🛒 In Cart: 0</p>
          <button class="cta-button" onclick="addToCart('Brazil')">Add to Cart</button>

          
          
        </article>
  
        <article class="country-card">
          <h3 class="card-title">India</h3>
          <img
            src="https://cdn.builder.io/api/v1/image/assets/3a8ac60b581045f7adb5757904dc023c/59098eb45873caf5cd4414286e2adce48870a497?placeholderIfAbsent=true"
            alt="India box"
            class="card-image"
          />
          <p class="card-description">
            The country known for inventing chess, sizable spice markets, and
            breathtaking natural wonders such as sparkling salt deserts. Across
            this unique nation, you'll also find towering monuments, colorful
            wildlife, and a feast of delicious culinary creations!
          </p>
          <p id="count-India" class="item-counter">🛒 In Cart: 0</p>
          <button class="cta-button" onclick="addToCart('India')">Add to Cart</button>

          
          
        </article>
  
        <article class="country-card">
          <h3 class="card-title">France</h3>
          <img
            src="https://cdn.builder.io/api/v1/image/assets/3a8ac60b581045f7adb5757904dc023c/c55f27baa6005b5b93dfd6bf5c0a32c09132849d?placeholderIfAbsent=true"
            alt="France box"
            class="card-image"
          />
          <p class="card-description">
            Located in Western Europe, is a nation of remarkable natural
            landscapes, profound history, and a lively cultural scene. Within its
            borders, one can discover breathtaking scenery, iconic cathedrals, and
            partake in some of the most exquisite cuisine worldwide.
          </p>
          <p id="count-France" class="item-counter">🛒 In Cart: 0</p>
          <button class="cta-button" onclick="addToCart('France')">Add to Cart</button>

          
          
        </article>
      </div>
    </section>


    
  
    <footer class="main-footer">
      <div class="footer-content">
        <div class="newsletter-section">
          <h3 class="newsletter-title">Subscribe for the latest updates:</h3>
          <input type="email" placeholder="Email Address" class="email-input" />
        </div>
  
        <nav class="footer-nav">
          <a href="FAQs.php">FAQ</a>
          <a href="ContactUs.php">Contact Us</a>
          <a href="HowItWorks.php">How it Works</a>
          <a href="Countries.php">Countries</a>
          <a href="php/index.php">Get Started</a>
        </nav>
  
        <img
          src="https://cdn.builder.io/api/v1/image/assets/3a8ac60b581045f7adb5757904dc023c/cf63493f8f4723e9e40fdfa32ca7b38eb2d69e50?placeholderIfAbsent=true"
          alt="Footer logo"
          class="footer-logo"
        />
        <img
          src="https://cdn.builder.io/api/v1/image/assets/3a8ac60b581045f7adb5757904dc023c/9c2fd45f0841e4cf7d570ccfb6099e596290f28e?placeholderIfAbsent=true"
          alt="Social media"
          class="social-media"
        />
      </div>
    </footer>
    <script>
  // Add an item to the cart via PHP
  function addToCart(country) {
    fetch('setCountry.php', {
      method: 'POST',
      headers: { 'Content-Type': 'application/x-www-form-urlencoded' },
      body: 'country=' + encodeURIComponent(country)
    })
    .then(response => response.text())
    .then(data => {
      // After adding, fetch updated counts from session
      fetch('getCartCounts.php')
        .then(res => res.json())
        .then(counts => {
          updateItemCounter(country, counts[country] || 1);
        });
    })
    .catch(error => {
      console.error("Error adding to cart:", error);
    });
  }

  // Update the counter visually and store locally too
  function updateItemCounter(country, newCount) {
    const key = `count-${country}`;
    sessionStorage.setItem(key, newCount);

    const counterEl = document.getElementById(key);
    if (counterEl) {
      counterEl.textContent = `🛒 In Cart: ${newCount}`;
    }
  }

  // On page load: fetch real cart from server and show per-country counts
  window.addEventListener("DOMContentLoaded", () => {
    fetch('getCartCounts.php')
      .then(res => res.json())
      .then(data => {
        const countries = ["India", "Brazil", "France", "Costa Rica"];
        countries.forEach(country => {
          const count = data[country] || 0;
          const counterEl = document.getElementById(`count-${country}`);
          if (counterEl) {
            counterEl.textContent = `🛒 In Cart: ${count}`;
          }
          sessionStorage.setItem(`count-${country}`, count);
        });
      });
  });
</script>

