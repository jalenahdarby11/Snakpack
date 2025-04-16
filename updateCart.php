<?php
session_start();

$country = $_POST['country'] ?? null;
$action = $_POST['action'] ?? null;

if (!$country || !$action) {
    header("Location: OrderConfirmation.php");
    exit();
}

if (!isset($_SESSION['cart'])) {
    $_SESSION['cart'] = [];
}

if ($action === 'add') {
    $_SESSION['cart'][] = $country;
} elseif ($action === 'remove') {
    $index = array_search($country, $_SESSION['cart']);
    if ($index !== false) {
        unset($_SESSION['cart'][$index]);
        $_SESSION['cart'] = array_values($_SESSION['cart']); // Reindex array
    }
}

// After updating, redirect back to the OrderConfirmation page
header("Location: OrderConfirmation.php#order-summary");
exit();
?>
