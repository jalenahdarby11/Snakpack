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
            $data['Taiwan'] += 1;
        } elseif ($selectedAnswer === "Floral") {
            $data['Thailand'] += 1;
        } elseif ($selectedAnswer === "Woody") {
            $data['Indonesia'] += 1;
        } elseif ($selectedAnswer === "Spicy") {
            $data['Vietnam'] += 1;
        }
    }

    if (isset($answers['q2'])) {
        $selectedAnswer = $answers['q2'];

        if ($selectedAnswer === "Juice") {
            $finalAnswer = "Daisy Eau Arlyn Sicilian Lemon!";
        } elseif ($selectedAnswer === "Milk") {
            $finalAnswer = "Daisy Eau So Fresh Eau De Toilette Spray!";
        } elseif ($selectedAnswer === "Coffee") {
            $finalAnswer = "Gucci Bamboo Spray Eau De Parfum Spray!";
        } elseif ($selectedAnswer === "Chai") {
            $finalAnswer = "JIMMY CHOO I Want Choo Eau de Parfum Spray!";
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
    <title>Article Navigation Page</title>
    <link href="../css/quiz.css" rel="stylesheet">
</head>
<body>
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
        <p><?php echo $finalAnswer; ?></p>
    <?php endif; ?>
</body>
</html>
