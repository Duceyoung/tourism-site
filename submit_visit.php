<?php
// Database connection
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "visit_zoo";

$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Handle form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $conn->real_escape_string($_POST['name']);
    $email = $conn->real_escape_string($_POST['email']);
    $date = $conn->real_escape_string($_POST['date']);
    $time = $conn->real_escape_string($_POST['time']);

    // Insert data into the table
    $sql = "INSERT INTO visit_bookings (name, email, visit_date, visit_time) VALUES ('$name', '$email', '$date', '$time')";

    if ($conn->query($sql) === TRUE) {
        echo "Booking successful! You will receive an email confirmation shortly.";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

$conn->close();
?>
