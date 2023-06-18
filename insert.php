<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "reminderapp";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Insert new reminder into the database
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $task = $_POST["task"];
    $datetime = $_POST["datetime"];
    $notes = $_POST["notes"];

    $sql = "INSERT INTO reminders (task, datetime, notes) VALUES ('$task', '$datetime', '$notes')";

    if ($conn->query($sql) === true) {
        echo "Reminder added successfully.";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

// Close the connection
$conn->close();
?>
