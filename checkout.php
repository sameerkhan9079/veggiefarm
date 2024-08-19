<?php
session_start();
ob_start();//add this code for removing header already sent error
include('connect.php');
include('header.php');
include('css/style.php');

// Check if the user is logged in
if (!isset($_SESSION['username'])) {
    header("Location: login.php");
    exit();
}



$subTotal = 0;
$deliveryCharges = 40;
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Checkout</title>
    <style>
         .cart-title {
            font-family: 'Arial', sans-serif;
            font-size: 1.8rem;
            font-weight: bold;
            color: #343a40;
            letter-spacing: 1px;
            text-transform: uppercase;
            border-bottom: 2px solid #007bff;
            display: inline-block;
        }
        .checkout-container {
          display:flex;
            width: 95%;
            margin: auto;
            margin-top: 30px;
            margin-bottom: 50px;
            background-color: #f8f9fa;
            padding: 20px;
            border:2px solid groove;
           
        }
        .checkout-title {
            font-size: 2rem;
            margin-bottom: 20px;
        }
        .cart-item {
            display: flex;
            align-items: center;
            margin-bottom: 20px;
            padding-bottom: 10px;
            border-bottom: 1px solid #ddd;
        }
        .cart-item img {
            width: 100px;
            height: 100px;
            object-fit: cover;
            margin-right: 20px;
        }
        .cart-item-details {
            flex-grow: 1;
        }
        .cart-item-details h5 {
            margin: 0;
            font-size: 1.2rem;
        }
        .cart-item-details .price {
            color: #888;
            margin-top: 5px;
        }
       
        .form-group {
            margin-bottom: 15px;
        }
        .form-group label {
            display: block;
            margin-bottom: 5px;
        }
        .form-group input, .form-group textarea {
            width: 100%;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }
        .form-group textarea {
            resize: none;
        }
        #place-order{
           background:#7cc000;
           text-transform:uppercase;
           position: relative;
    z-index: 1;
    -webkit-transition: all 0.3s ease;
    transition: all 0.3s ease;
    border:none;
    overflow:hidden;
        }
        
#custom_btn {
  color: #fff;
  background: #7cc000;
  letter-spacing: 2px;
  padding: 10px 20px 11px;
  border: none;
  overflow: hidden;
  position: relative;
  z-index: 1;
  -webkit-transition: all 0.3s ease;
  transition: all 0.3s ease;
}

button#custom_btn.bg_default_red {}
#custom_btn:hover {
  color: #000 !important;
  background: #ffffff;
}
#custom_btn:hover:before {
  width: 100%;
  -webkit-transition: 800ms ease all;
  transition: 800ms ease all;
}
#custom_btn:hover:after {
  width: 100%;
  -webkit-transition: 800ms ease all;
  transition: 800ms ease all;
}
#custom_btn:hover .btn {
  color: #000 !important;
}
#custom_btn:hover i {
  -webkit-transform: translateX(5px);
          transform: translateX(5px);
}
#custom_btn:before {
  content: "";
  background-color: #81c408;
  height: 3px;
  width: 0;
  position: absolute;
  top: 0;
  right: 0;
  -webkit-transition: 0.4s ease all;
  transition: 0.4s ease all;
}
#custom_btn:after {
  content: "";
  background-color: #81c408;
  height: 3px;
  width: 0;
  position: absolute;
  top: 0;
  right: 0;
  -webkit-transition: 0.4s ease all;
  transition: 0.4s ease all;
  top: auto;
  right: auto;
  left: 0;
  bottom: 0;
}
#custom_btn i {
  display: inline-block;
  -webkit-transition: -webkit-transform 0.3s ease-out;
  transition: -webkit-transform 0.3s ease-out;
  transition: transform 0.3s ease-out;
  transition: transform 0.3s ease-out, -webkit-transform 0.3s ease-out;
} 

  
    </style>
</head>
<body>

<div class="text-center mt-4">
    <h4 class="cart-title">CHECKOUT</h4>
</div>
<div class="checkout-container">
  <div class="container w-50 d-flex border flex-column p-4">

    <?php 

if (isset($_SESSION['cart']) && !empty($_SESSION['cart'])): 
    foreach ($_SESSION['cart'] as $product_id => $quantity): 
        // Fetch product details for each item in the cart
        $sql = "SELECT product_name, price, thumbnail FROM products WHERE product_id = $product_id";
        $result = mysqli_query($conn, $sql);
        if ($row = mysqli_fetch_assoc($result)) {
           
            $totalPrice = $row['price'] * (@$quantity['quantity']);
            if($subTotal == 0){
                $deliveryCharges = 0;
            }
            $subTotal += $totalPrice;
?>
            <div class="cart-item">
                <img src="admin/<?php echo htmlspecialchars($row['thumbnail']); ?>" alt="<?php echo htmlspecialchars($row['product_name']); ?>">
                <div class="cart-item-details">
                    <h5><?php echo htmlspecialchars($row['product_name']); ?></h5>
                    <div>Quantity: <?php echo htmlspecialchars(@$quantity['quantity']); ?></div>
                    <div class="price">₹<?php echo htmlspecialchars($totalPrice); ?>.00</div>
                </div>
            </div>
          
<?php 
        }
    endforeach;
endif;
?>

  
<?php 
 if($subTotal<=300){
    $deliveryCharges = 40;
 }
 if($subTotal == 0){
    $deliveryCharges = 0;
}
?>
    <div class="total-section">
    <div class="row mb-2">
               <div class="col-4 font-weight-bold">Sub Total Amount:</div>
               <div class="col-8 text-right">₹<?php echo $subTotal; ?>.00/-</div>
           </div>
    <div class="row mb-2">
               <div class="col-4 font-weight-bold">Delivery Charges:</div>
               <div class="col-8 text-right">₹<?php echo htmlspecialchars($deliveryCharges); ?>.00/-</div>
           </div>
    <div class="row mb-2">
               <div class="col-4 font-weight-bold">Total Amount:</div>
               <div class="col-8 text-right text-danger font-weight-bold">₹<?php echo htmlspecialchars($subTotal + $deliveryCharges); ?>.00/-</div>
           </div>
       
    </div>
    </div>
    <div class="container w-50  border p-4">
    <form action="process_checkout.php" method="POST">
        <h4>Shipping Details</h4>
      
        <div class="form-group ">
            <label for="name">Full Name</label>
            <input type="text" id="name" name="fname" required>
        </div>
        <div class="form-group">
            <label for="email">Email Address</label>
            <input type="email" id="email" name="femail" required>
        </div>
        
        <div class="form-group">
            <label for="phone">Phone Number</label>
            <input type="text" id="phone" name="fphone" required>
        </div>
        <div class="form-group">
            <label for="address">Address</label>
            <textarea id="address" name="faddress" rows="3" required></textarea>
        </div>
        <div class="form-check form-check-reverse mb-4">
            <div class="row"><h5>Payment Method</h5></div>
  <input class="form-check-input " type="checkbox" value="" id="reverseCheck1">
  <label class="form-check-label ml-2" for="reverseCheck1">
    Cash on Delivery
  </label>
</div>
        
        <button type="submit" class="submit-btn w-100 "id="custom_btn">Place Order</button>
    </form>
    </div>
</div>
<?php include('footer.php'); ?>
<?php include('js/boot_script.php'); ?>
</body>
</html>
