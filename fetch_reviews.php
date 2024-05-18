<?php
include 'reviewsDB.php';

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
