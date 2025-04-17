
<?php
// Start the session to keep form data
session_start();

// Initialize a flag for showing the results message
$showResults = false;
$resultsMessage = '';
$finalAnswer = '';

// Check if the form has been submitted
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Process the form data
    $answers = $_POST;

    // Load the current contents of adv.json
    $jsonFilePath = '../json/adv.json';
    $jsonData = file_get_contents($jsonFilePath);

    // Decode the JSON data into a PHP array
    $data = json_decode($jsonData, true);

    // Check the user's response to q1 and update the data accordingly
    if (isset($answers['q1'])) {
        $selectedAnswer = $answers['q1'];

        // Increment the corresponding country's value based on the selection
        if ($selectedAnswer === "Fedora") {
            $data['Cambodia'] += 1;
        } elseif ($selectedAnswer === "Beanie") {
            $data['Cyprus'] += 1;
        } elseif ($selectedAnswer === "Beret") {
            $data['Jordan'] += 1;
        } elseif ($selectedAnswer === "TopHat") {
            $data['United Arab Emirites'] += 1;
        }
    }

    if (isset($answers['q2'])) {
      $selectedAnswer = $answers['q2'];
  
      if ($selectedAnswer === "Formal") {
          $finalAnswer = "You are a top hat!";
          $finalImg = '../imgs/quizImgs/hatImgs/answers/tophat.png';
          $description = "You are the epitome of class and sophistication. A top hat represents your refined, formal nature. Whether you're at a gala or a high-end event, you know how to stand tall and make an impression. You are a symbol of elegance and timeless fashion.";
          $scentDescription = "A rich and elegant blend with notes of oud, leather, and a hint of lavender – refined and timeless.";
          $boxMonth = 'Take A Look At Our Box Of The Month!';
          $boxMonthDescription ='Experience the rich flavors of Costa Rica with a hand-picked selection of sweet, salty, and spicy treats that bring the tropics to you. From traditional plantain chips to creamy coffee candies made with locally grown beans, this box celebrates the vibrant culture and biodiversity of Central America’s green paradise. Sip on tropical fruit juice, nibble on coconut cookies, and discover why Costa Rica is known for more than just its beaches and volcanoes.';
          $boxTitle = 'You Might Enjoy Our French Box';
          $boxDescription = "Our French Box features luxurious, high-end scents that embody sophistication. Perfect for those who appreciate timeless elegance and fine taste.";
  
      } elseif ($selectedAnswer === "Casual") {
          $finalAnswer = "You are a propeller hat!";
          $finalImg = '../imgs/quizImgs/hatImgs/answers/propHat.png';
          $description = "You're quirky, fun, and full of energy! The propeller hat embodies your playful spirit. You embrace whimsy and don't mind being the center of attention, especially if it brings a smile. You are the life of the party and always up for a good time!";
          $scentDescription = "A zesty and refreshing scent with vibrant citrus notes that evoke sunny, carefree days.";
          $boxTitle = 'You Might Enjoy Our Tropical Box';
          $boxMonth = 'Take A Look At Our Box Of The Month!';
          $boxMonthDescription ='Experience the rich flavors of Costa Rica with a hand-picked selection of sweet, salty, and spicy treats that bring the tropics to you. From traditional plantain chips to creamy coffee candies made with locally grown beans, this box celebrates the vibrant culture and biodiversity of Central America’s green paradise. Sip on tropical fruit juice, nibble on coconut cookies, and discover why Costa Rica is known for more than just its beaches and volcanoes.';
          $boxDescription = "Our Tropical Box bursts with bright, fruity scents made for laid-back, sunny days. It’s for the free-spirited and playful personalities.";
  
      } elseif ($selectedAnswer === "Outdoor") {
          $finalAnswer = "You are a newsie hat!";
          $finalImg = '../imgs/quizImgs/hatImgs/answers/newsieHat.png';
          $description = "You’re practical, hardworking, and always looking to make a difference. The newsie hat is a symbol of your grounded, no-nonsense approach to life. You believe in the value of hard work and staying true to your roots, no matter where life takes you.";
          $scentDescription = "An earthy and fresh scent with moss, cedarwood, and wild herbs – for the nature-lover in you.";
          $boxMonth = 'Take A Look At Our Box Of The Month!';
          $boxMonthDescription ='Experience the rich flavors of Costa Rica with a hand-picked selection of sweet, salty, and spicy treats that bring the tropics to you. From traditional plantain chips to creamy coffee candies made with locally grown beans, this box celebrates the vibrant culture and biodiversity of Central America’s green paradise. Sip on tropical fruit juice, nibble on coconut cookies, and discover why Costa Rica is known for more than just its beaches and volcanoes.';
          $boxTitle = 'You Might Enjoy Our Earthy Box';
          $boxDescription = "Our Earthy Box brings together grounded, natural scents perfect for someone who enjoys being outdoors and connected to the world around them.";
  
      } elseif ($selectedAnswer === "Party") {
          $finalAnswer = "You are a party hat!";
          $finalImg = '../imgs/quizImgs/hatImgs/answers/partyHat.png';
          $description = "You know how to have fun and aren't afraid to stand out! This hat shows that you embrace the eccentric and unique parts of life. You're always up for a new adventure and love making unforgettable memories with friends!";
          $scentDescription = "A bold and exciting mix of sweet vanilla, berries, and musk – made to turn heads.";
          $boxTitle = 'You Might Enjoy Our Celebration Box';
          $boxMonth = 'Take A Look At Our Box Of The Month!';
          $boxMonthDescription ='Experience the rich flavors of Costa Rica with a hand-picked selection of sweet, salty, and spicy treats that bring the tropics to you. From traditional plantain chips to creamy coffee candies made with locally grown beans, this box celebrates the vibrant culture and biodiversity of Central America’s green paradise. Sip on tropical fruit juice, nibble on coconut cookies, and discover why Costa Rica is known for more than just its beaches and volcanoes.';
          $boxDescription = "Our Celebration Box is bursting with vibrant, sweet, and fun scents – perfect for those who love to make every day a party.";
      }
  }
  
  
    // Encode the updated data back into a JSON string
    $newJsonData = json_encode($data, JSON_PRETTY_PRINT);

    // Save the updated data back to adv.json
    file_put_contents($jsonFilePath, $newJsonData);

    // Set the flag to show the results message
    $showResults = true;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>What Type of Hat Are You Quiz</title>
    <link href="../css/quiz.css" rel="stylesheet">
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
        <a href="index.php" class="nav-link">Get Started</a>
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

      <?php session_start(); ?>
                <a href="<?php echo isset($_SESSION['userEmail']) ? 'Profile2.php' : 'Profile.php'; ?>">
                    <img src="https://cdn.builder.io/api/v1/image/assets/3a8ac60b581045f7adb5757904dc023c/81178d926783336ee4924fea04237c405ade17aa?placeholderIfAbsent=true" alt="Profile Icon" class="nav-icon menu-icon" />
                </a>

      </div>
    </nav>
  </div>
</header>
<h1>What Type of Hat Are You?</h1>
  <form id="quizForm" action="../php/quiz3.php" method="POST">
    
    <!-- Question 1 -->
    <div class="question">
      <h3>1. Which hat style speaks to you?</h3>
      <div class="questionrow">
        <label>
          <input type="radio" name="q1" value="Fedora">Fedora
          <img src="../imgs/quizImgs/hatImgs/q1/fedora.png" alt="Fedora Hat">
        </label>
        <label>
          <input type="radio" name="q1" value="Beanie">Beanie
          <img src="../imgs/quizImgs/hatImgs/q1/beanie.png" alt="Beanie Hat">
        </label>
      </div>
      <div class="questionrow">
        <label>
          <input type="radio" name="q1" value="Beret">Beret
          <img src="../imgs/quizImgs/hatImgs/q1/beret.png" alt="Beret Hat">
        </label>
        <label>
          <input type="radio" name="q1" value="TopHat">Top Hat
          <img src="../imgs/quizImgs/hatImgs/q1/tophat.png" alt="Top Hat">
        </label>
      </div>
    </div>
    
    <!-- Question 2 -->
    <div class="question">
      <h3>2. What occasion would you wear your favorite hat for?</h3>
      <div class="questionrow">
        <label>
          <input type="radio" name="q2" value="Formal">Formal Event
          <img src="../imgs/quizImgs/hatImgs/q2/fancy.png" alt="Formal Hat Occasion">
        </label>
        <label>
          <input type="radio" name="q2" value="Casual">Casual Day
          <img src="../imgs/quizImgs/hatImgs/q2/casual.png" alt="Casual Hat Occasion">
        </label>
      </div>
      <div class="questionrow">
        <label>
          <input type="radio" name="q2" value="Outdoor">Outdoor Adventure
          <img src="../imgs/quizImgs/hatImgs/q2/outdoor.png" alt="Outdoor Hat Occasion">
        </label>
        <label>
          <input type="radio" name="q2" value="Party">Party or Celebration
          <img src="../imgs/quizImgs/hatImgs/q2/party.png" alt="Party Hat Occasion">
        </label>
      </div>
    </div>

    <!-- Question 3 -->
    <div class="question">
      <h3>3. How would you describe your personality?</h3>
      <div class="questionrow">
        <label>
          <input type="radio" name="q3" value="Chill">Chill and Relaxed
          <img src="../imgs/quizImgs/hatImgs/q3/chill.png" alt="Chill Personality">
        </label>
        <label>
          <input type="radio" name="q3" value="Bold">Bold and Confident
          <img src="../imgs/quizImgs/hatImgs/q3/bold.png" alt="Bold Personality">
        </label>
      </div>
      <div class="questionrow">
        <label>
          <input type="radio" name="q3" value="Creative">Creative and Artistic
          <img src="../imgs/quizImgs/hatImgs/q3/creative.png" alt="Creative Personality">
        </label>
        <label>
          <input type="radio" name="q3" value="Adventurous">Adventurous and Spontaneous
          <img src="../imgs/quizImgs/hatImgs/q3/adventurous.png" alt="Adventurous Personality">
        </label>
      </div>
    </div>

    <!-- Question 4 -->
    <div class="question">
      <h3>4. What color would you choose for your hat?</h3>
      <div class="questionrow">
        <label>
          <input type="radio" name="q4" value="Black">Classic Black
          <img src="../imgs/quizImgs/hatImgs/q4/black.png" alt="Black Hat Color">
        </label>
        <label>
          <input type="radio" name="q4" value="Red">Bold Red
          <img src="../imgs/quizImgs/hatImgs/q4/red.png" alt="Red Hat Color">
        </label>
      </div>
      <div class="questionrow">
        <label>
          <input type="radio" name="q4" value="Gray">Neutral Gray
          <img src="../imgs/quizImgs/hatImgs/q4/gray.png" alt="Gray Hat Color">
        </label>
        <label>
          <input type="radio" name="q4" value="Bright">Bright and Vibrant
          <img src="../imgs/quizImgs/hatImgs/q4/bright.png" alt="Bright Hat Color">
        </label>
      </div>
    </div>

    <!-- Question 5 -->
    <div class="question">
      <h3>5. What material do you prefer for your hat?</h3>
      <div class="questionrow">
        <label>
          <input type="radio" name="q5" value="Wool">Wool
          <img src="../imgs/quizImgs/hatImgs/q5/wool.png" alt="Wool Hat Material">
        </label>
        <label>
          <input type="radio" name="q5" value="Cotton">Cotton
          <img src="../imgs/quizImgs/hatImgs/q5/cotton.png" alt="Cotton Hat Material">
        </label>
      </div>
      <div class="questionrow">
        <label>
          <input type="radio" name="q5" value="Leather">Leather
          <img src="../imgs/quizImgs/hatImgs/q5/leather.png" alt="Leather Hat Material">
        </label>
        <label>
          <input type="radio" name="q5" value="Straw">Straw
          <img src="../imgs/quizImgs/hatImgs/q5/straw.png" alt="Straw Hat Material">
        </label>
      </div>
    </div>

    <!-- Question 6 -->
    <div class="question">
      <h3>6. How do you usually wear your hat?</h3>
      <div class="questionrow">
        <label>
          <input type="radio" name="q6" value="Front">Front and Center
          <img src="../imgs/quizImgs/hatImgs/q6/front.png" alt="Front Hat Style">
        </label>
        <label>
          <input type="radio" name="q6" value="Tilted">Slightly Tilted
          <img src="../imgs/quizImgs/hatImgs/q6/tilted.png" alt="Tilted Hat Style">
        </label>
      </div>
      <div class="questionrow">
        <label>
          <input type="radio" name="q6" value="Backwards">Worn Backwards
          <img src="../imgs/quizImgs/hatImgs/q6/backwards.png" alt="Backwards Hat Style">
        </label>
        <label>
          <input type="radio" name="q6" value="Off">Casually Off the Side
          <img src="../imgs/quizImgs/hatImgs/q6/side.png" alt="Off Hat Style">
        </label>
      </div>
    </div>

    <button type="submit" class = "submitbtn">Submit</button>
  </form>

  <?php if ($showResults): ?>
    <div class="answerBox">
        <h3><?php echo $finalAnswer; ?></h3>
        <p><?php echo $description; ?></p>
        <img src="<?php echo $finalImg; ?>" alt="Your Hat Persona">
    </div>
    <div class="recs-container">
        <div class="recs">
        <h3><?php echo $boxTitle; ?></h3>
        <p><?php echo $boxDescription; ?></p>
        </div>
    </div>
    <div class="boxMonth-container">
        <div class="boxMonth">
        <h3><?php echo $boxMonth; ?></h3>
        <p><?php echo $boxMonthDescription; ?></p>

        <button class = "submitbtn" onclick="location.href='countries.php'>
        Look at our Box of the Month
    </button>
        </div>
    </div>
  <?php else: ?>
      <div class="answerBox">
          <h3><?php echo $resultsMessage ?: 'Please answer all the questions.'; ?></h3>
      </div>
  <?php endif; ?>

  <footer class="main-footer">
      <div class="footer-content">
        <h3 class="newsletter-title">Subscribe for the latest updates:</h3>
        <input type="email" placeholder="Email Address" class="email-input" />

        <nav class="footer-nav">
          <a href="../FAQs.php">FAQ</a>
          <a href="../ContactUs.php">Contact Us</a>
          <a href="../HowItWorks.php">How it Works</a>
          <a href="../Countries.php">Countries</a>
          <a href="index.php">Get Started</a>
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


