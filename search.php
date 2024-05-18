<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

$servername = "localhost";
$username = "halil";
$password = "database123"; // Make sure this is correctly set
$dbname = "csc350";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <link href="main.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Abhaya+Libre:500&display=swap">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>WeEa't - Search Results</title>
</head>
<body>
    <header>
        <h1>Welcome to <span class="we-eat">WeEa't</span></h1>
        <h2>Affordable & Healthy Food for Students</h2>
        <nav>
            <ul>
                <li><a href="index.html">Home</a></li>
                <li><a href="recipes.html">Recipes</a></li>
                <li><a href="about.html">About</a></li>
            </ul>
        </nav>
    </header>

    <main>
        <?php
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $budget = $_POST["budget"];
            $calories = $_POST["calories"];

            // Split budget and calories into min and max values
            list($budget_min, $budget_max) = explode("-", $budget);
            list($calories_min, $calories_max) = explode("-", $calories);

            // Prepare and execute the SQL query
            $stmt = $conn->prepare("SELECT MealName, MealPrice, CaloriesCount, MealDescription, MealImage, MealRecipe FROM Meals WHERE MealPrice BETWEEN ? AND ? AND CaloriesCount BETWEEN ? AND ?");
            $stmt->bind_param("dddd", $budget_min, $budget_max, $calories_min, $calories_max);
            $stmt->execute();
            $result = $stmt->get_result();

            // Display the results
            if ($result->num_rows > 0) {
                echo "<h1>Search Results:</h1>";
                echo "<div class='results-container'>";
                while ($row = $result->fetch_assoc()) {
                    echo "<div class='meal'>";
                    echo "<img src='" . $row["MealImage"] . "' alt='" . $row["MealName"] . "'>";
                    echo "<h2>" . $row["MealName"] . "</h2>";
                    echo "<p>" . $row["MealDescription"] . "</p>";
                    echo "<p>Price: $" . $row["MealPrice"] . "</p>";
                    echo "<p>Calories: " . $row["CaloriesCount"] . " kcal</p>";
                    echo "<a href='" . $row["MealRecipe"] . "' target='_blank'>View Recipe</a>";
                    echo "</div>";
                }
                echo "</div>";
            } else {
                echo "<p>No meals found within the selected range.</p>";
            }

            $stmt->close();
        }

        $conn->close();
        ?>
    </main>

    <footer>
        <p>&copy; 2024 WeEa't</p>
    </footer>
</body>
</html>
