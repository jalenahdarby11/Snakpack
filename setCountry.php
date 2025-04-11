<?php
session_start();

// Initialize the cart array if it doesn't exist
if (!isset($_SESSION['cart'])) {
    $_SESSION['cart'] = [];
}

// Check if a country was sent via POST
if (isset($_POST['country'])) {
    $country = $_POST['country'];

    // Add the selected country to the cart array
    $_SESSION['cart'][] = $country;

    // Return a success message (used by JavaScript)
    echo "Added $country to cart.";
} else {
    echo "No country selected.";
}
?>
