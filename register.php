<?php

error_reporting(E_ALL);
ini_set('display_errors', 1);

$servername = "localhost";
$username = "floflo";
$password = "";
$dbname = "CSC350";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = htmlspecialchars($_POST["email"]);
    $pass = htmlspecialchars($_POST["pwd"]);
    $fname = htmlspecialchars($_POST["firstname"]);

    // Check if inputs are not empty
    if (empty($email) || empty($pass) || empty($fname)) {
        die("Please fill all fields.");
    }

    // Prepare the SQL statement
    if ($stmt = $conn->prepare("INSERT INTO Admin (FirstName, Email, Password) VALUES (?, ?, ?)")) {
        $stmt->bind_param("sss", $fname, $email, $pass);

        if ($stmt->execute()) {
            echo "Registration successful.";
        } else {
            echo "Execute failed: " . $stmt->error;
        }

        // Close the statement
        $stmt->close();
    } else {
        echo "Prepare failed: " . $conn->error;
    }

    // Close the connection
    $conn->close();
} else {
    echo "Invalid request method.";
}
?>
<br>
<a href="register.html">Press this to go back</a>

