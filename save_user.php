<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

$jsonFilePath = 'users.json';

// Function to sanitize input
function test_input($data) {
    return htmlspecialchars(stripslashes(trim($data)));
}

// Check if form data is received
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $firstName = test_input($_POST["firstName"]);
    $lastName = test_input($_POST["lastName"]);
    $email = test_input($_POST["email"]);
    $password = password_hash($_POST["password"], PASSWORD_BCRYPT); // Hash password
    $phone = test_input($_POST["phone"]);

    // Read existing data
    if (file_exists($jsonFilePath) && filesize($jsonFilePath) > 0) {
        $jsonData = file_get_contents($jsonFilePath);
        $dataArray = json_decode($jsonData, true);
    } else {
        $dataArray = [];
    }

    // Prevent duplicate emails
    foreach ($dataArray as $user) {
        if ($user['email'] === $email) {
            die("Email already registered.");
        }
    }

    // Assign a new user ID
    $userId = count($dataArray) + 1;

    // Create new user entry
    $newUser = [
        'userId' => $userId,
        'firstName' => $firstName,
        'lastName' => $lastName,
        'email' => $email,
        'password' => $password, // Securely stored
        'phone' => $phone
    ];

    // Add new user to the array
    $dataArray[] = $newUser;

    // Save updated data to users.json
    if (file_put_contents($jsonFilePath, json_encode($dataArray, JSON_PRETTY_PRINT))) {
        echo "Registration successful!";
    } else {
        echo "Failed to save data.";
    }
}
?>
