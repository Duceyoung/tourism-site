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
                <div class="success-message">
                    <img src="success-icon.png" alt="Success">
                    <p>Thank you for booking your visit to The City Zoo. Your payment has been processed successfully.</p>
                </div>
                
                <div class="booking-details">
                    <h3>Booking Details:</h3>
                    <ul>
                        <li><strong>Name:</strong> <?php echo htmlspecialchars($booking['name']); ?></li>
                        <li><strong>Email:</strong> <?php echo htmlspecialchars($booking['email']); ?></li>
                        <li><strong>Visit Date:</strong> <?php echo htmlspecialchars($booking['visitDate']); ?></li>
                        <li><strong>Time Slot:</strong> <?php echo htmlspecialchars($booking['timeSlot']); ?></li>
                        <li><strong>Number of Tickets:</strong> <?php echo htmlspecialchars($booking['numTickets']); ?></li>
                        <li><strong>Ticket Type:</strong> <?php echo htmlspecialchars(ucfirst($booking['ticketType'])); ?></li>
                        <li><strong>Total Amount Paid:</strong> $<?php echo htmlspecialchars($booking['totalPrice']); ?></li>
                    </ul>
                </div>

                <div class="next-steps">
                    <h3>What's Next?</h3>
                    <p>A confirmation email has been sent to your registered email address.</p>
                    <p>Please bring a printed copy or show the digital confirmation on your phone when you visit.</p>
                    <a href="index.html" class="button">Return to Homepage</a>
                </div>
            </div>
        </section>
    </main>

    <footer>
        <div class="container">
            <p>&copy; 2024 The City Zoo. All rights reserved.</p>
            <div class="social-icons">
                <a href="#"><img src="facebook-icon.png" alt="Facebook"></a>
                <a href="#"><img src="twitter-icon.png" alt="Twitter"></a>
                <a href="#"><img src="instagram-icon.png" alt="Instagram"></a>
            </div>
        </div>
    </footer>
</body>
</html>
<?php
// Clear the session data after displaying
unset($_SESSION['booking']);
?>
