<?php

    $username = $_POST['username'];
    $email = $_POST['email'];
    $password1 = $_POST['password1'];

    # Connection to Database

    $conn = new mysqli('localhost', 'root','', 'reminderapp');
    if($conn->connect_error){
        die("Connection Failed: " . $conn->connect_error);
    } else {
        $stmt = $conn->prepare("INSERT INTO users (username, email, password) VALUES (?, ?, ?)");
        $stmt->bind_param("sss", $username, $email, $password1);
        $execval = $stmt->execute();
        if($execval) {
            echo "Registration successful!";
        } else {
            echo "Error: " . $stmt->error;
        }
        $stmt->close();
        $conn->close();

        header("Location: index.php"); // Redirect to the login page
        exit(); // Stop further execution
    }
?>