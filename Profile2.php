<?php
session_start();

$userData = null;

if (isset($_SESSION['userEmail'])) {
  $email = $_SESSION['userEmail'];
  $users = json_decode(file_get_contents('users.json'), true);

  foreach ($users as $user) {
    if ($user['email'] === $email) {
      $userData = $user;
      break;
    }
  }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Profile</title>
    <link rel="stylesheet" href="Profile2.css">
</head>
<body>

  <header class="nav-header">
  <div class="nav-container">
              <img src="https://cdn.builder.io/api/v1/image/assets/3a8ac60b581045f7adb5757904dc023c/9e595b5f1fcde182a7dfc4c426d1f05c6b2789f1?placeholderIfAbsent=true" alt="Logo" class="main-logo" />
              <nav class="navigation-bar">
                <div class="nav-links">
                    <a href="HomePage.html" class="nav-link">Home</a>
                  <a href="HowItWorks.html" class="nav-link">How It Works</a>
                  <a href="Countries.html" class="nav-link">Countries</a>
                  <a href="GetStartedQ1.html" class="nav-link">Get Started</a>
                </div>
                <div class="nav-icons">
        
                    <a href="ShoppingCart.html">
                  <img src="https://cdn.builder.io/api/v1/image/assets/3a8ac60b581045f7adb5757904dc023c/edadf950090628a4467326f5ac2e7e6a6c82bdb8?placeholderIfAbsent=true" alt="User Icon" class="nav-icon" />
                </a>
  
                <?php session_start(); ?>
                <a href="<?php echo isset($_SESSION['userEmail']) ? 'Profile2.php' : 'SignUp.html'; ?>">
                    <img src="https://cdn.builder.io/api/v1/image/assets/3a8ac60b581045f7adb5757904dc023c/81178d926783336ee4924fea04237c405ade17aa?placeholderIfAbsent=true" alt="Profile Icon" class="nav-icon menu-icon" />
                </a>

        </div>
      </nav>
    </div>
  </header>


  <main>
  <div class="profile-container">
    <a href="Settings.html" class="settings-button">⚙ Settings</a>

    <?php if ($userData): ?>
      <div class="profile-info">
        <h1>Welcome, <?= htmlspecialchars($userData['firstName'] . ' ' . $userData['lastName']) ?>!</h1>
        <p><strong>Name:</strong> <?= htmlspecialchars($userData['firstName'] . ' ' . $userData['lastName']) ?></p>
        <p><strong>Email:</strong> <?= htmlspecialchars($userData['email']) ?></p>
        <p><strong>Phone:</strong> <?= htmlspecialchars($userData['phone']) ?></p>
        <p><strong>Password:</strong> ********</p>

        <form method="post" action="logout.php">
          <button type="submit">Log Out</button>
        </form>
      </div>
    <?php else: ?>
      <p>No user is logged in. <a href="SignUp.html">Sign up here</a></p>
    <?php endif; ?>
  </div>
</main>


<footer class="main-footer">
  <div class="footer-content">
    
    <div class="newsletter-section">
      <h3 class="newsletter-title">Subscribe for the latest updates:</h3>
      <input type="email" placeholder="Email Address" class="email-input" />
    </div>

    <nav class="footer-nav">
      <a href="FAQs.html">FAQ</a>
      <a href="ContactUs.html">Contact Us</a>
      <a href="HowItWorks.html">How it Works</a>
      <a href="Countries.html">Countries</a>
      <a href="GetStarted.html">Get Started</a>
    </nav>

    <div class="footer-brand">
    <img src="https://cdn.builder.io/api/v1/image/assets/3a8ac60b581045f7adb5757904dc023c/cbd4135796799d7f054c96872430269efb61968628230f9302caf2d546dbcd09?apiKey=3a8ac60b581045f7adb5757904dc023c&" alt="Primary footer logo" class="footer-logo" />
    </div>

    <div class="social-icon">
    <img src="https://cdn.builder.io/api/v1/image/assets/3a8ac60b581045f7adb5757904dc023c/f89c283ce0c3abb2b61c851f7c23923b94294c89cca304d45ab82668cd0e2860?apiKey=3a8ac60b581045f7adb5757904dc023c&" alt="Secondary footer logo" class="footer-logo-secondary" />

    </div>
    </footer>


</body>
</html>
