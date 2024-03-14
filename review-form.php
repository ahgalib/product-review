<?php 
// include_once('./review-controller.php');
// if (isset($_POST['submit'])) {
//     $review_logic = new ReviewController;
//     $review_logic->validation();
// } else {
//     $review_logic = null; // Initialize to null if not submitted yet
// }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<form action="review-controller.php" method="post">
        <label for="">User Id</label>
        <input type="text" name="user_id" >
        <label for="">Product Id</label>
        <input type="text" name="product_id">
        <label for="">Review</label>
        <input type="text" name="review" >
        

        <input type="submit" name="submit">
</form>
</body>
</html>