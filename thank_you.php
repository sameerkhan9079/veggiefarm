<?php
session_start();
$order_id = $_SESSION['order_id'] ?? null;


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Thank You for Shopping!</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        body {
            background-color: #f5f5f5;
            color: #333;
            font-family: 'Arial', sans-serif;
        }

        .thank-you-container {
            background: #ffffff;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            padding: 40px;
        }

        .thank-you-container h1 {
            color: #4CAF50;
            font-weight: bold;
        }

        .thank-you-container .checkmark {
            margin: 20px auto;
            width: 100px;
            height: 100px;
        }

        .thank-you-container svg {
            stroke-width: 2;
            stroke: #4CAF50;
        }

        .thank-you-container p {
            font-size: 1.2em;
        }

        .btn-primary {
            background-color: #4CAF50;
            border-color: #4CAF50;
        }

        .btn-primary:hover {
            background-color: #45a049;
            border-color: #45a049;
        }

        @media (max-width: 768px) {
            .thank-you-container {
                padding: 20px;
            }

            .thank-you-container h1 {
                font-size: 1.5em;
            }

            .thank-you-container p {
                font-size: 1em;
            }
        }
    </style>
</head>
<body>
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-8 text-center thank-you-container">
                <h1 class="display-4">Thank You for Your Purchase!</h1>
                <p class="lead">We appreciate your business and hope to serve you again soon.</p>
                <div class="checkmark">
                    <svg xmlns="http://www.w3.org/2000/svg" width="100" height="100" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-check-circle">
                        <circle cx="12" cy="12" r="10"></circle>
                        <path d="M9 12l2 2 4-4"></path>
                    </svg>
                </div>
                <p class="mt-4">Your order ID is: <strong><?php 
                if ($order_id) {
                  echo  htmlspecialchars($order_id);
              } else {
                  echo "No order found.";
              }
                ?></strong></p>
                <a href="index.php" class="btn btn-primary mt-3">Back to Home</a>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
