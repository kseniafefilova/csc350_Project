<?php

// Database connection details
$DATABASE_HOST = 'localhost';
$DATABASE_USER = 'root';
$DATABASE_PASS = '';
$DATABASE_NAME = 'csc350';

try {
    $pdo = new PDO('mysql:host=' . $DATABASE_HOST . ';dbname=' . $DATABASE_NAME . ';charset=utf8', $DATABASE_USER, $DATABASE_PASS);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $exception) {
    exit('Failed to connect to database: ' . $exception->getMessage());
}

// Process form submission
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name = $_POST['name'];
    $review = $_POST['review'];
    $stars = $_POST['rating'];

    if (!empty($name) && !empty($review) && !empty($stars)) {
        $stmt = $pdo->prepare('INSERT INTO CommentForum (userName, Stars, Review, date) VALUES (?, ?, ?, ?)');
        if ($stmt->execute([$name, $stars, $review, date('Y-m-d H:i:s')])) {
            echo "Thank you for your review!";
        } else {
            echo "Failed to submit review.";
        }
    } else {
        echo "Please fill in all fields.";
    }
}
?>
