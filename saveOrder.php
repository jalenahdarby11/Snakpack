<?php
session_start();
file_put_contents("debug.log", "saveOrder.php accessed\n", FILE_APPEND);

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $order = [
        'firstName' => $_POST['firstName'] ?? '',
        'lastName' => $_POST['lastName'] ?? '',
        'email' => $_POST['userEmail'] ?? '',  // use form input instead of session
        'street' => $_POST['street'] ?? '',
        'city' => $_POST['city'] ?? '',
        'state' => $_POST['state'] ?? '',
        'zip' => $_POST['zip'] ?? '',
        'mobile' => $_POST['mobile'] ?? '',
        'cardNumber' => $_POST['cardNumber'] ?? '',
        'expiry' => $_POST['expiry'] ?? '',
        'cvv' => $_POST['cvv'] ?? '',
        'cart' => $_SESSION['cart'] ?? []
    ];

    $_SESSION['order'] = $order;
    $_SESSION['userEmail'] = $_POST['userEmail'] ?? ''; // optional

    $file = __DIR__ . '/orders.json'; // absolute path
    $existingData = [];

    if (file_exists($file)) {
        $existingContent = file_get_contents($file);
        $existingData = json_decode($existingContent, true) ?? [];
    }

    $existingData[] = $order;

    $result = file_put_contents($file, json_encode($existingData, JSON_PRETTY_PRINT));
    if ($result === false) {
        file_put_contents("debug.log", "❌ Failed to write to orders.json\n", FILE_APPEND);
    } else {
        file_put_contents("debug.log", "✅ Order saved to orders.json\n", FILE_APPEND);
    }

    header("Location: OrderConfirmed.php");
    exit();
} else {
    echo "Invalid request method.";
}
