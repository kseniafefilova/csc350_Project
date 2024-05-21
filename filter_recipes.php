<?php

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "csc350";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$carbsRange = $_GET['carbsRange'];
$cookTimeRange = $_GET['cookTimeRange'];
$proteinRange = $_GET['proteinRange'];
$priceRange = $_GET['priceRange'];

$sql = "SELECT * FROM Meals 
        WHERE CarbsCount <= ? 
        AND CookTime <= ? 
        AND ProteinCount <= ? 
        AND MealPrice <= ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("dddd", $carbsRange, $cookTimeRange, $proteinRange, $priceRange);
$stmt->execute();
$result = $stmt->get_result();

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Abhaya+Libre:500&display=swap">
    <link rel="stylesheet" href="filter_recipes.css">
    <link rel="icon" href="favicon.ico" type="image/x-icon">
    <title>Recipes</title>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;700&family=Open+Sans:wght@400;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">
</head>
<body>
<div class="d-flex flex-column min-vh-100">
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <a class="navbar-brand" href="index.html">
            <img src="images/9896be000c772770b2016f581fae0b83.jpg" alt="Logo" class="logoimage">
        </a>
        <a class="navbar-brand" href="index.html">We Ea't</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
            <ul class="navbar-nav">
                <li class="nav-item"><input type="text" class="form-control" placeholder="Search.." style="margin-right: 10px;"></li>
                <li class="nav-item"><a class="nav-link" href="index.html">Home</a></li>
                <li class="nav-item"><a class="nav-link" href="recipes.html">Recipes</a></li>
                <li class="nav-item"><a class="nav-link" href="register.html">Register</a></li>
                <li class="nav-item"><a class="nav-link" href="login.html">Login</a></li>
                <li class="nav-item"><a class="nav-link" href="about.html">About</a></li>
                <li class="nav-item"><a class="nav-link" href="contact.html">Contact</a></li>
                <li class="nav-item"><a class="nav-link" href="reviews.html">Review</a></li>
            </ul>
        </div>
    </nav>

    <main>
        <section class="recipe-list">
            <?php
            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    echo "<article class='recipe-item'>";
                    echo "<h3>" . $row["MealName"] . "</h3>";
                    echo "<img src='" . $row["MealImage"] . "' alt='" . $row["MealName"] . "' class='meal-image'>";
                    echo "<p class='description'>" . $row["MealDescription"] . "</p>";
                    echo "<div class='recipe-info'>";
                    echo "<div><img src='icons/protein.jpeg' alt='Protein icon'><span>" . $row["ProteinCount"] . "g Protein</span></div>";
                    echo "<div><img src='icons/carbs.jpeg' alt='Carbs icon'><span>" . $row["CarbsCount"] . "g Carbs</span></div>";
                    echo "<div><img src='icons/calories.jpeg' alt='Calories icon'><span>" . $row["CaloriesCount"] . "kcal</span></div>";
                    echo "<div><img src='icons/time.png' alt='Cook time icon'><span>" . $row["CookTime"] . " mins</span></div>";
                    echo "<div><img src='icons/price.jpeg' alt='Price icon'><span>$" . $row["MealPrice"] . "</span></div>";
                    echo "</div>";
                    echo "<a href='" . $row["MealRecipe"] . "' target='_blank'>View Recipe</a>";
                    echo "</article>";
                }
            } else {
                echo "<p>No recipes found matching your criteria.</p>";
            }
            $stmt->close();
            $conn->close();
            ?>
        </section>
    </main>

    <footer class="text-center py-4 mt-auto">
        <div class="container">
            <!-- Single column to center everything -->
            <div class="row justify-content-center">
                <div class="col-md-12">
                    <!-- Footer content -->
                    <h3>Follow Us</h3>
                    <ul class="list-inline">
                        <!-- Social media icons -->
                        <li class="list-inline-item"><i class="fab fa-facebook"></i></li>
                        <li class="list-inline-item"><i class="fab fa-twitter"></i></li>
                        <li class="list-inline-item"><i class="fab fa-instagram"></i></li>
                        <li class="list-inline-item"><i class="fab fa-linkedin"></i></li>
                        <li class="list-inline-item"><i class="fab fa-youtube"></i></li>
                    </ul>
                    <div class="list-unstyled">
                        <!-- Footer links -->
                        <a href="about.html">About Us</a> |
                        <a href="contact.html">Contact Us</a> |
                        <a href="#">Privacy Policy</a>
                    </div>
                    <!-- Copyright information -->
                    <br/>
                    <p class="list-unstyled">&copy; 2024 WeEa't. All rights reserved.</p>
                </div>
            </div>
        </div>
    </footer>
</div>

<!-- Bootstrap and jQuery -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.7.0/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
