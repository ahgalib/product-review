<?php
include_once './database/config.php';


class ReviewController {
    public $user_id_error;
    public $product_id_error;
    public $review_error;

    private function userIdError() {
        $user_id = $_POST['user_id'] ?? null; // Handle missing user_id

        if (empty($user_id)) {
            $this->user_id_error = "User Id is required";
        } else if (!preg_match("/^[0-9]*$/", $user_id)) {
            $this->user_id_error = "Only numeric value is allowed for User Id.";
        }
    }

    private function productIdError() {
        $product_id = $_POST['product_id'] ?? null; // Handle missing product_id

        if (empty($product_id)) {
            $this->product_id_error = "Product Id is required";
        } else if (!preg_match("/^[0-9]*$/", $product_id)) {
            $this->product_id_error = "Only numeric value is allowed for Product Id.";
        }
    }

    private function reviewError() {
        $sanitizedReview = htmlspecialchars($_POST['review'] ?? ""); // Handle missing review

        if (empty($sanitizedReview)) {
            $this->review_error = "Review field is required";
        }
    }

    public function validation() {
        if (isset($_POST['submit'])) {
            $this->userIdError();
            $this->productIdError();
            $this->reviewError();
        }
    }

    public function getErrors(): array {
        $errors = [];
        if (!empty($this->user_id_error)) {
            $errors['user_id_error'] = $this->user_id_error;
        }
        if (!empty($this->product_id_error)) {
            $errors['product_id_error'] = $this->product_id_error;
        }
        if (!empty($this->review_error)) {
            $errors['review_error'] = $this->review_error;
        }
        return $errors;
    }
}


    // public function validation() {
    //     if (isset($_POST['submit'])) {
    //         $this->userIdError();
    //         $this->productIdError();
    //         $this->reviewError();
    //     }
    // }


    // if (isset($_POST['submit'])) {
    //     $db = new DbConnection;
    //     $review_logic = new ReviewController;
    //     $review_logic->validation();
    //     if (empty($review_logic->user_id_error) && empty($review_logic->product_id_error) && empty($review_logic->review_error)) {
    //         $user_id = htmlspecialchars($_POST['user_id']);
    //         $product_id = htmlspecialchars($_POST['product_id']);
    //         $sanitizedReview = htmlspecialchars($_POST['review']);
    
    //         if ($db->insertReview($user_id, $product_id, $sanitizedReview)) {
    //             echo "Review submitted successfully!";
    //         } else {
    //             echo "Error submitting review: " . implode("<br>", $db->error); // Display error messages if any
    //         }
    //     } else {
    //         // Display validation errors (already implemented in ReviewController)
    //     }

    // } else {
    //     $review_logic = null; // Initialize to null if not submitted yet
    // }



?>