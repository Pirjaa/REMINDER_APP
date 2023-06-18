<?php
session_start();

// Database connection details
$servername = "localhost";
$username = "root";
$password ="";
$dbname = "reminderapp";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Handle form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST["username"];
    $password = $_POST["password"];

    // SQL query to check if the username and password match
    $sql = "SELECT * FROM users WHERE username = '$username' AND password = '$password'";
    $result = $conn->query($sql);

    if ($result->num_rows == 1) {
        // Username and password match, redirect to the dashboard or another page
        $_SESSION["username"] = $username;
        header("Location: home.html");
        exit();
    } else {
        // Invalid username or password
        $error = "Invalid username or password";
    }
}

$conn->close();
?>

<!DOCTYPE html>
<link rel="stylesheet" type="text/css" href="login.css">
<html>
<head>
    <title>Login Form</title>
</head>
<body>
<div class="login-form">
    <img src="assets/Reminder logo.png" alt="Logo" class="logo">
    <h2 class="login-title">Login</h2>
    <?php if (isset($error)) { echo "<p>$error</p>"; } ?>
    <form method="POST" action="index.php">
    <div class="form-group">
        <label for="username">Username</label>
        <input type="text" id="username" name="username" required>
      </div>
      <div class="form-group">
        <label for="password">Password</label>
            <input type="password" id="password" name="password" required>
        </div>
        <input type="submit">
    </form>
      <p class="signup-link">Don't have an account? <a href="signup.html">Sign up</a></p>
    </div>
    </form>
</body>
</html>
