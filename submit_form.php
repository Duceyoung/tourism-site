<?php
// Database connection settings
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "zoo_ticketing";

// Create connection
$conn = new mysqli(hostname: $servername, username: $username, password: $password, database: $dbname);

// Check connection
if ($conn->connect_error) {
    error_log(message: "Connection failed: " . $conn->connect_error, message_type: 3, destination: "errors.log");
    echo "Unable to connect to the database. Please try again later.";
    exit;
}

// Process form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = trim(string: $_POST['name']);
    $email = trim(string: $_POST['email']);
    $subject = trim(string: $_POST['subject']);
    $message = trim(string: $_POST['message']);

    // Validate inputs
    if (empty($name) || empty($email) || empty($subject) || empty($message)) {
        echo "All fields are required!";
        exit;
    }

    if (!filter_var(value: $email, filter: FILTER_VALIDATE_EMAIL)) {
        echo "Invalid email format!";
        exit;
    }

    // Use prepared statements to prevent SQL injection
    $stmt = $conn->prepare(query: "INSERT INTO contact_messages (name, email, subject, message) VALUES (?, ?, ?, ?)");
    if (!$stmt) {
        error_log(message: "Prepare failed: " . $conn->error, message_type: 3, destination: "errors.log");
        echo "We encountered an issue. Please try again later.";
        exit;
    }

    $stmt->bind_param("ssss", $name, $email, $subject, $message);

    if ($stmt->execute()) {
        echo "Your message has been sent successfully!";
    } else {
        error_log("Execute failed: " . $stmt->error, message_type: 3, destination: "errors.log");
        echo "We encountered an issue. Please try again later.";
    }

    $stmt->close();
}

$conn->close();
?>
