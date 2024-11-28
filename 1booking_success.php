<?php
session_start();

// Check if booking exists in session
if (!isset($_SESSION['booking'])) {
    header("Location: book.html");
    exit();
}

$booking = $_SESSION['booking'];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Booking Successful - The City Zoo</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <header>
        <div class="container">
            <h1>The City Zoo</h1>
            <nav>
                <ul>
                    <li><a href="index.html">Home</a></li>
                    <li><a href="animals.html">Animals</a></li>
                    <li><a href="visit_us.html">Visit Us</a></li>
                    <li><a href="membership.html">Membership</a></li>
                    <li><a href="book.html">Book tickets</a></li>
                    <li><a href="contact-us.html">Contact Us</a></li>
                </ul>
            </nav>
        </div>
    </header>
    
    <main>
        <section class="booking-success">
            <div class="container">
                <h2>Booking Successful!</h2>
                <p>Thank you for booking your visit to The City Zoo. Here are your booking details:</p>
                <ul>
                    <li><strong>Name:</strong> <?php echo htmlspecialchars($booking['name']); ?></li>
                    <li><strong>Email:</strong> <?php echo htmlspecialchars($booking['email']); ?></li>
                    <li><strong>Visit Date:</strong> <?php echo htmlspecialchars($booking['visitDate']); ?></li>
                    <li><strong>Time Slot:</strong> <?php echo htmlspecialchars($booking['timeSlot']); ?></li>
                    <li><strong>Number of Tickets:</strong> <?php echo htmlspecialchars($booking['numTickets']); ?></li>
                    <li><strong>Ticket Type:</strong> <?php echo htmlspecialchars(ucfirst($booking['ticketType'])); ?></li>
                    <li><strong>Total Price:</strong> $<?php echo htmlspecialchars($booking['totalPrice']); ?></li>
                </ul>
                <p>A confirmation email has been sent to your email address. We look forward to seeing you at the zoo!</p>
                <a href="index.html" class="button">Return to Homepage</a>
            </div>
        </section>
    </main>

    <footer>
        <div class="container">
            <p>&copy; 2024 The City Zoo. All rights reserved.</p>
        </div>
    </footer>
</body>
</html>

<?php
// Clear the booking from the session
unset($_SESSION['booking']);
?>