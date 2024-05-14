<?php
$servername = "localhost";
$username = "floflo";
$password = "";
$dbname = "CIS385";


$conn = new mysqli($servername, $username, $password, $dbname);

session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST["email"];
    $pass = $_POST["pwd"];


    if ($stmt = $conn->prepare("SELECT password FROM faculty WHERE email = ?")) {
        $stmt->bind_param("s", $email);
        $stmt->execute();
        $stmt->store_result();

        if ($stmt->num_rows == 1) {
            $stmt->bind_result($password_from_db);
            $stmt->fetch();


            if ($pass == $password_from_db) {

                $_SESSION["loggedin"] = true;
                $_SESSION["email"] = $email;

                // Redirect to a new page
                header("Location: index.html");
                exit();
            } else {
                echo "Invalid email or password.";
                header("Location: index.html");
            }
        } else {
            echo "Invalid email or password.";
            header("Location: index.html");
        }

        $stmt->close();
    } else {
        echo "Error: " . $conn->error;
    }

    $conn->close();
}
?>
<br>
<a href="login.html">Press this to go back</a>

