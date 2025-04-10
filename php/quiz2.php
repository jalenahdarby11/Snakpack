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

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>What Avatar Character Are You?</title>
  <link rel="stylesheet" href="../css/quiz.css">
</head>
<body>
  <h1>What Avatar Character Are You?</h1>
  <form id="quizForm" action="../php/quiz2.php" method="POST">

    <!-- Question 1 -->
    <div class="question">
      <h3>1. Which environment do you feel most connected to?</h3>
      <div class="questionrow">
        <label>
          <input type="radio" name="q1" value="Citrus"> Ocean and water
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
