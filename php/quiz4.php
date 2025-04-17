
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
            $data['South Africa'] += 1;
        } elseif ($selectedAnswer === "Floral") {
            $data['Bhutan'] += 1;
        } elseif ($selectedAnswer === "Woody") {
            $data['Egypt'] += 1;
        } elseif ($selectedAnswer === "Spicy") {
            $data['Laos'] += 1;
        }
    }

    if (isset($answers['q2'])) {
      $selectedAnswer = $answers['q2'];
  
      if ($selectedAnswer === "Floral") {
          $finalAnswer = "Your Next Vacation Is: Peru!";
          $finalImg = '../imgs/quizImgs/vacationImgs/answers/peru.png';
          $description = 'Discover the breathtaking landscapes of the Andes, explore ancient Incan ruins like Machu Picchu, and immerse yourself in the vibrant culture and colorful textiles of Peru.';
          $boxMonth = 'Take A Look At Our Box Of The Month!';
          $boxMonthDescription ='Experience the rich flavors of Costa Rica with a hand-picked selection of sweet, salty, and spicy treats that bring the tropics to you. From traditional plantain chips to creamy coffee candies made with locally grown beans, this box celebrates the vibrant culture and biodiversity of Central America’s green paradise. Sip on tropical fruit juice, nibble on coconut cookies, and discover why Costa Rica is known for more than just its beaches and volcanoes.';
          $boxTitle = 'You Might Enjoy Our Peru Box';
          $boxDescription = 'Enjoy floral-infused treats and handcrafted goods inspired by Peru’s vibrant landscapes. This box captures the spirit of nature and culture from the Andes to the Amazon.';
        } elseif ($selectedAnswer === "Fruity") {
          $finalAnswer = "Your Next Vacation Is: Spain!";
          $finalImg = '../imgs/quizImgs/vacationImgs/answers/spain.png';
          $description = 'Experience the passionate culture of Spain, from the lively tapas bars and flamenco shows to the stunning architecture of Barcelona and the historic charm of Andalusia.';
          $description = 'A zesty and refreshing scent with vibrant citrus notes that evoke sunny, carefree days.';
          $boxMonth = 'Take A Look At Our Box Of The Month!';
          $boxMonthDescription ='Experience the rich flavors of Costa Rica with a hand-picked selection of sweet, salty, and spicy treats that bring the tropics to you. From traditional plantain chips to creamy coffee candies made with locally grown beans, this box celebrates the vibrant culture and biodiversity of Central America’s green paradise. Sip on tropical fruit juice, nibble on coconut cookies, and discover why Costa Rica is known for more than just its beaches and volcanoes.';
          $boxTitle = 'You Might Enjoy Our Spain Box';
          $boxDescription = 'Packed with fruity flavors and lively aromas, this box brings the zest of Spanish life to your doorstep. Explore artisan snacks and vibrant accents from Spain’s sun-soaked regions.';
        } elseif ($selectedAnswer === "Spicy") {
          $finalAnswer = "Your Next Vacation Is: Iceland!";
          $finalImg = '../imgs/quizImgs/vacationImgs/answers/iceland.png';
          $description = 'Witness the dramatic beauty of Iceland: glaciers, volcanoes, waterfalls, and the magical Northern Lights. Adventure awaits in this land of fire and ice.';
          $description = 'A zesty and refreshing scent with vibrant citrus notes that evoke sunny, carefree days.';
          $boxTitle = 'You Might Enjoy Our Iceland Box';
          $boxMonth = 'Take A Look At Our Box Of The Month!';
          $boxMonthDescription ='Experience the rich flavors of Costa Rica with a hand-picked selection of sweet, salty, and spicy treats that bring the tropics to you. From traditional plantain chips to creamy coffee candies made with locally grown beans, this box celebrates the vibrant culture and biodiversity of Central America’s green paradise. Sip on tropical fruit juice, nibble on coconut cookies, and discover why Costa Rica is known for more than just its beaches and volcanoes.';
          $boxDescription = 'Spice up your senses with Icelandic delights—from volcanic salts to bold local flavors. This box brings the adventurous essence of Iceland to life.';
        } elseif ($selectedAnswer === "Woody") {
          $finalAnswer = "Your Next Vacation Is: Costa Rica!";
          $finalImg = '../imgs/quizImgs/vacationImgs/answers/costa.png';
          $description = 'Immerse yourself in the lush rainforests, diverse wildlife, and stunning beaches of Costa Rica. Enjoy eco-adventures like ziplining, hiking, and exploring volcanic landscapes.';
          $description = 'A zesty and refreshing scent with vibrant citrus notes that evoke sunny, carefree days.';
          $boxTitle = 'You Might Enjoy Our Costa Rica Box';
          $boxMonth = 'Take A Look At Our Box Of The Month!';
          $boxMonthDescription ='Experience the rich flavors of Costa Rica with a hand-picked selection of sweet, salty, and spicy treats that bring the tropics to you. From traditional plantain chips to creamy coffee candies made with locally grown beans, this box celebrates the vibrant culture and biodiversity of Central America’s green paradise. Sip on tropical fruit juice, nibble on coconut cookies, and discover why Costa Rica is known for more than just its beaches and volcanoes.';
          $boxDescription = 'Earthy, grounding, and full of rainforest charm—our Costa Rica box invites you to explore nature through scents, snacks, and sustainably crafted goods.';
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
    <title>Where Is Your Next Vacation Quiz</title>
    <link href = "../css/quiz.css" rel = "stylesheet">
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
<h1>Where Is Your Next Vacation?</h1>
  <form id="quizForm" action="../php/quiz4.php" method="POST">

      <!-- Question 1 -->
      <div class="question">
        <h3>1. What’s your ideal travel vibe?</h3>
        <div class="questionrow">
          <label>
            <input type="radio" name="q1" value="Citrus"> Tropical beaches and sunshine
            <img src="../imgs/quizImgs/vacationImgs/q1/beach.png" alt="Tropical Beach">
          </label>
          <label>
            <input type="radio" name="q1" value="Floral"> Nature and lush forests
            <img src="../imgs/quizImgs/vacationImgs/q1/forest.png" alt="Forest">
          </label>
          <div class="questionrow">
          <label>
            <input type="radio" name="q1" value="Woody"> Rustic cabins and mountain air
            <img src="../imgs/quizImgs/vacationImgs/q1/cabin.png" alt="Mountains">
          </label>
          <label>
            <input type="radio" name="q1" value="Spicy"> Bustling cities and street life
            <img src="../imgs/quizImgs/vacationImgs/q1/city.png" alt="City">
          </label>
        </div>
      </div>

      <!-- Question 2 -->
      <div class="question">
        <h3>2. What scenery excites you most?</h3>
        <div class="questionrow">
          <label>
            <input type="radio" name="q2" value="Floral"> Gardens and colorful fields
            <img src="../imgs/quizImgs/vacationImgs/q2/garden.png" alt="Fields">
          </label>
          <label>
            <input type="radio" name="q2" value="Fruity"> Tropical jungles and wildlife
            <img src="../imgs/quizImgs/vacationImgs/q2/jungle.png" alt="Jungle">
          </label>
        </div>
        <div class="questionrow">
          <label>
            <input type="radio" name="q2" value="Spicy"> Vibrant markets and architecture
            <img src="../imgs/quizImgs/vacationImgs/q2/market.png" alt="Market">
          </label>
          <label>
            <input type="radio" name="q2" value="Woody"> Forest trails and woodlands
            <img src="../imgs/quizImgs/vacationImgs/q2/forest.png" alt="Woodlands">
          </label>
        </div>
      </div>
    
      <!-- Question 3 -->
      <div class="question">
        <h3>3. How adventurous do you want your vacation?</h3>
        <div class="questionrow">
          <label>
            <input type="radio" name="q3" value="Light"> Peaceful and easygoing
            <img src="../imgs/quizImgs/vacationImgs/q3/peaceful.png" alt="Peaceful">
          </label>
          <label>
            <input type="radio" name="q3" value="Medium"> A mix of chill and activity
            <img src="../imgs/quizImgs/vacationImgs/q3/chill.png" alt="Balanced">
          </label>
        </div>
        <div class="questionrow">
        <label>
          <input type="radio" name="q3" value="Strong"> Non-stop adventure!
          <img src="../imgs/quizImgs/vacationImgs/q3/adventure.png" alt="Adventure">
        </label>
      </div>
      </div>

      <!-- Question 4 -->
      <div class="question">
        <h3>4. What’s your favorite season to travel in?</h3>
        <div class="questionrow">
          <label>
            <input type="radio" name="q4" value="Spring"> Spring – flowers and freshness
            <img src="../imgs/quizImgs/vacationImgs/q4/spring.png" alt="Spring">
          </label>
          <label>
            <input type="radio" name="q4" value="Summer"> Summer – sunshine and swims
            <img src="../imgs/quizImgs/vacationImgs/q4/summer.png" alt="Summer">
          </label>
        </div>
        <div class="questionrow">
          <label>
            <input type="radio" name="q4" value="Autumn"> Autumn – crisp air and colors
            <img src="../imgs/quizImgs/vacationImgs/q4/fall.png" alt="Autumn">
          </label>
          <label>
            <input type="radio" name="q4" value="Winter"> Winter – snow and cozy vibes
            <img src="../imgs/quizImgs/vacationImgs/q4/winter.png" alt="Winter">
          </label>
        </div>
      </div>
    </div>

    <div class="questionrow">
      <!-- Question 5 -->
      <div class="question">
        <h3>5. What kind of local experience do you prefer?</h3>
        <div class="questionrow">
          <label>
            <input type="radio" name="q5" value="Floral"> Visiting gardens and parks
            <img src="../imgs/quizImgs/vacationImgs/q5/gardens.png" alt="Park">
          </label>
          <label>
            <input type="radio" name="q5" value="Spicy"> Tasting exotic street foods
            <img src="../imgs/quizImgs/vacationImgs/q5/street.png" alt="Street Food">
          </label>
        </div>
        <div class="questionrow">
          <label>
            <input type="radio" name="q5" value="Sweet"> Sampling desserts and local treats
            <img src="../imgs/quizImgs/vacationImgs/q5/desserts.png" alt="Desserts">
          </label>
      </div>
      </div>

      <!-- Question 6 -->
      <div class="question">
        <h3>6. What’s your ideal travel aesthetic?</h3>
        <div class="questionrow">
          <label>
            <input type="radio" name="q6" value="Classic"> Timeless landmarks and traditions
            <img src="../imgs/quizImgs/vacationImgs/q6/landmarks.png" alt="Classic">
          </label>
          <label>
            <input type="radio" name="q6" value="Modern"> Futuristic and urban
            <img src="../imgs/quizImgs/vacationImgs/q6/futuristic.png" alt="Modern">
          </label>
        </div>
        <div class="questionrow">
          <label>
            <input type="radio" name="q6" value="Luxury"> Luxurious resorts and getaways
            <img src="../imgs/quizImgs/vacationImgs/q6/luxury.png" alt="Luxury">
          </label>
        </div>
      </div>
    </div>

    <button type="submit" class = "submitbtn">Submit</button>
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

