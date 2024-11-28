<?php
session_start();

error_reporting(E_ALL);
ini_set('display_errors', 1);

// Get the form data
$name = $_POST['name'] ?? null;
$email = $_POST['email'] ?? null;
$visit_date = $_POST['visit_date'] ?? null;
$time_slot = $_POST['timeSlot'] ?? null;
$num_tickets = $_POST['numTickets'] ?? null;
$ticket_type = $_POST['ticket-type'] ?? null;

// Validate required data
if (!$name || !$email ||!$visit_date || !$time_slot !$num_tickets || !$ticket_type) {
    die("Missing required fields.");
}

// Redirect to the payment page
header("Location: payment,php");
exit();

// Calculate the total price based on ticket type and number of tickets
$price = 0;
if($ticket_type == 'adult') {
    $price = 20;
} elseif ($ticket_type == 'child') {
    $price = 10;
} elseif ($ticket_type == 'Senior') {
    $price = 15;
}

$total_price = $price * $num_tickets;

// Store the booking details in the session or database if necessary
$_SESSION['booking_details'] = [
    'name' => $name,
    'email' => $email,
    'visit_date' => $visit_date,
    'timeSlot' => $time_slot,
    'numTickets' => $num_tickets,
    'ticket-type' => $ticket_type,
    'totalPrice' => $total_price
];

// Debug: Print session data to verify
echo '<h2>POST Data</h2>';
echo '<pre>';
print_r($_POST);
echo '</pre>';

echo '<h2>Session Data Before Redirect</h2>';
echo '<pre>';
print_r($_SESSION['booking_details']);
echo '</pre>';
exit();

// Redirect to the payment options page
header("Location: payment.php");
exit();
?>