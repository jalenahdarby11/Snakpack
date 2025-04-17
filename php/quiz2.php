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
        if ($selectedAnswer === "Citrus") {
            $data['Bhutan'] += 1;
        } elseif ($selectedAnswer === "Floral") {
            $data['South Africa'] += 1;
        } elseif ($selectedAnswer === "Woody") {
            $data['United Arab Emirates'] += 1;
        } elseif ($selectedAnswer === "Spicy") {
            $data['Jordan'] += 1;
        }
    }

    if (isset($answers['q2'])) {
      $selectedAnswer = $answers['q2'];
  
      if ($selectedAnswer === "Floral") {
          $finalAnswer = "You are Katara!";
          $finalImg = '../imgs/quizImgs/avatarImgs/answers/katara.png';
          $description = 'Graceful, nurturing, and strong-willed — like Katara, you’re deeply in tune with your emotions and the world around you.';
          $description = 'A zesty and refreshing scent with vibrant citrus notes that evoke sunny, carefree days.';
          $boxTitle = 'You Might Enjoy Our Russia Box';
          $boxMonth = 'Take A Look At Our Box Of The Month!';
          $boxMonthDescription ='Experience the rich flavors of Costa Rica with a hand-picked selection of sweet, salty, and spicy treats that bring the tropics to you. From traditional plantain chips to creamy coffee candies made with locally grown beans, this box celebrates the vibrant culture and biodiversity of Central America’s green paradise. Sip on tropical fruit juice, nibble on coconut cookies, and discover why Costa Rica is known for more than just its beaches and volcanoes.';
          $boxDescription = 'This box features delicate floral scents that mirror the elegance and emotional depth of Russian tradition. Ideal for those who value beauty, warmth, and resilience.';
      } elseif ($selectedAnswer === "Spicy") {
          $finalAnswer = "You are Toph!";
          $boxMonth = 'Take A Look At Our Box Of The Month!';
          $boxMonthDescription ='Experience the rich flavors of Costa Rica with a hand-picked selection of sweet, salty, and spicy treats that bring the tropics to you. From traditional plantain chips to creamy coffee candies made with locally grown beans, this box celebrates the vibrant culture and biodiversity of Central America’s green paradise. Sip on tropical fruit juice, nibble on coconut cookies, and discover why Costa Rica is known for more than just its beaches and volcanoes.';
          $finalImg = '../imgs/quizImgs/avatarImgs/answers/toph.png';
          $description = 'Bold, fearless, and full of sass — you bring the heat just like Toph, and you’re not afraid to shake things up.';
          $description = 'A zesty and refreshing scent with vibrant citrus notes that evoke sunny, carefree days.';
          $boxTitle = 'You Might Enjoy Our China Box';
          $boxDescription = 'Our China Box includes bold, spicy fragrances that reflect the power and passion of tradition and strength. Perfect for fearless trailblazers like you.';
      } elseif ($selectedAnswer === "Woody") {
          $finalAnswer = "You are Zukko!";
          $boxMonth = 'Take A Look At Our Box Of The Month!';
          $boxMonthDescription ='Experience the rich flavors of Costa Rica with a hand-picked selection of sweet, salty, and spicy treats that bring the tropics to you. From traditional plantain chips to creamy coffee candies made with locally grown beans, this box celebrates the vibrant culture and biodiversity of Central America’s green paradise. Sip on tropical fruit juice, nibble on coconut cookies, and discover why Costa Rica is known for more than just its beaches and volcanoes.';
          $finalImg = '../imgs/quizImgs/avatarImgs/answers/zukko.png';
          $description = 'Deep, intense, and quietly passionate — your journey is one of growth and redemption, much like Zuko’s.';
          $description = 'A zesty and refreshing scent with vibrant citrus notes that evoke sunny, carefree days.';
          $boxTitle = 'You Might Enjoy Our Japan Box';
          $boxDescription = 'The Japan Box offers serene, woody scents inspired by ancient forests and meditative traditions. Designed for thoughtful, introspective souls.';
      } elseif ($selectedAnswer === "Fruity") {
          $finalAnswer = "You are Aang!";
          $finalImg = '../imgs/quizImgs/avatarImgs/answers/aang.png';
          $description = 'Playful, free-spirited, and full of heart — you light up every room just like Aang brings joy to every adventure.';
          $description = 'A zesty and refreshing scent with vibrant citrus notes that evoke sunny, carefree days.';
          $boxTitle = 'You Might Enjoy Our Tibet Box';
          $boxMonth = 'Take A Look At Our Box Of The Month!';
          $boxMonthDescription ='Experience the rich flavors of Costa Rica with a hand-picked selection of sweet, salty, and spicy treats that bring the tropics to you. From traditional plantain chips to creamy coffee candies made with locally grown beans, this box celebrates the vibrant culture and biodiversity of Central America’s green paradise. Sip on tropical fruit juice, nibble on coconut cookies, and discover why Costa Rica is known for more than just its beaches and volcanoes.';
          $boxDescription = 'The Tibet Box brings lively, fresh scents inspired by air, freedom, and spiritual joy — perfect for adventurers and optimists.';
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
  <title>What Avatar Character Are You Quiz</title>
  <link rel="stylesheet" href="../css/quiz.css">
  <link href = "../css/style.css" rel = "stylesheet">

</head>
<body>
<header class="nav-header">
  <div class="nav-container">
    <img src="https://cdn.builder.io/api/v1/image/assets/3a8ac60b581045f7adb5757904dc023c/9e595b5f1fcde182a7dfc4c426d1f05c6b2789f1?placeholderIfAbsent=true" alt="Logo" class="main-logo" />
    <nav class="navigation-bar">
      <div class="nav-links">
        <a href="HomePage.php" class="nav-link">Home</a>
        <a href="HowItWorks.php" class="nav-link">How It Works</a>
        <a href="Countries.php" class="nav-link">Countries</a>
        <a href="GetStartedQ1.php" class="nav-link">Get Started</a>
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
  <h1>What Avatar Character Are You?</h1>

  <form id="quizForm" action="../php/quiz2.php" method="POST">

    <!-- Question 1 -->
    <div class="question">
      <h3>1. Which environment do you feel most connected to?</h3>
      <div class="questionrow">
        <label>
          <input type="radio" name="q1" value="Citrus"> Water and the ocean
          <img src="../imgs/quizImgs/avatarImgs/q1/ocean.png" alt="Katara">
        </label>
        <label>
          <input type="radio" name="q1" value="Floral"> Nature and forests
          <img src="../imgs/quizImgs/avatarImgs/q1/forest.png" alt="Toph">
        </label>
      </div>
      <div class="questionrow">
        <label>
          <input type="radio" name="q1" value="Woody"> Mountains and wilderness
          <img src="../imgs/quizImgs/avatarImgs/q1/mountain.png" alt="Zuko">
        </label>
        <label>
          <input type="radio" name="q1" value="Spicy"> Cities and action
          <img src="../imgs/quizImgs/avatarImgs/q1/city.png" alt="Azula">
        </label>
      </div>
    </div>

    <!-- Question 2 -->
    <div class="question">
      <h3>2. What’s your greatest strength?</h3>
      <div class="questionrow">
        <label>
          <input type="radio" name="q2" value="Floral"> Kindness and healing
          <img src="../imgs/quizImgs/avatarImgs/q2/kind.png" alt="Katara Strength">
        </label>
        <label>
          <input type="radio" name="q2" value="Fruity"> Optimism and energy
          <img src="../imgs/quizImgs/avatarImgs/q2/energy.png" alt="Aang">
        </label>
      </div>
      <div class="questionrow">
        <label>
          <input type="radio" name="q2" value="Spicy"> Confidence and drive
          <img src="../imgs/quizImgs/avatarImgs/q2/confidence.png" alt="Azula Strength">
        </label>
        <label>
          <input type="radio" name="q2" value="Woody"> Toughness and resilience
          <img src="../imgs/quizImgs/avatarImgs/q2/tough.png" alt="Toph Strength">
        </label>
      </div>
    </div>

        <!-- Question 3 -->
        <div class="question">
      <h3>3. How do you react under pressure?</h3>
      <div class="questionrow">
        <label>
          <input type="radio" name="q3" value="Light"> Stay calm and centered
          <img src="../imgs/quizImgs/avatarImgs/q3/calm.png" alt="Aang Calm">
        </label>
        <label>
          <input type="radio" name="q3" value="Medium"> Balance emotions and logic
          <img src="../imgs/quizImgs/avatarImgs/q3/balance.png" alt="Zuko Balanced">
        </label>
      </div>
      <div class="questionrow">
        <label>
          <input type="radio" name="q3" value="Strong"> Charge through with fire
          <img src="../imgs/quizImgs/avatarImgs/q3/firey.png" alt="Azula Intense">
        </label>
      </div>
    </div>

    <!-- Question 4 -->
    <div class="question">
      <h3>4. What’s your favorite element?</h3>
      <div class="questionrow">
        <label>
          <input type="radio" name="q4" value="Spring"> Water
          <img src="../imgs/quizImgs/avatarImgs/q4/water.png" alt="Water">
        </label>
        <label>
          <input type="radio" name="q4" value="Summer"> Fire
          <img src="../imgs/quizImgs/avatarImgs/q4/fire.png" alt="Fire">
        </label>
      </div>
      <div class="questionrow">
        <label>
          <input type="radio" name="q4" value="Autumn"> Earth
          <img src="../imgs/quizImgs/avatarImgs/q4/earth.png" alt="Earth">
        </label>
        <label>
          <input type="radio" name="q4" value="Winter"> Air
          <img src="../imgs/quizImgs/avatarImgs/q4/air.png" alt="Air">
        </label>
      </div>
    </div>

    <!-- Question 5 -->
    <div class="question">
      <h3>5. What’s your greatest weakness?</h3>
      <div class="questionrow">
        <label>
          <input type="radio" name="q5" value="Floral"> Too empathetic
          <img src="../imgs/quizImgs/avatarImgs/q5/empathy.png" alt="Katara Emotion">
        </label>
        <label>
          <input type="radio" name="q5" value="Spicy"> Too intense or impulsive
          <img src="../imgs/quizImgs/avatarImgs/q5/intense.png" alt="Azula Anger">
        </label>
      </div>
      <div class="questionrow">
        <label>
          <input type="radio" name="q5" value="Sweet"> Too trusting or naive
          <img src="../imgs/quizImgs/avatarImgs/q5/trust.png" alt="Aang Trust">
        </label>
      </div>
    </div>

    <!-- Question 6 -->
    <div class="question">
      <h3>6. What kind of leader are you?</h3>
      <div class="questionrow">
        <label>
          <input type="radio" name="q6" value="Classic"> Guided by tradition and honor
          <img src="../imgs/quizImgs/avatarImgs/q6/tradition.png" alt="Iroh">
        </label>
        <label>
          <input type="radio" name="q6" value="Modern"> Innovative and forward-thinking
          <img src="../imgs/quizImgs/avatarImgs/q6/innovation.png" alt="Zaheer">
        </label>
      </div>
      <div class="questionrow">
        <label>
          <input type="radio" name="q6" value="Luxury"> Commanding with charisma
          <img src="../imgs/quizImgs/avatarImgs/q6/charm.png" alt="Azula Royal">
        </label>
      </div>
    </div>

    <button type="submit" class="submitbtn">Submit</button>
  </form>

  <?php if ($showResults): ?>
    <div class="answerBox">
        <h3><?php echo $finalAnswer; ?></h3>
        <p><?php echo $description; ?></p>
        <img src="<?php echo $finalImg; ?>" alt="Your Fragrance">
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

