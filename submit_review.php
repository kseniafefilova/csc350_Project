<?php
include 'reviewsDB.php';

$review_message = "";

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name = $_POST['name'];
    $review = $_POST['review'];
    $stars = $_POST['rating'];

    if (!empty($name) && !empty($review) && !empty($stars)) {
        $stmt = $pdo->prepare('INSERT INTO CommentForum (userName, Stars, Review, date) VALUES (?, ?, ?, ?)');
        if ($stmt->execute([$name, $stars, $review, date('Y-m-d H:i:s')])) {
            $review_message = "Thank you for your review!";
        } else {
            $review_message = "Failed to submit review.";
        }
    } else {
        $review_message = "Please fill in all fields.";
    }
    echo htmlspecialchars($review_message, ENT_QUOTES);
}
?>
