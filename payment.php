<?php
session_start();

// Check if booking details are available
if (!isset($_SESSION['booking_details'])) {
    echo '<h2>No booking details found in session</h2>';
    echo '<pre>';
    print_r($_SESSION);
    echo '</pre>';
    exit();
}

// Get booking details from session
$booking_details = $_SESSION['booking_details'];

$name = htmlspecialchars($booking_details['name']);
$email = htmlspecialchars($booking_details['email']);
$visit_date = htmlspecialchars($booking_details['visit_date']);
$time_slot = htmlspecialchars($booking_details['timeSlot']);
$num_tickets = htmlspecialchars($booking_details['numTickets']);
$ticket_type = htmlspecialchars ($booking_details['ticket-type']);
$total_price = htmlspecialchars($booking_details['totalPrice']);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Payment Options</title>
</head>
<body>
    <h1>Payment for Zoo Ticket Booking</h1>
    <p>Name: <?php echo $name; ?></p>
    <p>Email: <?php echo $email; ?></p>
    <p>Visit Date: <?php echo $visit_date; ?></p>
    <p>Time Slot: <?php echo $time_slot; ?></p>
    <p>Number of Tickets: <?php echo $num_tickets; ?></p>
    <p>Ticket Type: <?php echo ucfirst($ticket_type); ?></p>
    <p>Total Price: <?php echo $total_price; ?></p>

    <h2>Select Payment Method</h2>
    <form action="process_payment.php" method="POST">
        <input type="radio" name="payment_method" value="Credit Card" required> Credit Card<br>
        <input type="radio" name="payment_method" value="Paypal" required> PayPal<br>
        <button type="submit">Proceed to Payment</button>
    </form>
</body>
</html>