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

  <script>
    document.getElementById("quizForm").addEventListener("submit", function(event) {
      const selectedAnswer = document.querySelector('input[name="q1"]:checked');
      if (!selectedAnswer) {
        alert("Please answer the first question before submitting!");
        event.preventDefault();
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
