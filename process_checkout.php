<?php
session_start();
require 'connect.php'; // Include database connection

// Check if the user is logged in
if (!isset($_SESSION['username'])) {
    header("Location: login.php");
    exit();
}

$user_name = $_SESSION['username'];
$user_id = $_SESSION['user_id'];

// Sanitize and assign POST data
$full_name = mysqli_real_escape_string($conn, $_POST['fname']);
$email = mysqli_real_escape_string($conn, $_POST['femail']);
$phone = mysqli_real_escape_string($conn, $_POST['fphone']);
$address = mysqli_real_escape_string($conn, $_POST['faddress']);
// current date and time
$date =  date('d-F-Y : H:i a');
$status = 'pending';

if (isset($_SESSION['cart']) && !empty($_SESSION['cart'])) {
    foreach ($_SESSION['cart'] as $product_id => $item) {
        $quantity = $item['quantity'];
          // Fetch the product price from the database
          $result = mysqli_query($conn, "SELECT price FROM products WHERE product_id = $product_id");
          if ($row = mysqli_fetch_assoc($result)) {
              $price = $row['price'];
              $total_price = $price * $quantity;
          }

        // Prepare the SQL statement with placeholders
        $query = "INSERT INTO orders (user_id, user_name, product_id, quantity, full_name, email, phone, address,total_price, date, status) 
                  VALUES (?, ?, ?, ?,?, ?, ?, ?, ?, ?, ?)";
        $stmt = $conn->prepare($query);

        if ($stmt === false) {
            die('Prepare failed: ' . htmlspecialchars($conn->error));
        }

        // Bind parameters to the placeholders
        $stmt->bind_param('ississsssss', $user_id, $user_name, $product_id, $quantity, $full_name, $email, $phone, $address,$total_price, $date, $status);

        // Execute the prepared statement
        if ($stmt->execute()) {
            // Success logic here
            // Get the inserted order_id
            $order_id = $stmt->insert_id;

            // Store order_id in session
            $_SESSION['order_id'] = $order_id;

            // Clear the cart session after placing the order
            unset($_SESSION['cart']);

            // Redirect to thank you or confirmation page
            header("Location: thank_you.php");
            exit();
        } else {
            // Handle error
            echo "Error: " . $stmt->error;
            exit();
        }
    
} }else {
    echo "Your cart is empty.";
}
?>
