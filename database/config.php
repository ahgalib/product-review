<?php
class DbConnection {

    private const DB_HOST = 'localhost';
    private const DB_USER = 'root';
    private const DB_PASS = ''; 
    private const DB_NAME = 'product_review';

    public $error = [];
    private $mysqli;

    public function __construct() {
        try {
            $this->mysqli = new mysqli(self::DB_HOST, self::DB_USER, self::DB_PASS, self::DB_NAME);

            if ($this->mysqli->connect_error) {
                throw new Exception("Connection failed: " . $this->mysqli->connect_error);
            }
        } catch (Exception $e) {
            echo "Database connection error: " . $e->getMessage();
        }
    }

    public function insertReview($user_id, $product_id, $sanitizedReview){
        $stmt = $this->mysqli->prepare("INSERT INTO reviews (user_id, product_id, review) VALUES (?, ?, ?)");
        $stmt->bind_param('sss', $user_id, $product_id, $sanitizedReview);
      
        if ($stmt->execute()) {
            return true;
        } else {
            $this->error[] = "Error inserting review: " . $stmt->error;
            return false;
        }

    }

}