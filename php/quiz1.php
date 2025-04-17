
<?php
// Start the session to keep form data
session_start();

// Initialize a flag for showing the results message
$showResults = false;
$resultsMessage = '';
$finalAnswer = '';

    // Check the user's response to q1 and update the data accordingly
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $answers = $_POST;
    
        // Check all required questions are answered
        $required = ['q1', 'q2', 'q3', 'q4', 'q5', 'q6'];
        $allAnswered = true;
        foreach ($required as $question) {
            if (empty($answers[$question])) {
                $allAnswered = false;
                break;
            }
        }
    
        if ($allAnswered) {
            $jsonFilePath = '../json/adv.json';
            $jsonData = file_get_contents($jsonFilePath);
            $data = json_decode($jsonData, true);
    
            // Update country based on q1
            switch ($answers['q1']) {
                case "Citrus": $data['Cyprus'] += 1; break;
                case "Floral": $data['Egypt'] += 1; break;
                case "Woody": $data['Cambodia'] += 1; break;
                case "Spicy": $data['Laos'] += 1; break;
            }
    
            // Set result based on q2
            switch ($answers['q2']) {
                case "Juice":
                    $finalAnswer = "Daisy Eau Arlyn Sicilian Lemon!";
                    $finalImg = '../imgs/quizImgs/perfumeImgs/answers/lemon.jpg';
                    $description = 'A zesty and refreshing scent with vibrant citrus notes that evoke sunny, carefree days.';
                    $boxTitle = 'You Might Enjoy Our French Box';
                    $boxDescription = 'Transport yourself to a Parisian summer market with fresh florals, crisp fruits, and sparkling citrus. This box captures the essence of elegance and sunlit sophistication.';
                    $boxMonth = 'Take A Look At Our Box Of The Month!';
                    $boxMonthDescription ='Experience the rich flavors of Costa Rica with a hand-picked selection of sweet, salty, and spicy treats that bring the tropics to you. From traditional plantain chips to creamy coffee candies made with locally grown beans, this box celebrates the vibrant culture and biodiversity of Central America’s green paradise. Sip on tropical fruit juice, nibble on coconut cookies, and discover why Costa Rica is known for more than just its beaches and volcanoes.';
                    break;
            
                case "Milk":
                    $finalAnswer = "Daisy Eau So Fresh Eau De Toilette Spray!";
                    $finalImg = '../imgs/quizImgs/perfumeImgs/answers/spray.jpg';
                    $description = 'Soft, creamy, and subtly sweet — this fragrance wraps you in comfort like a cozy blanket.';
                    $boxTitle = 'You Might Enjoy Our Qatar Box';
                    $boxDescription = 'Inspired by the soothing luxury of Qatari hospitality, this box features warm, delicate notes that embody serene evenings and calm desert breezes.';
                    $boxMonth = 'Take A Look At Our Box Of The Month!';
                    $boxMonthDescription ='Experience the rich flavors of Costa Rica with a hand-picked selection of sweet, salty, and spicy treats that bring the tropics to you. From traditional plantain chips to creamy coffee candies made with locally grown beans, this box celebrates the vibrant culture and biodiversity of Central America’s green paradise. Sip on tropical fruit juice, nibble on coconut cookies, and discover why Costa Rica is known for more than just its beaches and volcanoes.';
                    break;
            
                case "Coffee":
                    $finalAnswer = "Gucci Bamboo Spray Eau De Parfum Spray!";
                    $finalImg = '../imgs/quizImgs/perfumeImgs/answers/parfum.png';
                    $description = 'Strong yet graceful, this bold scent blends floral and woody notes for a confident vibe.';
                    $boxTitle = 'You Might Enjoy Our Germany Box';
                    $boxDescription = 'With deep, earthy undertones and structured elegance, this box echoes Germany’s blend of bold innovation and timeless charm — a scent for thinkers and trailblazers.';
                    $boxMonth = 'Take A Look At Our Box Of The Month!';
                    $boxMonthDescription ='Experience the rich flavors of Costa Rica with a hand-picked selection of sweet, salty, and spicy treats that bring the tropics to you. From traditional plantain chips to creamy coffee candies made with locally grown beans, this box celebrates the vibrant culture and biodiversity of Central America’s green paradise. Sip on tropical fruit juice, nibble on coconut cookies, and discover why Costa Rica is known for more than just its beaches and volcanoes.';                    
                    break;
            
                case "Chai":
                    $finalAnswer = "JIMMY CHOO I Want Choo Eau de Parfum Spray!";
                    $finalImg = '../imgs/quizImgs/perfumeImgs/answers/eau.png';
                    $description = 'Warm, spicy, and irresistibly bold — just like a good cup of chai and a great night out.';
                    $boxTitle = 'You Might Enjoy Our India Box';
                    $boxDescription = 'Infused with the vibrant spices and rich traditions of India, this box celebrates energy, color, and warmth in every note — a true sensory adventure.';
                    $boxMonth = 'Take A Look At Our Box Of The Month!';
                    $boxMonthDescription ='Experience the rich flavors of Costa Rica with a hand-picked selection of sweet, salty, and spicy treats that bring the tropics to you. From traditional plantain chips to creamy coffee candies made with locally grown beans, this box celebrates the vibrant culture and biodiversity of Central America’s green paradise. Sip on tropical fruit juice, nibble on coconut cookies, and discover why Costa Rica is known for more than just its beaches and volcanoes.';
                    break;
            }
            
    
            file_put_contents($jsonFilePath, json_encode($data, JSON_PRETTY_PRINT));
            $showResults = true;
        } else {
            $resultsMessage = "Please answer all the questions.";
        }
    }
    
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>What is Your Signature Scent Quiz</title>
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
        <a href="../GetStartedQ1.php" class="nav-link">Get Started</a>
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
    <h1>What is Your Signature Scent?</h1>
    <form id="quizForm" action="" method="POST">
        <!-- Question 1 -->
        <div class="question">
            <h3>1. Which scent do you prefer?</h3>
            <div class="questionrow">
                <label>
                    <input type="radio" name="q1" value="Citrus"> Citrus
                    <img src="../imgs/quizImgs/perfumeImgs/q1/citrus.jpg" alt="Citrus">
                </label>
                <label>
                    <input type="radio" name="q1" value="Floral"> Floral
                    <img src="../imgs/quizImgs/perfumeImgs/q1/floral.jpg" alt="Floral">
                </label>
            </div>
            <div class="questionrow">
                <label>
                    <input type="radio" name="q1" value="Woody"> Woody
                    <img src="../imgs/quizImgs/perfumeImgs/q1/smoky.jpg" alt="Woody">
                </label>
                <label>
                    <input type="radio" name="q1" value="Spicy"> Spicy
                    <img src="../imgs/quizImgs/perfumeImgs/q1/spicy.jpg" alt="Spicy">
                </label>
            </div>
        </div>

        <!-- Question 2 -->
        <div class="question">
            <h3>2. What do you drink in the morning?</h3>
            <div class="questionrow">
                <label>
                    <input type="radio" name="q2" value="Juice"> Juice
                    <img src="../imgs/quizImgs/perfumeImgs/q2/juice.png" alt="Juice">
                </label>
                <label>
                    <input type="radio" name="q2" value="Milk"> Milk
                    <img src="../imgs/quizImgs/perfumeImgs/q2/milk.png" alt="Milk">
                </label>
            </div>
            <div class="questionrow">
                <label>
                    <input type="radio" name="q2" value="Coffee"> Coffee
                    <img src="../imgs/quizImgs/perfumeImgs/q2/coffee.png" alt="Coffee">
                </label>
                <label>
                    <input type="radio" name="q2" value="Chai"> Chai
                    <img src="../imgs/quizImgs/perfumeImgs/q2/chai.png" alt="Chai">
                </label>
            </div>
        </div>

        <!-- Question 3 -->
        <div class="question">
            <h3>3. How strong do you like your fragrance?</h3>
            <div class="questionrow">
                <label>
                    <input type="radio" name="q3" value="Light"> Light
                    <img src="../imgs/quizImgs/perfumeImgs/q3/light.png" alt="Light Fragrance">
                </label>
                <label>
                    <input type="radio" name="q3" value="Medium"> Medium
                    <img src="../imgs/quizImgs/perfumeImgs/q3/medium.png" alt="Medium Fragrance">
                </label>
            </div>
            <div class="questionrow">
                <label>
                    <input type="radio" name="q3" value="Strong"> Strong
                    <img src="../imgs/quizImgs/perfumeImgs/q3/heavy.png" alt="Strong Fragrance">
                </label>
            </div>
        </div>

        <!-- Question 4 -->
        <div class="question">
            <h3>4. What season do you prefer your fragrance for?</h3>
            <div class="questionrow">
                <label>
                    <input type="radio" name="q4" value="Spring"> Spring
                    <img src="../imgs/quizImgs/perfumeImgs/q4/spring.png" alt="Spring Fragrance">
                </label>
                <label>
                    <input type="radio" name="q4" value="Summer"> Summer
                    <img src="../imgs/quizImgs/perfumeImgs/q4/summer.png" alt="Summer Fragrance">
                </label>
            </div>
            <div class="questionrow">
                <label>
                    <input type="radio" name="q4" value="Autumn"> Autumn
                    <img src="../imgs/quizImgs/perfumeImgs/q4/fall.png" alt="Autumn Fragrance">
                </label>
                <label>
                    <input type="radio" name="q4" value="Winter"> Winter
                    <img src="../imgs/quizImgs/perfumeImgs/q4/winter.png" alt="Winter Fragrance">
                </label>
            </div>
        </div>

        <!-- Question 5 -->
        <div class="question">
            <h3>5. What color do you like best?</h3>
            <div class="questionrow">
                <label>
                    <input type="radio" name="q5" value="Purple"> Purple
                    <img src="../imgs/quizImgs/perfumeImgs/q5/purple.png" alt="Purple">
                </label>
                <label>
                    <input type="radio" name="q5" value="Green"> Green
                    <img src="../imgs/quizImgs/perfumeImgs/q5/green.png" alt="Green">
                </label>
            </div>
            <div class="questionrow">
                <label>
                    <input type="radio" name="q5" value="Yellow"> Yellow
                    <img src="../imgs/quizImgs/perfumeImgs/q5/yellow.png" alt="Yellow">
                </label>
            </div>
        </div>

        <!-- Question 6 -->
        <div class="question">
            <h3>6. Which type of perfume bottle do you prefer?</h3>
            <div class="questionrow">
                <label>
                    <input type="radio" name="q6" value="Classic"> Classic
                    <img src="../imgs/quizImgs/perfumeImgs/q6/classic.png" alt="Classic Bottle">
                </label>
                <label>
                    <input type="radio" name="q6" value="Modern"> Modern
                    <img src="../imgs/quizImgs/perfumeImgs/q6/modern.png" alt="Modern Bottle">
                </label>
            </div>
            <div class="questionrow">
                <label>
                    <input type="radio" name="q6" value="Luxury"> Luxury
                    <img src="../imgs/quizImgs/perfumeImgs/q6/luxury.png" alt="Luxury Bottle">
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

        <button class = "submitbtn" onclick="location.href='countries.php'>Look at our Box of the Month</button>
        </div>
    </div>
    
<?php else: ?>
    <div class= "answerBox">
        <h3><?php echo $resultsMessage ?: 'Please answer all the questions.'; ?></h3>
    </div>
<?php endif; ?>

<footer class="main-footer">
      <div class="footer-content">
        <h3 class="newsletter-title">Subscribe for the latest updates:</h3>
        <input type="email" placeholder="Email Address" class="email-input" />

        <nav class="footer-nav">
          <a href="FAQs.php">FAQ</a>
          <a href="../ContactUs.php">Contact Us</a>
          <a href="../HowItWorks.php">How it Works</a>
          <a href="../Countries.php">Countries</a>
          <a href="../GetStartedQ1.php">Get Started</a>
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

