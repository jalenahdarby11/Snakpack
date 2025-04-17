<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>FAQs</title>
  <link rel="stylesheet" href="faq.css">
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
        <a href="index.php">Get Started</a>
    
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
  <h1 class="faq-title">Frequently Asked Questions</h1>
  <section class="faq-list">
    <!-- FAQ Item 1 -->
    <article class="faq-item">
      <div class="questionContainer">
        <h2 class="faq-question" >What's in the snack box?</h2>
        <img src="https://cdn.builder.io/api/v1/image/assets/3a8ac60b581045f7adb5757904dc023c/baafaabb93f56825dd22d9c6f558b44171607dc0?placeholderIfAbsent=true" alt="Expand" class="expand-icon" onclick="toggleFAQ(this)"/>
      </div>
      <div class="faq-answer">
        <p>Details about the contents of the snack box.</p>
      </div>
    </article>

    <!-- FAQ Item 2 -->
    <article class="faq-item">
      <div class="questionContainer">
        <h2 class="faq-question">What type of snacks are included?</h2>
        <img src="https://cdn.builder.io/api/v1/image/assets/3a8ac60b581045f7adb5757904dc023c/baafaabb93f56825dd22d9c6f558b44171607dc0?placeholderIfAbsent=true" alt="Expand" class="expand-icon" onclick="toggleFAQ(this)"/>
      </div>
      <div class="faq-answer">
      <p>There are several types of snacks and drinks included in a SnakBox, depending on the chosen country. You might receive one box with spicy, fruity, and savory items, and another with umami, salty, and bitter flavors. It all depends on the surprise contents!</p>

      </div>
    </article>

    <!-- FAQ Item 3 -->

    <article class="faq-item">
      <div class="questionContainer">
        <h2 class="faq-question">Can I return my box?</h2>
        <img src="https://cdn.builder.io/api/v1/image/assets/3a8ac60b581045f7adb5757904dc023c/baafaabb93f56825dd22d9c6f558b44171607dc0?placeholderIfAbsent=true" alt="Expand" class="expand-icon" onclick="toggleFAQ(this)"/>
      </div>
      <div class="faq-answer">
      <p>Unopened boxes can be returned (shipping not included); however, opened boxes are permanently yours.</p>
      </div>
    </article>

    <!-- FAQ Item 4 -->

    <article class="faq-item">
      <div class="questionContainer">
        <h2 class="faq-question">How much does it cost?</h2>
        <img src="https://cdn.builder.io/api/v1/image/assets/3a8ac60b581045f7adb5757904dc023c/baafaabb93f56825dd22d9c6f558b44171607dc0?placeholderIfAbsent=true" alt="Expand" class="expand-icon" onclick="toggleFAQ(this)"/>
      </div>
        <div class="faq-answer">
        <p>SnakBox is priced at $30, including shipping, to support sustainable practices, eco-friendly packaging, and fair partnerships with local snack makers in each featured country.</p>

      </div>
    </article>

  </section>
</main>

<footer class="footer">
  <div class="footer-content">
    <div class="subscription-section">
      <h2 class="subscription-title">Subscribe for the latest updates:</h2>
      <input type="email" placeholder="Email Address" class="email-input" />
    </div>
    <nav class="footer-nav">
      <a href="FAQs.php" class="footer-link">FAQ</a>
      <a href="ContactUs.php" class="footer-link">Contact Us</a>
      <a href="HowItWorks.php" class="footer-link">How it Works</a>
      <a href="Countries.php" class="footer-link">Countries</a>
      <a href="php/index.php" class="footer-link">Get Started</a>
    </nav>
    <img src="https://cdn.builder.io/api/v1/image/assets/3a8ac60b581045f7adb5757904dc023c/d5b1e560105caee6c0687781f53e9cfa46574107?placeholderIfAbsent=true" alt="Footer Logo 1" class="footer-logo" />
    <img src="https://cdn.builder.io/api/v1/image/assets/3a8ac60b581045f7adb5757904dc023c/9c2fd45f0841e4cf7d570ccfb6099e596290f28e?placeholderIfAbsent=true" alt="Footer Logo 2" class="footer-logo-secondary" />
  </div>
</footer>

<script>
  function toggleFAQ(buttonElement) {
    // Find the closest parent element with the class 'faq-item'
    const faqItem = buttonElement.closest('.faq-item');

    // Find the .faq-answer div within the same faq-item
    const answer = faqItem.querySelector('.faq-answer');

    // Toggle the display of the answer (show/hide)
    if (answer.style.display === "none" || answer.style.display === "") {
      answer.style.display = "block";
    } else {
      answer.style.display = "none";
    }

    // Optionally toggle the icon (rotate it when expanded)
    const icon = faqItem.querySelector('.expand-icon');
    if (answer.style.display === "block") {
      icon.style.transform = "rotate(0deg)";
    } else {
      icon.style.transform = "rotate(90deg)";
    }
  }
</script>

</body>
</html>
