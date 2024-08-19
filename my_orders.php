<?php
session_start();
ob_start();
include('connect.php');

// Check if the user is logged in
// if (!isset($_SESSION['username']) || empty($_SESSION['username'])) {
//     header('Location: login.php');
//     exit;
// }

include('header.php');

// Retrieve username from session
@$username = $_SESSION['username'];

// Fetch orders data for the logged-in user
$sql = "SELECT orders.*, products.product_name,products.price,products.thumbnail
        FROM orders 
        INNER JOIN products ON orders.product_id = products.product_id 
        WHERE orders.user_name = ? 
        ORDER BY orders.date DESC";

$stmt = $conn->prepare($sql);
if ($stmt === false) {
    die('Prepare failed: ' . htmlspecialchars($conn->error));
}

$stmt->bind_param('s', $username);

if (!$stmt->execute()) {
    die('Execute failed: ' . htmlspecialchars($stmt->error));
}

$result = $stmt->get_result();
if ($result === false) {
    die('Get result failed: ' . htmlspecialchars($stmt->error));
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Orders</title>
   <?php include('boots_icon.php')?>
    <style>
        body {
            background-color: #f4f4f4;
            color: #333;
        }
        .container {
            margin-top: 20px;
        }
        .card {
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }
        .card-header {
            background-color: #4CAF50;
            color: white;
            border-bottom: 1px solid #ddd;
            font-size: 1.25rem;
        }
        .table th, .table td {
            vertical-align: middle;
        }
        .table thead th {
            background-color: #f9f9f9;
        }
        .status {
            font-weight: bold;
        }
        .btn-view {
            background-color: #4CAF50;
            color: white;
        }
        .btn-view:hover {
            background-color: #45a049;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="card">
            <div class="card-header">
                My Orders
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-hover table-bordered">
                        <thead>
                            <tr>
                                <th scope="col">Order ID</th>
                                <th scope="col">Product Name</th>
                                <th scope="col">Image</th>
                                <th scope="col">Quantity</th>
                                <th scope="col">Price</th>
                                <th scope="col">Address</th>
                                <th scope="col">Order Date</th>
                                <th scope="col">Status</th>
                                <!-- <th scope="col">Details</th> -->
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            if ($result->num_rows > 0) {
                                while ($row = $result->fetch_assoc()) {
                                  echo "<tr>
                                  <td>{$row['order_id']}</td>
                                  <td>{$row['product_name']}</td>
                                  <td><img src='admin/{$row['thumbnail']}' alt='Product Image' height='70px' width='70px'></td>
                                  <td>{$row['quantity']}</td>
                                  <td>₹{$row['total_price']}</td>
                                  <td>{$row['address']}</td>
                                  <td>{$row['date']}</td>
                                  <td class='status'>{$row['status']}</td>
                                  
                              </tr>";
                                }}                          
                            ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

  
    <?php include('js/boot_script.php')?>;
</body>
</html>
