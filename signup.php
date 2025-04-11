<?php
session_start();

$jsonFilePath = 'users.json';

function test_input($data) {
  return htmlspecialchars(stripslashes(trim($data)));
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $firstName = test_input($_POST["firstName"]);
  $lastName = test_input($_POST["lastName"]);
  $email = test_input($_POST["email"]);
  $password = password_hash($_POST["password"], PASSWORD_DEFAULT);
  $phone = test_input($_POST["phone"]);

  if (file_exists($jsonFilePath) && filesize($jsonFilePath) > 0) {
    $users = json_decode(file_get_contents($jsonFilePath), true);
  } else {
    $users = [];
  }

  $userId = count($users) + 1;

  $newUser = [
    "userId" => $userId,
    "firstName" => $firstName,
    "lastName" => $lastName,
    "email" => $email,
    "password" => $password,
    "phone" => $phone
  ];

  $users[] = $newUser;
  file_put_contents($jsonFilePath, json_encode($users, JSON_PRETTY_PRINT));

  $_SESSION['userEmail'] = $email;

  header("Location: Profile2.php");
  exit();
}
?>


