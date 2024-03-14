<?php
// Set response content type
header('Content-Type: application/json'); 

include_once 'database/config.php';
include_once 'review-controller.php';

// Get data from request body
$data = json_decode(file_get_contents('php://input'), true);

    $db = new DbConnection;
    $reviewController = new ReviewController;
    $errors = $reviewController->validateReview($data);
    if (empty($errors)) {
        $user_id = $data['user_id'];
        $product_id = $data['product_id'];
        $review = htmlspecialchars($data['review']);
        if ($db->insertReview($user_id, $product_id, $review)) {
            echo json_encode(['message' => 'Review submitted successfully']);
        } else {
            echo json_encode(['error' => 'Error submitting review']);
        }
    } else {
        echo json_encode(['errors' => $errors]);
    }

        
