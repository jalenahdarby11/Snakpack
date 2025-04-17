<?php
session_start();

$cart = $_SESSION['cart'] ?? [];

$counts = array_count_values($cart);

// Send it as JSON
header('Content-Type: application/json');
echo json_encode($counts);
