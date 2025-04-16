<?php
session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Get form fields
    $order = [
        'firstName' => $_POST['firstName'] ?? '',
        'lastName' => $_POST['lastName'] ?? '',
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

    // Save to orders.json
    $file = 'orders.json';
    $existingData = [];

    if (file_exists($file)) {
        $existingContent = file_get_contents($file);
        $existingData = json_decode($existingContent, true) ?? [];
    }

    $existingData[] = $order;

    file_put_contents($file, json_encode($existingData, JSON_PRETTY_PRINT));

    // Also store in session for OrderConfirmed.php display
    $_SESSION['order'] = $order;

    // Redirect
    header("Location: OrderConfirmed.php");
    exit();
} else {
    echo "Invalid request method.";
}
?>
