
 <?php
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "reminderapp";

            // Create connection
    $conn = new mysqli($servername, $username, $password, $dbname);

            // Check the connection
    if ($mysqli->connect_errno) {
    die("Failed to connect to MySQL: " . $mysqli->connect_error);
}

    // Query to fetch all reminders
    $query = "SELECT * FROM reminders ORDER BY id DESC";
    $result = $mysqli->query($query);

    if ($result->num_rows > 0) {
        // Display reminders
        while ($row = $result->fetch_assoc()) {
            echo "<li class='reminder-item'>";
            echo "<span>" . $row['task'] . "</span>";
            echo "<span>" . $row['datetime'] . "</span>";
            echo "<span class='notes'>" . $row['notes'] . "</span>";
            echo "<button class='btn' onclick='deleteReminder(" . $row['id'] . ")'>Delete</button>";
            echo "</li>";
        }
    } else {
        // No reminders found
        echo "<li class='no-reminders'>No reminders found.</li>";
    }

    // Close the connection
    $mysqli->close();
    ?>