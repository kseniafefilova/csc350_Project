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

// Retrieve all reviews from the database
$stmt = $pdo->query('SELECT * FROM CommentForum ORDER BY date DESC');
$reviews = $stmt->fetchAll(PDO::FETCH_ASSOC);

foreach ($reviews as $review) {
    echo '<article>';
    echo '<h3>' . htmlspecialchars($review['userName'], ENT_QUOTES) . ' <small>(Rating: ' . $review['Stars'] . '/5)</small></h3>';
    echo '<p>' . htmlspecialchars($review['Review'], ENT_QUOTES) . '</p>';
    echo '<small>' . date('F j, Y, g:i a', strtotime($review['date'])) . '</small>';
    echo '</article>';
}
?>
