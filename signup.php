<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

$jsonFilePath = 'users.json';

function test_input($data) {
    return htmlspecialchars(stripslashes(trim($data)));
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $firstName = test_input($_POST["firstName"]);
    $lastName = test_input($_POST["lastName"]);
    $email = test_input($_POST["email"]);
    $password = password_hash($_POST["password"], PASSWORD_BCRYPT);
    $phone = test_input($_POST["phone"]);

    if (file_exists($jsonFilePath) && filesize($jsonFilePath) > 0) {
        $jsonData = file_get_contents($jsonFilePath);
        $dataArray = json_decode($jsonData, true);
    } else {
        $dataArray = [];
    }

    foreach ($dataArray as $user) {
        if ($user['email'] === $email) {
            die("Email already registered.");
        }
    }

    $userId = count($dataArray) + 1;

    $newUser = [
        'userId' => $userId,
        'firstName' => $firstName,
        'lastName' => $lastName,
        'email' => $email,
        'password' => $password,
        'phone' => $phone
    ];

    $dataArray[] = $newUser;

    if (file_put_contents($jsonFilePath, json_encode($dataArray, JSON_PRETTY_PRINT))) {
        header("Location: Profile2.html?userId=$userId");
        exit();
    } else {
        echo "Failed to save data.";
    }
}
?>
