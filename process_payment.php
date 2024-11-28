<?php
session_start();

//Check if booking details are available
if (!isset($_SESSION['booking_details'])) {
    echo '<h2>No booking details found</h2>';
    exit();
}

// Get patment method
$payment_method = $_POST['payment_method'] ?? null;

if (!$payment_method) {
    echo '<h2>Please select a payment method.</h2>';
    exit();
}

// Process payment (mock example)
echo "<h1>Payment Successful</h1>";
echo "<p>Thank you, {$name}, for booking your tickets at the City Zoo!</p>";

// Clear session after payment
unset($_SESSION['booking_details']);

// Redirect to a confirmation page (optional)
header("Location: confirmation.php");
exit();
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device=width, initial-scale=1.0">
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

            <input type="radio" name="payment_method" value="Paypal" required> Paypal<br>

            <button type="submit">Proceed to Payment</button>
        </form>
    </body>
</html>