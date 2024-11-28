<?php
session_start();

// Validate and sanitize input
$name = filter_input(INPUT_POST, 'name', FILTER_SANITIZE_STRING);
$email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);
$visitDate = filter_input(INPUT_POST, 'visitDate', FILTER_SANITIZE_STRING);
$timeSlot = filter_input(INPUT_POST, 'timeSlot', FILTER_SANITIZE_STRING);
$numTickets = filter_input(INPUT_POST, 'numTickets', FILTER_VALIDATE_INT);
$ticketType = filter_input(INPUT_POST, 'ticketType', FILTER_SANITIZE_STRING);
$totalPrice = filter_input(INPUT_POST, 'totalPrice', FILTER_VALIDATE_FLOAT);

// Validate required fields
if (!$name || !$email || !$visitDate || !$timeSlot || !$numTickets || !$ticketType || !$totalPrice) {
    die("Missing required fields.");
}

// Here you would typically save the booking to your database
// For this example, we'll just store it in the session
$_SESSION['booking'] = [
    'name' => $name,
    'email' => $email,
    'visitDate' => $visitDate,
    'timeSlot' => $timeSlot,
    'numTickets' => $numTickets,
    'ticketType' => $ticketType,
    'totalPrice' => $totalPrice
];

// Redirect to the success page
header("Location: booking_success.php");
exit();
?>