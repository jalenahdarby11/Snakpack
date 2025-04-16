<?php
session_start();

$country = $_POST['country'] ?? null;

if (!$country) {
    echo "No country selected.";
    exit;
}

$_SESSION['cart'][] = $country;

// Save to countries.json
$dataFile = 'countries.json';
$data = file_exists($dataFile) ? json_decode(file_get_contents($dataFile), true) : [];
$data[] = ['country' => $country, 'timestamp' => date("Y-m-d H:i:s")];
file_put_contents($dataFile, json_encode($data, JSON_PRETTY_PRINT));

header("Location: OrderConfirmation.php");
exit();
?>
