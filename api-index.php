<?php
header('Content-Type: application/json'); // Set response content type

include_once 'config.php';
include_once 'database/config.php';
include_once 'review-controller.php';

$data = json_decode(file_get_contents('php://input'), true); // Get data from request body

if (isset($data['submit'])) { // Check for submit key in request data
    $db = new DbConnection;
    $review_logic = new ReviewController;

    $review_logic->validation();

    $errors = $review_logic->getErrors();

    if (empty($errors)) {
        $user_id = htmlspecialchars($data['user_id']);
        $product_id = htmlspecialchars($data['product_id']);
        $sanitizedReview = htmlspecialchars($data['review']);

        if ($db->insertReview($user_id, $product_id, $sanitizedReview)) {
            $response = ['message' => 'Review submitted successfully!'];
            echo json_encode($response);
        } else {
            $response = ['error' => 'Error submitting review'];
            echo json_encode($response);
        }
    } else {
        $response = ['errors' => $errors];
        echo json_encode($response);
    }
} else {
    $response = ['error' => 'Invalid request'];
    echo json_encode($response);
}
        
