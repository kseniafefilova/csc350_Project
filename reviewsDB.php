<?php
// Database connection details
$DATABASE_HOST = 'localhost';
$DATABASE_USER = 'root';
$DATABASE_PASS = '';
$DATABASE_NAME = 'Foodrecipes';

try {
    $pdo = new PDO('mysql:host=' . $DATABASE_HOST . ';dbname=' . $DATABASE_NAME . ';charset=utf8', $DATABASE_USER, $DATABASE_PASS);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $exception) {
    exit('Failed to connect to database!');
}

// Retrieve all reviews from the database
$stmt = $pdo->query('SELECT * FROM CommentForum ORDER BY date DESC');
$reviews = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>
