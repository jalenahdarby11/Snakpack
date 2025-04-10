<?php
// Start the session to keep form data
session_start();

// Initialize a flag for showing the results message
$showResults = false;
$resultsMessage = '';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
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
            $data['Taiwan'] += 1;
        } elseif ($selectedAnswer === "Floral") {
            $data['Thailand'] += 1;
        } elseif ($selectedAnswer === "Woody") {
            $data['Indonesia'] += 1;
        } elseif ($selectedAnswer === "Spicy") {
            $data['Vietnam'] += 1;
        }
    }

    // Encode the updated data back into a JSON string
    $newJsonData = json_encode($data, JSON_PRETTY_PRINT);

    // Save the updated data back to adv.json
    file_put_contents($jsonFilePath, $newJsonData);

    // Set the flag to show the results message
    $showResults = true;
    $resultsMessage = "Thank you for your submission! Your answers have been recorded.";
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Thank You for Your Submission</title>
</head>
<body>

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

  <script>
    document.getElementById("quizForm").addEventListener("submit", function(event) {
        let questions = document.querySelectorAll('.question');
        for (let question of questions) {
            let selectedAnswer = question.querySelector('input[type="radio"]:checked');
            if (!selectedAnswer) {
                alert("Please answer all questions before submitting.");
                event.preventDefault();
                return;
            }
        }
    });
  </script>

    <h1>Quiz Results</h1>

    <?php if ($showResults): ?>
        <p><?php echo $resultsMessage; ?></p>
        <p>Your data has been successfully recorded.</p>
        <p>Redirecting in 1 second...</p>
        <script>
            // Redirect after 1 second
            window.location.href = "../articles/thankyou.html"; // Change to your desired page

        </script>
    <?php else: ?>
        <p>It seems like the form has not been submitted yet. Please complete the quiz.</p>
    <?php endif; ?>
</body>
</html>
