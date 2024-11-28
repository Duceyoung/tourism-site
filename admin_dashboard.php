<?php
session_start();
if(!isset($_SESSION['admin_logged_in']) || $_SESSION['admin_logged_in'] !== true) {
    header("Location: admin_login.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Admin Login</title>
        <link rel="stylesheet" href="styles.css">
    </head>
    <body>
        <header>
            <h1>Admin Dashboard</h1>
            <nav>
                <ul>
                    <li><a href="#overview">Overview</a></li>
                    <li><a href="#bookings">Bookings</a></li>
                    <li><a href="#pricing">Ticket Pricing</a></li>
                    <li><a href="#reports">Reports</a></li>
                    <li><a href="#settings">Settings</a></li>
                    <li><a href="logout.php">Logout</a></li>
                </ul>
            </nav>
        </header>

        <section id="overview">
            <h2>Dashboard Overview</h2>
            <p>Total Tickets Sold: ...</p>
            <p>Total Revenue:...</p>
            <p>Daily Visitors:...</p>
        </section>

        <section id="bookings">
            <h2>Manage Bookings</h2>
            <table>
                <tr>
                    <th>Visitor Name</th>
                    <th>Email</th>
                    <th>Date</th>
                    <th>Ticket Type</th>
                    <th>Number of Tickets</th>
                    <th>Actions</th>
                </tr>
                 <!-- PHP code to fetch and display booking data here -->
            </table>
        </section>

        <section id="pricing">
            <h2>Manage Ticket Pricing</h2>
            <form action="update_pricing.php" method="POST">
                <label>Adult Ticket Price: $<input type="number" name="adult_price" required></label>
                <label>Adult Ticket Price: $<input type="number" name="child_price" required></label>
                <label>Adult Ticket Price: $<input type="number" name="senior_price" required></label>
                <button type="submit">Update Prices</button>
            </form>
        </section>

        <section id="reports">
            <h2>Reports & Analytics</h2>
            <button onclick="generateReport('sales')">Generate Sales Report</button>
            <button onclick="generatorReport('visitors')">Generate Visitor Report</button>
        </section>

        <section id="settings">
            <h2>System settings</h2>
            <p>Configure system preferences here</p>
        </section>

        <script>
            function generateReport(type){
                alert("Generating" + type + "report...");
                // Additional code for generating reports
            }
        </script>
    </body>
</html>