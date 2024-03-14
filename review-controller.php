<?php
include_once './database/config.php';


class ReviewController {
    public function validateReview($data) {
        $errors = [];
        if (!isset($data['user_id']) || !is_numeric($data['user_id'])) {
            $errors['user_id'] = 'User Id is required and must be numeric';
        }
        if (!isset($data['product_id']) || !is_numeric($data['product_id'])) {
            $errors['product_id'] = 'Product Id is required and must be numeric';
        }
        if (!isset($data['review']) || empty($data['review'])) {
            $errors['review'] = 'Review is required';
        }
        return $errors;
    }
}



?>